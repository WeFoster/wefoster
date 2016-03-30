// Load tasks.
module.exports = function(grunt) {

  // Load tasks.
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // Hint our JS files
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        '!Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.min.js'
      ]
    },
    less: {
      //Compile Stylesheets. Only used on "build".
      regular: {
        files: {
          'assets/css/login-style.css': [
            'assets/less/login-style.less'
          ],
          'assets/css/main.css': [
            'assets/less/main.less'
          ],
          'assets/css/font-awesome.css': [
            'assets/less/font-awesome.less'
          ],
          'assets/css/buddypress.css': [
            'assets/less/buddypress.less'
          ],
          'lib/customiser/assets/css/customizer.css': [
            'lib/customiser/assets/less/customizer.less'
          ],
        },
        options: {
          compress: false,
        }
      },
      //Dev Customizer + Login Stylesheet
      other: {
        files: {
          'assets/css/login-style.css': [
            'assets/less/login-style.less'
          ],
          'lib/customiser/assets/css/customizer.css': [
            'lib/customiser/assets/less/customizer.less'
          ],
        },
      },
      //Compress+ Source Map Main
      main: {
        files: {
          'assets/css/main.css': [
            'assets/less/main.less'
          ],
        },
        options: {
          compress: true,
          yuicompress: true,
          optimization: 2,
          sourceMap: true,
          sourceMapFilename: 'assets/css/main.css.map',
          sourceMapRootpath: '/wp-content/themes/wefoster/'
        }
      },
      //Compress+ Source Map BuddyPress
      buddypress: {
        files: {
          'assets/css/buddypress.css': [
            'assets/less/buddypress.less'
          ],
        },
        options: {
          compress: true,
          yuicompress: true,
          optimization: 2,
          sourceMap: true,
          sourceMapFilename: 'assets/css/buddypress.css.map',
          sourceMapRootpath: '/wp-content/themes/wefoster/'
        }
      },
      //Compress+ Source Map BuddyPress
      fontawesome: {
        files: {
          'assets/css/font-awesome.css': [
            'assets/less/font-awesome.less'
          ],
        },
        options: {
          compress: true,
          yuicompress: true,
          optimization: 2,
          sourceMap: true,
          sourceMapFilename: 'assets/css/fontawesome.css.map',
          sourceMapRootpath: '/wp-content/themes/wefoster/'
        }
      }
    },
    // Minify JS and compile into scripts
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [
            //Core Bootstrap
            'assets/vendor/bootstrap-less/js/transition.js',
            'assets/vendor/bootstrap-less/js/button.js',
            'assets/vendor/bootstrap-less/js/collapse.js',
            'assets/vendor/bootstrap-less/js/dropdown.js',
            'assets/vendor/bootstrap-less/js/tooltip.js',
            'assets/vendor/bootstrap-less/js/popover.js',
            'assets/vendor/bootstrap-less/js/tab.js',
            'assets/vendor/bootstrap-less/js/affix.js',

            //Smart Menus for multi-level Bootstrap menus
            'assets/vendor/smartmenus/dist/jquery.smartmenus.js',
            'assets/vendor/smartmenus/dist/addons/bootstrap/jquery.smartmenus.bootstrap.js',

            //Headroom for fancy header
            'assets/vendor/headroom.js/dist/headroom.js',
            'assets/vendor/headroom.js/dist/jQuery.headroom.js',

            //Fancy Dropdown select boxes
            'assets/vendor/bootstrap-select/dist/js/bootstrap-select.js',

            //Add auto grow plugin
            'assets/vendor/jquery-autogrow-textarea/src/jquery.autogrow.js',

            //Load custom JS for WeFoster framework
            'assets/js/_main.js',

            '!assets/js/scripts.min.js'
          ]
        },
        options: {
          //JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
          sourceMap: 'assets/js/scripts.min.js.map',
          sourceMappingURL: '/wp-content/themes/wefoster/assets/js/scripts.min.js.map',
          compress: false,
      mangle: false,
      preserveComments: false
        }
      }
    },
    // Watch files during development
    watch: {
      less: {
        files: [
          'assets/less/**/**/**/*.less',
          'lib/customiser/assets/less/customizer.less'
        ],
        tasks: ['less:main', ['less:buddypress'],['less:fontawesome'],
          ['less:other'], 'version'
        ]
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify', 'version']
      },
    },
    clean: {
      dist: [
        'assets/css/main.css',
        'assets/js/scripts.min.js'
      ]
    },

    // Release Builds: Get ready for release
    // Copy needed files to temp folder



    copy: {
      build: {
        src: [
          '**',
          // Files and folders to ignore
          '!docs/**',
          '!README.markdown',
          '!node_modules/**',
          '!build/**',
          '!config.codekit',
          '!assets/vendor/**',
          '!lib/vendor/kirki/assets/js/vendor/ace/**',
          '!bower.json',
          '!npm-debug.log',
          '!package.json',
          '!prepos.cfg',
          '!.ds_store',

          //Include font awesome
          'assets/vendor/fontawesome/fonts/*',

          'assets/vendor/fastclick/lib/fastclick.js'
        ],
        dest: 'build/',
        expand: true
      },
    },
    makepot: {
      theme: {
        options: {
          potFilename: 'wefoster.pot',
          domainPath: '/languages',
          type: 'wp-theme',
          exclude: [
            'buddypress/members/single/*',
            'buddypress/groups/*',
            'buddypress/activity/*',
            'lib/buddypress/bp-general.php',
            'lib/vendor/*'
          ],
          processPot: function(pot, options) {
            pot.headers['report-msgid-bugs-to'] = 'https://github.com/WeFoster/wefoster/';
            pot.headers['last-translator'] = 'The WeFoster Community';
            pot.headers['language-team'] = 'The WeFoster Community';
            return pot;
          }
        }
      }
    },
    // Clean the build folder
    clean: {
      build: {
        src: ['build/']
      }
    },
    // Bump version numbers across the theme
    version: {
      options: {
        file: 'lib/setup/scripts.php',
        css: 'assets/css/main.css',
        cssHandle: 'wff_main',
        css: 'assets/css/buddypress.css',
        cssHandle: 'wff_buddypress',
        css: 'assets/css/font-awesome.css',
        cssHandle: 'wff_font_awesome',
        js: 'assets/js/scripts.min.js',
        jsHandle: 'wff_scripts'
      },
    },
    //Create our readme.md
    wp_readme_to_markdown: {
      your_target: {
        files: {
          'readme.md': 'readme.txt'
        },
      },
    },
    // Compress the build folder into an upload-ready zip file
    compress: {
      build: {
        options: {
          archive: 'release/wefoster.zip'
        },
        expand: true,
        cwd: 'build/',
        src: ['**/*'],
        dest: 'wefoster/'
      }
    },
    glotpress_download: {
      core: {
        options: {
          domainPath: 'languages',
          url: 'http://translate.wefoster.co',
          slug: 'wefoster',
          textdomain: 'wefoster',
        }
      },
    }
  });


  // Load tasks
  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'uglify',
    'version'
  ]);

  grunt.registerTask('build', [
    'makepot',
    //'less',
    //'glotpress_download',
    'copy',
    'compress',
    'clean',
    'wp_readme_to_markdown'
  ]);


  grunt.registerTask('dev', [
    'watch',
  ]);

};
