'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'public/dev/js/scripts.js'
      ]
    },
    recess: {
      dist: {
        options: {
          compile: true,
          compress: true
        },
        files: {
          'public/assets/css/main.min.css': [
            'public/dev/css/style.css'
          ]
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'public/assets/js/scripts.min.js': [
            'public/dev/js/scripts.js'
          ]
        }
      }
    },
    watch: {
      css: {
        files: ['public/dev/css/*.css'],
        tasks: ['recess']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify']
      }
    },
    clean: {
      dist: [
        'public/css/main.min.css',
        'public/js/scripts.min.js'
      ]
    },
    connect: {
      server: {
        options: {
          port: 9001,
          base: './tso'
        }
      }
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-recess');
  grunt.loadNpmTasks('grunt-wp-version');

  // local dev
  grunt.loadNpmTasks('grunt-contrib-connect');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'recess',
    'uglify',
    /*'version'*/
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};