var gulp = require('gulp');
var sass = require('gulp-sass')

gulp.task('sass', function () {
    gulp.src('./webroot/sass/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('./webroot/css'));
});