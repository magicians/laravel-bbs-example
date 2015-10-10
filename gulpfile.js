'use strict';

var elixir = require('laravel-elixir'),
    gulp = require('gulp'),
    shell = require('gulp-shell'),
    plumber = require('gulp-plumber'),
    watch = require('gulp-watch'),
    notify = require('gulp-notify'),
    Task = elixir.Task;

elixir.extend('configCache', function () {
 new Task('configCaching', function () {
  return gulp.src('')
      .pipe(plumber())
      .pipe(shell('php artisan config:cache', {
       quiet: true
      }))
      .on('error', notify.onError({
       title: 'config:cache Failed',
       message: 'Error(s) occurred config:cache...'
      }));
 }).watch('config/**/*.php');
});

// Do not use a closure in all the routes in order to serialize
//elixir.extend('routeCache', function () {
// new Task('routeCaching', function() {
//  return gulp.src('')
//      .pipe(plumber())
//      .pipe(shell('php artisan route:cache', {
//       quiet: true
//      }))
//      .on('error', notify.onError({
//       title: 'route:cache Failed',
//       message: 'Error(s) occurred route:cache...'
//      }));
// }).watch('app/Http/routes.php');
//});

elixir(function(mix) {
 mix.sass('app.scss')
     .configCache();
//     .routeCache();
});

elixir(function(mix) {
  mix.browserify('app.js');
});


