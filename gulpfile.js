'use strict';
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var importer = require('node-sass-globbing');
var plumber = require('gulp-plumber');
var browserSync = require('browser-sync').create();
//var cssmin = require('gulp-cssmin');
var cleanCSS = require('gulp-clean-css');
var uncss = require('gulp-uncss');
var stripCssComments = require('gulp-strip-css-comments');
var uglify = require('gulp-uglify');
var livereload = require('gulp-livereload')
var sass_config = {
  importer: importer,
  includePaths: [
    'node_modules/compass-mixins/lib/'
  ]
};
//
//Compiles sass
gulp.task('sass', function () {
  gulp.src('./sass/**/*.scss')
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass(sass_config).on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 2 version']
    }))
    .pipe(stripCssComments())
    .pipe(cleanCSS())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./css'));
});

//Type "gulp" on the command line to watch file changes
gulp.task('default', function(){
  livereload.listen();
    gulp.watch('./sass/*.scss', ['sass']);
    gulp.watch(['./css/style.css'], function (files){
      livereload.changed(files)
    });
});
