var myApp = angular.module('myApp', [
    'ngRoute',
    'ngCookies',
    'AlbumCtrl'
]);

myApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/admin', {
                templateUrl: 'partials/login.html',
                controller: 'loginCtrl',
                access: {
                    isFree: true
                }
            }).
            when('/list', {
                templateUrl: 'partials/albums.html',
                controller: 'AlbumListCtrl'
            }).
            when('/new-album', {
                templateUrl: 'partials/new.html',
                controller: 'NewAlbumCtrl'
            }).
            when('/edit/:id', {
                templateUrl: 'partials/edit.html',
                controller: 'EditAlbumCtrl'
            }).
            when('/album/:id', {
                templateUrl: 'partials/album.html',
                controller: 'AlbumCtrl'
            }).
            otherwise({
                redirectTo: '/admin'
            });
    }]);