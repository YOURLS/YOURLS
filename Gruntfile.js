module.exports = function (grunt) {
    'use strict';

    var path = require('path')

    grunt.loadNpmTasks('grunt-php');
    grunt.loadNpmTasks('grunt-composer');
    grunt.loadNpmTasks('grunt-php-cs-fixer');
    grunt.loadNpmTasks('grunt-phpunit');
    grunt.loadNpmTasks('grunt-bower-task');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-update-submodules');

    grunt.initConfig({
        php: {
            server: {
                options: {
                    keepalive: true,
                    open: true,
                    port: 8085
                }
            }
        },
        phpcsfixer: {
            app: {
                dir: 'includes'
            },
            options: {
                level: 'all',
                fixers: ['-phpdoc_params', '-braces',
                    '-function_declaration', '-controls_spaces']
            }
        },
        phpunit: {
            yourls: {},
            options: {
                configuration: '../phpunit.xml.dist'
            }
        },
        bower: {
            install: {
                options: {
                    targetDir: './assets',
                    layout: function (type, component) {
                        if (type == 'less') {
                            return path.join(type, component)
                        };
                        return type;
                    }
                }
            }
        },
        less: {
            dev: {
                files: {
                    "assets/css/yourls.css": "assets/less/yourls.less"
                },
                options: {
                    sourceMap: true,
                    sourceMapFilename: 'assets/css/yourls.css.map',
                    sourceMapURL: 'yourls.css.map',
                    sourceMapRootpath: '../../'
                }
            },
            dist: {
                files: {
                    "assets/css/yourls.min.css": "assets/less/yourls.less"
                },
                options: {
                    cleancss: true,
                    report: 'min',
                    strictUnits: true,
                    strictMath: true,
                    strictImports: true
                }
            }
        },
        watch: {
            less: {
                files: 'assets/less/**/*.less',
                tasks: 'less:development'
            },
            php: {
                files: 'includes/**/*.php',
                tasks: [/*'phpcsfixer', */'phpunit']
            }
        }
    });

    grunt.registerTask('default', [/*'composer:update:no-dev', */'bower',
        'less:dev', 'watch:less']);
    grunt.registerTask('dist', ['update_submodules', 'less:dist']);
};
