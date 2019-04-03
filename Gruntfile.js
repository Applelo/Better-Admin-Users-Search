'use strict';
module.exports = function(grunt) {

    require('load-grunt-tasks')(grunt);

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        dirs: {
            lang: 'i18n'
        },

        makepot: {
            target: {
                options: {
                    domainPath: 'i18n/',
                    potComments: '',
                    potFilename: 'baus.pot',
                    type: 'wp-plugin',
                    updateTimestamp: true,
                    potHeaders: {
                        poedit: true,
                        'language': 'en_US',
                        'x-poedit-keywordslist': true
                    },
                    processPot: function( pot, options ) {
                        pot.headers['report-msgid-bugs-to'] = 'http://wordpress.org/support/plugin/cmb2';
                        pot.headers['last-translator'] = 'Applelo boubaultlois@gmail.com';
                        pot.headers['language-team'] = 'Applelo boubaultlois@gmail.com';
                        var today = new Date();
                        pot.headers['po-revision-date'] = today.getFullYear() +'-'+ ( today.getMonth() + 1 ) +'-'+ today.getDate() +' '+ today.getUTCHours() +':'+ today.getUTCMinutes() +'+'+ today.getTimezoneOffset();
                        return pot;
                    }
                }
            }
        },

        potomo: {
            dist: {
                options: {
                    poDel: false
                },
                files: [{
                    expand: true,
                    cwd: '<%= dirs.lang %>/',
                    src: ['*.po'],
                    dest: '<%= dirs.lang %>/',
                    ext: '.mo',
                    nonull: true
                }]
            }
        },

        checktextdomain: {
            options: {
                text_domain: 'baus',
                create_report_file: true,
                keywords: [
                    '__:1,2d',
                    '_e:1,2d',
                    '_x:1,2c,3d',
                    'esc_html__:1,2d',
                    'esc_html_e:1,2d',
                    'esc_html_x:1,2c,3d',
                    'esc_attr__:1,2d',
                    'esc_attr_e:1,2d',
                    'esc_attr_x:1,2c,3d',
                    '_ex:1,2c,3d',
                    '_n:1,2,4d',
                    '_nx:1,2,4c,5d',
                    '_n_noop:1,2,3d',
                    '_nx_noop:1,2,3c,4d',
                    ' __ngettext:1,2,3d',
                    '__ngettext_noop:1,2,3d',
                    '_c:1,2d',
                    '_nc:1,2,4c,5d'
                ]
            },
            files: {
                src: [
                    'includes/*.php',
                ],
                expand: true
            }
        },

        compress: {
            main: {
                options: {
                    mode: 'zip',
                    archive: 'better-admin-users-search.zip'
                },
                files: [ {
                    expand: true,
                    src: [
                        '**',
                        '!node_modules/**',
                        '!**.zip',
                        '!Gruntfile.js',
                        '!package.json',
                        '!package-lock.json',
                        '!composer.json',
                        '!composer.lock',
                        '!phpunit.xml'
                    ],
                    dest: '/'
                } ]
            }
        },

    });


    grunt.registerTask( 'default', ['checktextdomain', 'makepot', 'potomo', 'compress'] );

};