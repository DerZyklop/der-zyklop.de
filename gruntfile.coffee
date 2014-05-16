# +---------------------------------------------+ #
# |#############################################| #
# |###################EEEEEEE###################| #
# |##################/      /\##################| #
# |#################/      /  \#################| #
# |################/      /    \################| #
# |###############/      /      \###############| #
# |##############/      /        \##############| #
# |#############/      /     A    \#############| #
# |############/      /     / \    \############| #
# |###########/      /     /   \    \###########| #
# |##########/      /     /     \    \##########| #
# |#########/      /     /#\     \    \#########| #
# |########/      /     /###\     \    \########| #
# |#######/      /     /#####\     \    \#######| #
# |######/      /_____/EEEEEEE\     \    \######| #
# |#####/                      \     \    \#####| #
# |####(________________________\     \    )####| #
# |#####\                              \  /#####| #
# |######\______________________________\/######| #
# |#############################################| #
# |############# +-------------------+ #########| #
# |############# | www.der-zyklop.de | #########| #
# |############# +-------------------+ #########| #
# |#############################################| #
# +–––––––––––––––––––––––––––––––––––––––––––––+ #

# Info's about this Gruntfile: https://github.com/DerZyklop/boilerplate.pxwrk.de

module.exports = (grunt) ->

  # Get all grunt modules
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks)
  require('time-grunt')(grunt)

  # Project configuration.
  grunt.initConfig

    # Collect data about the project
    pkg: grunt.file.readJSON('package.json')
    paths: grunt.file.readJSON('paths.json')

    # Set Banner for some generated files
    banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */\n'

    # coffee
    coffee:
      all:
        files: [
          expand: true
          cwd: '<%= paths.src.coffee %>'
          src: ['*.coffee']
          dest: '<%= paths.src.js %>'
          ext: '.js'
        ]

    # concat
    concat:
      js:
        src: [
          'bower_components/jquery/dist/jquery.min.js'
          'bower_components/fancybox/source/jquery.fancybox.js'
          'bower_components/prism/prism.js'
          'bower_components/vladstudio-kirby-smart-submit/move-to-kirby/assets/js/smart-submit.js'
          '<%= paths.src.js %>*.js'
        ]
        dest: '<%= paths.build.js %>script.js'
      css:
        src: [
          'bower_components/prism/themes/prism.css'
          'bower_components/prism/themes/prism-twilight.css'
          'bower_components/fancybox/source/jquery.fancybox.css'
          '<%= paths.src.css %>*.css'
        ]
        dest: '<%= paths.src.css %>styles.css'

    # eslint
    eslint:
      options:
        config: 'eslint.json'
      all: ['<%= paths.src.js %>*.js']

    # uglify
    uglify:
      options:
        banner: '<%= banner %>'
      all:
        files: [
          expand: true
          cwd: '<%= paths.src.js %>'
          src: ['*.js']
          dest: '<%= paths.src.js %>'
          ext: '.js'
        ]

    # sass
    sass:
      all:
        files: [
          expand: true
          cwd: '<%= paths.src.sass %>'
          src: ['*.sass']
          dest: '<%= paths.src.css %>'
          ext: '.css'
        ]

    # autoprefixer
    autoprefixer:
      all:
        files: [
          expand: true
          cwd: '<%= paths.src.css %>'
          src: ['*.css']
          dest: '<%= paths.src.css %>'
          ext: '.css'
        ]

    # imageEmbed
    imageEmbed:
      options:
        deleteAfterEncoding : false
      all:
        files: [
          expand: true
          cwd: '<%= paths.src.css %>'
          src: ['*.css']
          dest: '<%= paths.src.css %>'
        ]

    # cssmin
    cssmin:
      options:
        banner: '<%= banner %>'
      all:
        files: [
          expand: true
          cwd: '<%= paths.src.css %>'
          src: ['styles.css']
          dest: '<%= paths.build.css %>'
          ext: '.css'
        ]

    # watch
    watch:
      # watch coffee
      coffee:
        files: ['<%= paths.src.coffee %>*.coffee']
        tasks: ['newer:coffee', 'newer:eslint', 'newer:uglify', 'concat:js']
        options:
          livereload: true
      # watch sass
      sass:
        files: ['<%= paths.src.sass %>*.sass']
        tasks: ['newer:sass', 'newer:imageEmbed', 'concat:css', 'newer:autoprefixer', 'newer:cssmin']
        options:
          livereload: true

      # watch templates
      templates:
        files: [
          '<%= paths.src.dir %>*'
          '<%= paths.src.dir %>site/**/*'
        ]
        options:
          livereload: true

      # watch content
      content:
        files: [
          '<%= paths.src.dir %>content/**/*'
        ]
        options:
          livereload: true

    # php
    php:
      all:
        options:
          port: 1337
          hostname: 'localhost'
          base: '<%= paths.build.dir %>'
          keepalive: true
          open: true

    # concurrent
    concurrent:
      all:
        tasks: ['php','watch','notify']
      options:
        logConcurrentOutput: true

    # notify
    notify:
      server:
        options:
          title: 'Yo'
          message: 'Server läuft auf <%= php.all.options.hostname %>:<%= php.all.options.port %>'


  # Default task(s)
  grunt.registerTask('scripts', ['coffee', 'eslint', 'concat:js', 'uglify'])
  grunt.registerTask('styles', ['sass', 'imageEmbed', 'concat:css', 'autoprefixer', 'cssmin'])
  grunt.registerTask('default', ['scripts', 'styles', 'concurrent'])






    # imageEmbed:
    #   options:
    #     deleteAfterEncoding : false
    #   all:
    #     files: [
    #       expand: true
    #       cwd: '<%= paths.css %>'
    #       src: ['*.css']
    #       dest: '<%= paths.css %>'
    #     ]


    # # compress images
    # imagemin:
    #   options:
    #     optimizationLevel: 7
    #   all:
    #     files: [
    #       expand: true
    #       cwd: './thumbs/uncompressed'
    #       src: ['**/*.{gif,png}']
    #       dest: './thumbs/'
    #     ]
    #   jpg:
    #     options:
    #       progressive: true
    #     files: [
    #       expand: true
    #       cwd: './thumbs/uncompressed'
    #       src: ['**/*.jpg']
    #       dest: './thumbs/'
    #     ]
