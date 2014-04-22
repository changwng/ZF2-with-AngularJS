<!doctype html>
<html lang="en" ng-app="myApp">
    <head>
        <meta charset="UTF-8">
        <title>AngularJS Zend2 Sample APP</title>

        <link href="js/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/navbar.css"/>

        <script type="text/javascript" src="js/lib/jquery/jquery.js"></script>
        <script type="text/javascript" src="js/lib/jquery/jquery.i18n.properties-min-1.0.9.js"></script>
        <script type="text/javascript" src="js/lib/jquery/html5shiv.js"></script>
        <script type="text/javascript" src="js/lib/jquery/holder.js"></script>
        <script type="text/javascript" src="js/lib/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="js/lib/angular.js"></script>
        <script type="text/javascript" src="js/lib/angular-resource.js"></script>
        <script type="text/javascript" src="js/lib/angular-route.js"></script>
        <script type="text/javascript" src="js/lib/angular-cookies.js"></script>

        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="js/services.js"></script>
        <script type="text/javascript" src="js/controllers.js"></script>
    </head>
    <body ng-controller="AlbumListCtrl">
        <div class="container">

            <!-- Static navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#/list">Album List</a></li>
                            <li><a href="#/new-album">New Album</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </div>

            <!-- Main component for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div ng-view></div>
            </div>

        </div> <!-- /container -->
    </body>
</html>