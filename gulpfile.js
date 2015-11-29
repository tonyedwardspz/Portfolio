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

var scriptFiles = ['./script/script.js',
                   './script/rainbow.js',
                   './bower_components/picturefill/dist/picturefill.min.js',
                   './bower_components/mixitup/build/jquery.mixitup.min.js',];

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
    .pipe(gulp.dest('./'))
    .pipe(livereload());
});

gulp.task('process-javascript', function(){
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
  gulp.watch('./*.scss', ['process-sass']);
  gulp.watch('./script/script.js', ['process-javascript']);
});

gulp.task('clean', function(){
  return gulp.src('./style.css', {read: false})
        .pipe(clean());
});

gulp.task('process', function (callback) {
  runSequence(
    ['process-sass', 'process-javascript'],
    'watch',
    callback);
});
