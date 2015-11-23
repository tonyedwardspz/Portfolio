var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var runSequence = require('run-sequence');
var clean = require('gulp-clean');
var autoprefixer = require('gulp-autoprefixer');
var sourceMaps = require('gulp-sourcemaps');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');

var plumberErrorHandler = { errorHandler: notify.onError({
    title: 'Gulp',
    message: 'Error: <%= error.message %>'
  })
};

gulp.task('process-sass', function(){
  gulp.src('./*.scss')
    .pipe(plumber(plumberErrorHandler))
    .pipe(sourceMaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
            browsers: ['last 3 versions'],
            cascade: false
        }))
    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(sourceMaps.write('./'))
    .pipe(gulp.dest('./'));
});

gulp.task('sass:watch',['clean'], function () {
  gulp.watch('./*.scss', ['process-sass']);
});

gulp.task('clean', function(){
  return gulp.src('./style.css', {read: false})
        .pipe(clean());
});

gulp.task('process', function (callback) {
  runSequence(
    'process-sass',
    'sass:watch',
    callback);
});
