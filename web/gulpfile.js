// Including plugins for Gulp
var gulp = require('gulp'), //Gulp itself
    bsync = require('browser-sync').create(), //Live reload while working
    util = require('gulp-util'),
    concat = require('gulp-concat'),
    autoprefixer = require('gulp-autoprefixer'),
    sasstocss = require('gulp-sass'),
    cssmin = require('gulp-cssmin'),
    htmlmin = require('gulp-htmlmin'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    gzip = require('gulp-gzip'),
    zip = require('gulp-zip');

// Tasks

// Compiling Sass to CSS and minifying css files
gulp.task('sass', function() {
    return gulp.src('./src/scss/**/*.scss')
        .pipe(sasstocss())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./src/css'))
        .pipe(cssmin())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./dist'))
    // .pipe(browserSync.stream())
})

// Minifying css files
gulp.task('cssmin', function() {
    return gulp.src('./src/css/**/*.css')
        .pipe(cssmin())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./dist'))
})

// Gathering all js and minifying them
gulp.task('js', function() {
    return gulp.src('./src/js/**/*.js')
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./dist'))
})

// Minifying images
gulp.task('imagemin', function() {
    return gulp.src('./images/*')
        .pipe(imagemin())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./images'))
})

// Gzipping
gulp.task('gzip', function() {
    return gulp.src('./dist/**/*.min.css')
        .pipe(gzip())
        .pipe(gulp.dest('./dist'))
})

// Minifying html files
gulp.task('htmlmin', function() {
    return gulp.src('./*.html')
        .pipe(htmlmin())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./'))
})

// Live reload
gulp.task('bsync', ['sass', 'cssmin', 'js'], function() {
    bsync.init({
        server: {
            baseDir: "./"
        }
    });
    gulp.watch('./src/scss/**/*.scss', ['sass']);
    gulp.watch('./src/js/**/*.js', ['js']);
    gulp.watch('./*.html').on('change', bsync.reload);
});
