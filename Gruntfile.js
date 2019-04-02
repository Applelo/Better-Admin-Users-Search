'use strict';
module.exports = function(grunt) {

    require('load-grunt-tasks')(grunt);

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

    });


    // Default task(s).
    grunt.registerTask('default', []);

};