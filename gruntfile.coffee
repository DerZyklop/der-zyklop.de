module.exports = (grunt) ->

  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks)

  grunt.initConfig

    # load content from the package.json
    pkg: grunt.file.readJSON('package.json')


    # Set up some vars
    paths:
      assets: 'assets'
      coffee: '<%= paths.assets %>/coffee'
      jsvendor: '<%= paths.coffee %>/vendor'
      js: '<%= paths.assets %>/js'
      sass: '<%= paths.assets %>/sass'
      sassfilename: 'styles'
      css: '<%= paths.assets %>/styles'
    banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */'



    # process coffee-files
    coffee:
      all:
        options:
          join: false
          bare: true
        files: [
          expand: true
          cwd: '<%= paths.coffee %>'
          src: ['*.coffee']
          dest: '<%= paths.jsvendor %>'
          ext: '.js'
        ]

    # minify js-files
    uglify:
      options:
        banner: '<%= banner %>'
      js:
        files:
          '<%= paths.js %>/script.min.js': [
            '<%= paths.jsvendor %>/jquery*.js'
            '<%= paths.jsvendor %>/*.js'
          ]
        options:
          mangle: false


    # process sass-files
    sass:
      all:
        options:
          compass: true
          style: 'compressed'
        files: '<%= paths.sass %>/temp_<%= paths.sassfilename %>.css': '<%= paths.sass %>/<%= paths.sassfilename %>.sass'

    # minify css-files
    cssmin:
      options:
        banner: '<%= banner %>'
      all:
        expand: false
        flatten: true
        src: '<%= paths.sass %>/**/*.css'
        dest: '<%= paths.css %>/<%= paths.sassfilename %>.css'


    imagemin:
      options:
        optimizationLevel: 7
      all:
        files: [
          expand: true
          cwd: './thumbs/uncompressed'
          src: ['**/*.{gif,png}']
          dest: './thumbs/'
        ]
      jpg:
        options:
          progressive: true
        files: [
          expand: true
          cwd: './thumbs/uncompressed'
          src: ['**/*.jpg']
          dest: './thumbs/'
        ]


    # test accessability
    shell:
      pa11y:
        options:
          stdout: true
        command: 'pa11y http://<%= php.all.options.hostname %>:<%= php.all.options.port%>'



    watch:
      options:
        livereload: true

      livereload:
        files: [
          '<%= paths.css %>/**/*'
          '<%= paths.js %>/**/*'
        ]
        tasks: ['reload']

      sass:
        files: ['<%= paths.sass %>/*.sass']
        tasks: ['sass']
      css:
        files: ['<%= paths.sass %>/**/*.css']
        tasks: ['cssmin']
      coffee:
        files: ['<%= paths.coffee %>/*.coffee']
        tasks: ['coffee']
      js:
        files: [
          '<%= paths.jsvendor %>/*.js'
        ]
        tasks: ['uglify']
      images:
        files: [
          'thumbs/uncompressed/**/*.{gif,png,jpg}'
        ]
        tasks: ['imagemin']


      tmpl:
        files: [
          'site/templates/*'
          'site/snippets/*'
          'site/plugins/*'
        ]
        tasks: ['reload']


    php:
      all:
        options:
          port: 1338
          hostname: 'localhost'
          base: ''
          keepalive: true

    open:
      all:
        path: 'http://<%= php.all.options.hostname %>:<%= php.all.options.port%>'

  grunt.registerTask "reload", "reload Chrome on OS X", ->
    require("child_process").exec("osascript " +
        "-e 'tell application \"Google Chrome\" " +
          "to tell the active tab of its first window' " +
        "-e 'reload' " +
        "-e 'end tell'")


  grunt.registerTask('server', ['open','php'])
  grunt.registerTask('test', ['shell:pa11y'])
  grunt.registerTask('default', ['reload','watch'])
