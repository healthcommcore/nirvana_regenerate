'use strict';

const dir = {
  src : 'sass/style.scss',
  build: 'css/'
};

const 
  gulp = require('gulp'),
  sass = require('gulp-sass')(require('sass')),
  //sass = require('gulp-sass'),
  sourcemaps = require('gulp-sourcemaps'),
  postcss = require('gulp-postcss'),
  cssnano = require('cssnano'),
  autoprefixer = require('autoprefixer'),
  browsersync = require('browser-sync').create()
;

const clean = () => {
  console.log(dir.src);
  return gulp
  .src(dir.src)
  .pipe(sourcemaps.init())
  .pipe(sass()).on('error', sass.logError)
  .pipe(postcss([autoprefixer()]))
  .pipe(sourcemaps.write('./'))
  .pipe(gulp.dest(dir.build))
  .pipe(browsersync.stream());
};

const reload = () => {
  browsersync.reload();
}

const watch = () => {
  browsersync.init({
    proxy: "regenerate.dr809.test",
    browser: "firefox"
  });
  gulp.watch(dir.src, clean).on('change', browsersync.reload);
  /*
  gulp.watch(dir.src, clean);
  */
}

const build = gulp.parallel(clean, watch);

exports.clean = clean;
exports.watch = watch;
exports.default = build;
