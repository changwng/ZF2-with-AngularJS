var AlbumCtrl = angular.module('AlbumCtrl', []);

AlbumCtrl.controller('AlbumListCtrl', ['$scope', '$http', '$rootScope', '$location', '$cookies',
    function ($scope, $http, $rootScope, $location, $cookies) {
        if(!$cookies.isLogged) {
            $location.path("/admin");
        }

		// this configuration depends on your site.
        $rootScope.appUrl = "http://yoursite";

        $http.get($rootScope.appUrl+'/album').success(function(data) {
            $scope.albumList = data['data'];
        });
        $scope.addAlbum = function() {
            $location.path("/new-album");
        }

        $scope.editAlbum = function(index) {//alert($scope.albumList[index].id);
            $location.path('/edit/' + $scope.albumList[index].id);
        }

        $scope.delAlbum = function(index) {
            var todel = $scope.albumList[index];
            $http
                .delete( $rootScope.appUrl+'/album/' + todel.id)
                .success(function(data, status, headers, config) {
                    $location.path("/albums");
                }).error(function(data, status, headers, config) {
                });
        }
    }]);

AlbumCtrl.controller('AlbumDetailCtrl', ['$scope', '$rootScope', '$routeParams', '$cookies',
    function($scope, $rootScope, $routeParams, $cookies) {
        if(!$cookies.isLogged) {
            $location.path("/admin");
        }
        $scope.albumId = $routeParams.albumId;
    }]);

AlbumCtrl.controller('NewAlbumCtrl',['$scope', '$rootScope', '$http', '$location', '$cookies',
    function($scope, $rootScope, $http, $location, $cookies) {
        if(!$cookies.isLogged) {
            $location.path("/admin");
        }

        $scope.album = {};
        $scope.saveAlbum = function() {
            $http.post($rootScope.appUrl+'/album', $scope.album)
                .success(function(data, status, headers, config) {
                    $location.path('/albums');
                })
                .error(function(data, status, headers, config) {
                    console.log(data);
                });
        }
}]);

AlbumCtrl.controller('EditAlbumCtrl', ['$scope', '$http', '$rootScope', '$routeParams', '$location', '$cookies',
    function($scope, $http, $rootScope, $routeParams, $location, $cookies) {
        if(!$cookies.isLogged) {
            $location.path("/admin");
        }

        $scope.album = {};

        $http.get($rootScope.appUrl+'/album/' + $routeParams['id'])
            .success(function(data, status, headers, config) {
                $scope.album = data.data;
                angular.copy($scope.album, $scope.copy);
            }).error(function(data, status, headers, config) {
                console.log(data);
            });

        $scope.updateAlbum = function() {
            $http.put($rootScope.appUrl+'/album/' + $scope.album.id, $scope.album)
                .success(function(data, status, headers, config) {
                    $location.path('/albums');
                })
                .error(function(data, status, headers, config) {
                    console.log(data);
                });
        }
}]);

AlbumCtrl.controller('AlbumCtrl',['$scope', '$http', '$rootScope', '$routeParams', '$location', '$cookies',
    function($scope, $http, $rootScope, $routeParams, $location, $cookies) {
        if(!$cookies.isLogged) {
            $location.path("/admin");
        }
        $scope.album = {};

        $http.get($rootScope.appUrl+'/album/' + $routeParams['id'])
            .success(function(data, status, headers, config) {
                $scope.album = data.data;
            }).error(function(data, status, headers, config) {
                console.log(data);
            });

}]);

// for login
AlbumCtrl.controller('loginCtrl',['$scope', '$http', '$rootScope', '$location', '$cookies',
    function($scope, $http, $rootScope, $location, $cookies) {
        if($cookies.isLogged) {
            $location.path("/list");
        }
        $scope.user = {};
        $scope.login = function() {
            $http.post($rootScope.appUrl+'/admin', $scope.user)
                .success(function(data, status, headers, config) {
                    if (data.status == 1) {
                        // successful login
                        var userInfo = data['userInfo'];
                        $cookies.isLogged = true;
                        $cookies.username = userInfo.username;
                    }
                    else {
                        $cookies.isLogged = false;
                        $cookies.username = '';
                    }
                    $location.path('/list');
                })
                .error(function(data, status, headers, config) {
                    $cookies.isLogged = false;
                    $cookies.username = '';
                    console.log(data);
                });
        }
}]);