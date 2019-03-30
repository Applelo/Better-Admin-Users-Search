'use strict';
module.exports = function(grunt) {

    require('load-grunt-tasks')(grunt);

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        babel: {
            options: {
                sourceMap: true,
                minified:true,
                presets: ['@babel/preset-env']
            },
            dist: {
                files: {
                    'assets/js/<%= pkg.name %>.min.js': 'assets/js/<%= pkg.name %>.js'
                }
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'expanded',
                    lineNumbers: true
                },
                files: {
                    'assets/css/<%= pkg.name %>.css': 'assets/css/<%= pkg.name %>.scss',
                }
            }
        },
        watch: {
            css: {
                files: ['assets/css/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                },
            },
            scripts: {
                files: ['assets/js/*.js'],
                tasks: ['uglify'],
                options: {
                    debounceDelay: 500
                }
            }
        },
    });


    // Default task(s).
    grunt.registerTask('default', ['babel', 'sass']);

};