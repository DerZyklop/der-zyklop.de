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
          'assets/smart-submit/smart-submit.js'
          '<%= paths.src.js %>*.js'
        ]
        dest: '<%= paths.build.js %>script.js'
      css:
        src: [
          'bower_components/prism/themes/prism.css'
          'bower_components/prism/themes/prism-twilight.css'

          '<%= paths.src.css %>*.css'
        ]
        dest: '<%= paths.src.css %>styles.css'

    uglify:
      all:
        files:
          '<%= paths.build.js %>script.min.js': ['<%= paths.build.js %>script.js']


    # eslint
    eslint:
      options:
        config: 'eslint.json'
      all: ['<%= paths.src.js %>*.js']

    # sass
    sass:
      all:
        files: [
          expand: true
          cwd: '<%= paths.src.sass %>'
          src: ['styles.sass']
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
          src: ['*.css']
          dest: '<%= paths.build.css %>'
          ext: '.css'
        ]

    # watch
    watch:
      # watch coffee
      coffee:
        files: ['<%= paths.src.coffee %>*.coffee']
        tasks: ['newer:coffee', 'newer:eslint', 'concat:js', 'uglify']
        options:
          livereload: true
      # watch sass
      sass:
        files: ['<%= paths.src.sass %>*.sass']
        tasks: ['newer:sass', 'newer:autoprefixer', 'newer:imageEmbed', 'concat:js', 'newer:cssmin']
        options:
          livereload: true

      # watch templates
      templates:
        files: [
          '<%= paths.src.dir %>*'
          '<%= paths.src.dir %>site/**/*'
        ]
        #tasks: ['newer:copy']
        options:
          livereload: true

      # watch content
      content:
        files: [
          '<%= paths.src.dir %>content/**/*'
        ]
        #tasks: ['newer:copy']
        options:
          livereload: true

    # copy
    # copy:
    #   all:
    #     files: [
    #       expand: true
    #       cwd: '<%= paths.src.dir %>'
    #       src: ['**/*','!<%= paths.assets %>**','<%= paths.assets %>images/**/*']
    #       dest: '<%= paths.build.dir %>'
    #     ]

    # php
    php:
      all:
        options:
          port: 1337
          hostname: 'localhost'
          base: '<%= paths.root %>'
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
  grunt.registerTask('scripts', ['coffee', 'eslint', 'concat', 'uglify'])
  grunt.registerTask('styles', ['sass', 'autoprefixer', 'imageEmbed', 'cssmin'])
  grunt.registerTask('default', ['scripts', 'styles', 'concurrent'])
