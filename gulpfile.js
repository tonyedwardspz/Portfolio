var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var runSequence = require('run-sequence');
var autoprefixer = require('gulp-autoprefixer');
var sourceMaps = require('gulp-sourcemaps');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var livereload = require('gulp-livereload');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require("gulp-rename");
var header = require('gulp-header');
var csso = require('gulp-csso');

var scriptFiles = ['./bower_components/picturefill/dist/picturefill.min.js',
                   './bower_components/mixitup/build/jquery.mixitup.min.js',
                   './bower_components/highlightjs/highlight.pack.min.js',
                   './script/script.js'];

var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
  })
};

var banner =  '/*\n' +
              'Theme Name:     Tony Edwards Protfolio\n' +
              'Theme URI:      https://github.com/tonyedwardspz/Portfolio\n' +
              'Description:    The wordpress theme for my personal portfolio website\n' +
              'Version:        1.0\n' +
              'Author:         Tony Edwards\n' +
              'Aurhor URI:     http://www.purelywebdesign.co.uk\n' +
              '*/\n';


gulp.task('sass', function () {
  return gulp.src('./*.scss')
    .pipe(plumber(plumberErrorHandler))
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(plumber.stop())
    .pipe(gulp.dest('./'));
});


gulp.task('css', ['sass'], function(){
  return gulp.src(['./bower_components/normalize.css/normalize.css',
                   './bower_components/milligram/dist/milligram.css',
                   './style/font-awesome.css',
                   './bower_components/highlightjs/styles/github-gist.css',
                   './style.css'])
    .pipe(plumber(plumberErrorHandler))
    .pipe(sourceMaps.init())
    .pipe(concat('style.css'))
    .pipe(csso())
    .pipe(autoprefixer({
            browsers: ['last 5 versions'],
            cascade: false
        }))
    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(header(banner))
    .pipe(plumber.stop())
    .pipe(sourceMaps.write('./'))
    .pipe(gulp.dest('./'))
    .pipe(livereload());
});

gulp.task('javascript', function(){
  return gulp.src(scriptFiles)
    .pipe(sourceMaps.init())
    .pipe(concat('scripts.js'))
    .pipe(uglify())
    .pipe(rename('script.min.js'))
    .pipe(sourceMaps.write('./'))
    .pipe(gulp.dest('./script/min/'))
    .pipe(livereload());
});


gulp.task('watch', function () {
  livereload.listen();
  gulp.watch(['./*.scss', './style/*.*'], ['css']);
  gulp.watch('./script/script.js', ['javascript']);
});

gulp.task('clean', function(){
  return gulp.src('./style.css', {read: false})
        .pipe(clean());
});

gulp.task('default', function (callback) {
  runSequence(
    ['css', 'javascript'],
    'watch',
    callback);
});
