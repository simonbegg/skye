var postcss = require("gulp-postcss");
var gulp = require("gulp");
var browserSync = require("browser-sync").create();

// Compile sass into CSS & auto-inject into browsers
gulp.task("postcss", function () {
  return gulp
    .src("./static/css/*.css")
    .pipe(postcss())
    .pipe(gulp.dest("./static/css/dist"))
    .pipe(browserSync.reload({ stream: true }));
});

// Static Server + watching scss/html files
gulp.task(
  "serve",
  gulp.series("postcss", function () {
    browserSync.init({
      proxy: "skye.local",
    });
    gulp.watch(
      [
        "./static/css/*.css",
        "./static/css/components/*.css",
        "./tailwind.config.js",
        "./views/**/*.twig",
        "./**/*.twig",
      ],
      gulp.series("postcss")
    );
    gulp
      .watch([
        "./static/css/dist/*.css",
        "./views/**/*.twig",
        "./**/*.twig",
        "./tailwind.config.js",
      ])
      .on("change", browserSync.reload);
  })
);

gulp.task("build", gulp.series("postcss"));
gulp.task("default", gulp.series("serve"));
