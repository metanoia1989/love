module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            dist: {
                options: {
                    style: 'expanded'
                },
                files: [{
                    expand: true,
                    cwd: 'sass',
                    src: ['*.scss', '!style.scss', '!woocommerce.scss'],
                    dest: 'css',
                    ext: '.css'
                },{
                    expand: true,
                    cwd: 'sass',
                    src: ['style.scss', 'woocommerce.scss'],
                    dest: './',
                    ext: '.css'
                }]
            }
        },
        watch: {
            css: {
                files: 'sass/*.scss',
                tasks: ['sass']
            }
        }
    });
    // Load Grunt plugins
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    // Register Grunt tasks
    grunt.registerTask('default', ['watch']);
};
