const gulp = require('gulp');
const sass = require('gulp-sass');
 
gulp.task('sass', function() {
    return gulp.src('../css/app.scss')
        .pipe(sass())
        .pipe(gulp.dest('../css'));
});
gulp.task('watch', function() {
    gulp.watch('../css/*.scss', ['sass']);
    gulp.watch('../css/mods/*.scss', ['sass']);
});
gulp.task('default', ['sass', 'watch']);