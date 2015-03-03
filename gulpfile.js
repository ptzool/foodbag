var elixir = require('laravel-elixir');

var gulp = require('gulp');

var paths = {
    'jquery': './vendor/bower_components/jquery/',
    'bootstrap': './vendor/bower_components/bootstrap/',
    'bsdate': './vendor/bower_components/bootstrap-datepicker/',
    'datatables': './vendor/bower_components/datatables/',
    'dtplugins': './vendor/bower_components/datatables-plugins/',
    'adminlte': './vendor/almasaeed2010/adminlte/',
    'typeahead': './vendor/bower_components/typeahead.js/',
}

elixir(function(mix) {

    mix.less('app.less')
        .copy(paths.bootstrap + 'dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css')
        //.copy(paths.bootstrap + 'dist/css/bootstrap-theme.min.css', 'public/css/bootstrap-theme.min.css')
        .copy(paths.adminlte + 'dist/css/AdminLTE.min.css', 'public/css/AdminLTE.min.css')
        .copy(paths.adminlte + 'dist/css/skins/_all-skins.min.css', 'public/css/_all-skins.min.css')
        .copy(paths.dtplugins + 'integration/bootstrap/3/dataTables.bootstrap.css', 'public/css/dataTables.bootstrap.css')
        .copy(paths.bsdate + 'css/datepicker3.css', 'public/css/datepicker3.css')
        .stylesIn("public/css")
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "dist/js/bootstrap.js",
            paths.adminlte + 'dist/js/app.min.js',
            paths.datatables + 'media/js/jquery.dataTables.min.js',
            paths.dtplugins + 'integration/bootstrap/3/dataTables.bootstrap.js',
            paths.bsdate + 'js/bootstrap-datepicker.js',
            paths.typeahead + 'dist/typeahead.jquery.min.js',
            paths.typeahead + 'dist/bloodhound.min.js'

        ], "public/js/all.js", "./" )
        //.version(["css/all.css", "js/all.js"], './public')
        .copy(paths.bootstrap + 'dist/fonts', 'public/fonts');

});

// mix.copy(paths.bootstrap + 'dist/fonts', 'public/build/fonts')

gulp.task('copyfiles', function() {
    gulp.src(paths.bootstrap + 'dist/fonts')
        .pipe(gulp.dest('public/build/fonts'));
});