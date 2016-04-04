module.exports = (grunt) ->

  # Get all grunt modules
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks)
  require('time-grunt')(grunt)

  # Project configuration.
  grunt.initConfig

    # Collect data about the project
    pkg: grunt.file.readJSON('package.json')

    # Set Banner for some generated files
    banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */\n'

    # concat
    concat:
      jsLibs:
        src: [
          'bower_components/jquery/dist/jquery.min.js'
          'bower_components/fancybox/source/jquery.fancybox.js'
          'bower_components/prism/prism.js'
          'bower_components/jquery-autosize/jquery.autosize.min.js'
        ]
        dest: '<%= pkg.paths.build.js %>libs.js'
      js:
        src: [
          '<%= pkg.paths.src.js %>*.js'
        ]
        dest: '<%= pkg.paths.build.js %>script.js'
      css:
        src: [
          'bower_components/prism/themes/prism.css'
          'bower_components/prism/themes/prism-twilight.css'
          'bower_components/fancybox/source/jquery.fancybox.css'
          '<%= pkg.paths.src.css %>*.css'
        ]
        dest: '<%= pkg.paths.src.css %>styles.css'

    # eslint
    eslint:
      options:
        config: 'eslint.json'
      all: ['<%= pkg.paths.src.js %>*.js']

    # sass
    sass:
      all:
        files: [
          expand: true
          cwd: '<%= pkg.paths.src.sass %>'
          src: ['*.sass','!_*.sass']
          dest: '<%= pkg.paths.src.css %>'
          ext: '.css'
        ]

    # autoprefixer
    autoprefixer:
      all:
        files: [
          expand: true
          cwd: '<%= pkg.paths.src.css %>'
          src: ['*.css']
          dest: '<%= pkg.paths.src.css %>'
          ext: '.css'
        ]

    # imageEmbed
    imageEmbed:
      options:
        deleteAfterEncoding : false
      all:
        files: [
          expand: true
          cwd: '<%= pkg.paths.src.css %>'
          src: ['*.css']
          dest: '<%= pkg.paths.src.css %>'
        ]

    # cssmin
    cssmin:
      options:
        banner: '<%= banner %>'
      all:
        files: [
          expand: true
          cwd: '<%= pkg.paths.src.css %>'
          src: ['*.css']
          dest: '<%= pkg.paths.build.css %>'
          ext: '.css'
        ]

    # watch
    watch:
      # watch js
      js:
        files: ['<%= pkg.paths.src.js %>*.js']
        tasks: ['blink1:bad', 'newer:eslint', 'concat:jsLibs', 'concat:js', 'blink1:good']
        options:
          livereload: true
      # watch sass
      sass:
        files: ['<%= pkg.paths.src.sass %>*.sass']
        tasks: ['blink1:bad', 'newer:sass', 'newer:autoprefixer', 'concat:css', 'newer:imageEmbed', 'newer:cssmin', 'blink1:good']
        options:
          livereload: true

      # watch copy
      copy:
        files: [
          '<%= pkg.paths.src.dir %>*'
          '<%= pkg.paths.src.dir %>site/**/*'
          '<%= pkg.paths.src.dir %>images/**/*'
        ]
        tasks: ['newer:copy']
        options:
          livereload: true

      # watch content
      content:
        files: [
          '<%= pkg.paths.src.dir %>content/**/*'
        ]
        tasks: ['newer:copy']
        options:
          livereload: true

    # copy
    copy:
      all:
        files: [
          expand: true
          cwd: '<%= pkg.paths.src.dir %>'
          src: ['**/*','!<%= pkg.paths.src.dir %>**','<%= pkg.paths.src.dir %>images/**/*']
          dest: '<%= pkg.paths.build.dir %>'
        ]

    # php
    php:
      all:
        options:
          port: 1389
          hostname: 'localhost'
          base: '<%= pkg.paths.root %>'
          keepalive: true
          open: true

    # concurrent
    concurrent:
      all:
        tasks: ['php','watch','notify', 'blink1:good']
      options:
        logConcurrentOutput: true

    # notify
    notify:
      server:
        options:
          title: 'Yo'
          message: 'Server läuft auf <%= php.all.options.hostname %>:<%= php.all.options.port %>'

    # blink1
    color:
      process: '#660'
      good: '#086'
      bad: '#900'

    blink1:
      good:
        colors: ['<%= color.good %>']
        options:
          ledIndex: 2
          fadeMillis: 500
      bad:
        colors: ['<%= color.bad %>']
        options:
          ledIndex: 2
          fadeMillis: 500


  # Default task(s)
  grunt.registerTask('scripts', ['eslint', 'concat'])
  #grunt.registerTask('styles', ['sass', 'autoprefixer', 'imageEmbed', 'concat:css', 'cssmin'])
  grunt.registerTask('styles', ['sass', 'autoprefixer', 'concat:css', 'cssmin'])
  grunt.registerTask('default', ['scripts', 'styles', 'concurrent'])

