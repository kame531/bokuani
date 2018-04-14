var gulp = require("gulp"),
    sass = require("gulp-sass"),
    browserSync = require("browser-sync"),
    connect = require('gulp-connect-php'),
    autoprefixer = require("gulp-autoprefixer"),
    imageMin = require("gulp-imagemin"),
    pngquant = require("imagemin-pngquant"),
    sourcemaps = require("gulp-sourcemaps");

gulp.task("sass", function(){
  gulp.watch("src/sass/*.scss",function(){
    console.log("sassコンパイル");
    gulp.src("src/sass/*.scss")
    .pipe(sass({
      outputStyle:"expended"
    }))
    //ベンダープレフィックス
    .pipe(autoprefixer({
      browsers:["firefox >= 2","android >= 4"]
    }))
    .pipe(gulp.dest("src/css/"));
  });
});

// gulp.task("server", function(){
//   browserSync.init({
//     server: {
//       baseDir:"./src"
//     }
//   });
//   gulp.watch("src/**",function(){
//   browserSync.reload();
//   });
// });

gulp.task('server', function() {
  connect.server({
    port:2001,
    base:"./src"
  }, function (){
    browserSync({
      proxy: 'localhost:2001'
    });
  });
  gulp.watch("src/**",function(){
  browserSync.reload();
  });
});

//ディベロッパーツールでscssを表示
gulp.task("sourcemaps",function () {
  gulp.src("src/sass/style.scss")
  .pipe(sourcemaps.init()) //ソースマップ出力処理の初期化
  .pipe(sass())
  .pipe(sourcemaps.write("./")) //cssと同じ階層にソースマップを出力
  .pipe(gulp.dest("src/css/"));
});

//画像を圧縮
gulp.task("imagemin",function () {
  gulp.src("src/img/*.png")
  .pipe(imageMin(
    [pngquant({quality: "70"})]
  ));
});

gulp.task("default",["server","sass"]);
