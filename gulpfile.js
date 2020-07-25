const gulp = require('gulp');
const postcss = require('gulp-postcss');
const plumber = require('gulp-plumber');
const zip = require('gulp-zip');
const target = './'

gulp.task('build-css', function () {
  return gulp.src('./css/style.css')
    .pipe(plumber())
    .pipe(postcss())
    .pipe(gulp.dest(target))
});

gulp.task('build', ['build-css'] )

gulp.task('watch', ['build'], () => {
  gulp.watch('css/**', ['build'])
  gulp.watch('tailwind.js', ['build'])
})

gulp.task('default', ['watch'])

function archiveId() {
  let iso = new Date().toISOString().split('T')
  ,   datepart = iso[0]
  ,   timepart = iso[1].substring(0,5).replace(':' , '')
  ,   timestamp =  '.' + datepart + '-'+ timepart
  ,   extension = '.zip'
  
  return __dirname +  timestamp + extension;
}


/** Packaging is a discrete task. **/

gulp.task('zip', ['build'], () =>
  gulp.src(['**/*.css','**/*.php', '!node_modules/**'])
    .pipe(zip(archiveId()))
    .pipe(gulp.dest('dist/'))
)
