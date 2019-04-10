var gulp        = require('gulp');
var plugins     = require("gulp-load-plugins")({
    pattern: ['gulp-*', 'gulp.*'],
    replaceString: /\bgulp[\-.]/
});
var root = {
        'base'  : './',
        'bower' : './bower_components/',
        'assets'   : './assets/',
        'css'   : './css/',
        'sass'   : './assets/sass',
        'js'    : './js/'
    };

gulp.task( 'compileSass',function(){
    
    plugins.rubySass( root.sass + '**/*.scss', { sourcemap: true, noCache: true } )
        .on( 'error', plugins.rubySass.logError )
        .pipe( plugins.stripCssComments() )
        .pipe( plugins.sourcemaps.write())
        .pipe( gulp.dest( root.assets ) );
    
});

gulp.task( 'minifyCss',function(){

    gulp.src( root.sass + '**/*.css' )
        .pipe( plugins.sourcemaps.init() )
        .pipe( plugins.concat( 'bb-styles.min.css' ) )
        .pipe( plugins.autoprefixer( { browsers: ['last 2 versions'], cascade: false } ) )
        .pipe( plugins.csso() )
        .pipe( plugins.sourcemaps.write() )
        .pipe( gulp.dest( root.css ) );
    
});

gulp.task( 'uglifyJs', function(){
    
    gulp.src( root.js + '**/*.js' )
        .pipe( plugins.concat( 'bb-scripts.js' ) )
        .pipe( plugins.uglify() )
        .pipe( plugins.rename( { suffix: '.min' } ) )
        .pipe( gulp.dest( root.js ) );
    
});

gulp.task( 'default',function(){
    
    gulp.watch( root.sass + '**/*.scss', [ 'compileSass' ] );
    gulp.watch( root.sass + '**/*.css', [ 'minifyCss' ] );
    gulp.watch( root.js + '**/*.js', [ 'uglifyJs' ] );
    
});