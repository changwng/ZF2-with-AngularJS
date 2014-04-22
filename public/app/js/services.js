myApp.factory('UserService', [function() {
    var sdo = {
        isLogged: false,
        username: ''
    };
    return sdo;
}]);