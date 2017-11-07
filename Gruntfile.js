module.exports = function (grunt) {
    require('load-grunt-tasks')(grunt); //Charge les bons plugins
    require('time-grunt')(grunt); // Time

    grunt.initConfig({
        clean: { // clean
            css: ['webroot/builds/css/'],
            lastCss: [
                'webroot/builds/css/*.css',
                '!webroot/builds/css/general*.min.css',
                '!webroot/builds/css/error*.min.css',
                ],
            sass: ['webroot/builds/sass/'],
            js: ['webroot/builds/js/', 'webroot/builds/js-min/'],
            jsMin: ['webroot/builds/js-min/']
        },
        eslint: {
            options: {
                configFile: '.eslintrc.json',
            },
            target: ['webroot/dev/js/**/*.js', '!webroot/dev/js/modernizr.flexbox.js']
        },
        uglify: { // uglify
            options: {
                mangle: true,
                compress: {
                    sequences: true,
                    dead_code: true,
                    conditionals: true,
                    booleans: true,
                    unused: true,
                    if_return: true,
                    join_vars: true,
                    drop_console: true, // Supprime tous les console.TRUC
                    reduce_vars: false
                }
            },
            js: { // uglify
                files: [{
                    expand: true,
                    cwd: 'webroot/dev/js',
                    src: '**/*.js',
                    dest: 'webroot/builds/js-min/',
                    ext: '.min.js'
                }]
            }
        },
        copy: {
            js: { // copy
                files: [{
                    expand: true,
                    cwd: 'webroot/builds/js-min/page',
                    src: '**/*.js',
                    dest: 'webroot/builds/js',
                }, ]
            },
            css: { // copy
                files: [{
                    expand: true,
                    cwd: 'webroot/dev/sass/src/page/',
                    src: 'error.scss',
                    dest: 'webroot/builds/sass',
                }, ]
            }
        },
        concat: {
            js: { // concat
                src: [
                    'node_modules/jquery/dist/jquery.min.js',
                    'node_modules/scrollmagic/scrollmagic/minified/ScrollMagic.min.js',
                    'node_modules/scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js',
                    'webroot/dev/js/modernizr.flexbox.js',
                    'node_modules/gsap/src/minified/TweenMax.min.js',
                    'node_modules/gsap/src/minified/TweenMax.min.js',
                    'node_modules/jscroll/jquery.jscroll.min.js',
                    'webroot/builds/js-min/functions.min.js',
                    'webroot/builds/js-min/manage-general.min.js',
                ],
                dest: 'webroot/builds/js/general.min.js',
            },
            sass: { // concat
                files: {
                    'webroot/builds/sass/general-info.scss': [
                        'webroot/dev/sass/ress/_color-info.scss',
                        'webroot/dev/sass/ress/_var.scss',
                        'webroot/dev/sass/ress/_mixin.scss',
                        'webroot/dev/sass/ress/_extend.scss',
                        'webroot/dev/sass/src/general.scss',
                        'webroot/dev/sass/src/module/*.scss'
                    ],
                    'webroot/builds/sass/general-dev.scss': [
                        'webroot/dev/sass/ress/_color-dev.scss',
                        'webroot/dev/sass/ress/_var.scss',
                        'webroot/dev/sass/ress/_mixin.scss',
                        'webroot/dev/sass/ress/_extend.scss',
                        'webroot/dev/sass/src/general.scss',
                        'webroot/dev/sass/src/module/*.scss'
                    ],
                    'webroot/builds/sass/general-photo.scss': [
                        'webroot/dev/sass/ress/_color-photo.scss',
                        'webroot/dev/sass/ress/_var.scss',
                        'webroot/dev/sass/ress/_mixin.scss',
                        'webroot/dev/sass/ress/_extend.scss',
                        'webroot/dev/sass/src/general.scss',
                        'webroot/dev/sass/src/module/*.scss'
                    ],
                    'webroot/builds/sass/categories.scss': [
                        'webroot/dev/sass/ress/_color-info.scss',
                        'webroot/dev/sass/ress/_var.scss',
                        'webroot/dev/sass/ress/_mixin.scss',
                        'webroot/dev/sass/src/page/categories.scss'
                    ],
                    'webroot/builds/sass/developpeur.scss': [
                        'webroot/dev/sass/ress/_color-dev.scss',
                        'webroot/dev/sass/ress/_var.scss',
                        'webroot/dev/sass/ress/_mixin.scss',
                        'webroot/dev/sass/src/page/developpeur.scss'
                    ],
                    'webroot/builds/sass/index.scss': [
                        'webroot/dev/sass/ress/_color-info.scss',
                        'webroot/dev/sass/ress/_var.scss',
                        'webroot/dev/sass/ress/_mixin.scss',
                        'webroot/dev/sass/src/page/index.scss'
                    ],
                    'webroot/builds/sass/infographiste.scss': [
                        'webroot/dev/sass/ress/_color-info.scss',
                        'webroot/dev/sass/ress/_var.scss',
                        'webroot/dev/sass/ress/_mixin.scss',
                        'webroot/dev/sass/src/page/infographiste.scss'
                    ],
                    'webroot/builds/sass/project.scss': [
                        'webroot/dev/sass/ress/_color-info.scss',
                        'webroot/dev/sass/ress/_var.scss',
                        'webroot/dev/sass/ress/_mixin.scss',
                        'webroot/dev/sass/src/page/project.scss'
                    ],
                },
            },
            css: { // concat
                files: {
                    'webroot/builds/css/general.min.css': [
                        'webroot/dev/css/*.css',
                        'webroot/builds/css/project.css',
                        'webroot/builds/css/infographiste.css',
                        'webroot/builds/css/index.css',
                        'webroot/builds/css/developpeur.css',
                        'webroot/builds/css/categories.css',
                    ],
                },
            }
        },
        autoprefixer: { //autoprefixer
            options: {
                browsers: ['last 2 versions', 'ie 8', 'ie 9']
            },
            files: {
                expand: true,
                cwd: 'webroot/builds/css',
                src: '*.css',
                dest: 'webroot/builds/css'
            }
        },
            compass: {
                dist: {
                    options: {
                        sassDir: 'webroot/builds/sass',
                        cssDir: 'webroot/builds/css',
                        environment: 'production',
                    },
                },
            },
        cssmin: {
            css: { // cssmin
                files: [{
                    expand: true,
                    cwd: 'webroot/builds/css',
                    src: ['*.css'],
                    dest: 'webroot/builds/css',
                    ext: '.min.css'
                }]
            }
        },
        watch: { // watch
            JS: {
                files: [
                    'webroot/dev/js/**/*.js'
                ],
                tasks: 'JS',
                options: {
                    livereload: true
                }
            },
            CSS: {
                files: [
                    'webroot/dev/sass/**/*.scss'
                ],
                tasks: 'CSS',
                options: {
                    livereload: true
                }
            }
        },
        imagemin: {
            dist: {
                files: [{
                    expand: true,
                    cwd: 'webroot/img',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'webroot/img'
                }]
            }
       }
    });

    grunt.registerTask('default', ['JS', 'CSS', 'watch']);
    grunt.registerTask('JS', [
        'clean:js',
        'eslint',
        'uglify:js',
        'copy:js',
        'concat:js',
        'clean:jsMin'
    ]);
    grunt.registerTask('CSS', [
        'clean:css',
        'clean:sass',
        'copy:css',
        'concat:sass',
        'compass:dist',
        'autoprefixer',
        'concat:css',
        'cssmin:css',
        'clean:sass',
        'clean:lastCss'
    ]);
    grunt.registerTask('prod', [ 
        'JS',
        'CSS',
        'imagemin:dist'
    ]);
};
