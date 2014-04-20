<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js" type="text/javascript"></script>
<!--    <script src="lib/angular-0.9.19.min.js"></script>-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyChat</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <!--[endif]-->
</head>
<body>
<div ng-controller="MyChatCtrl" class="container">
    <div class="header">
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
        </ul>
        <h3 class="text-muted">MyChat</h3>
    </div>

    <div class="jumbotron">
<ul>
    <li ng-repeat="message in messages">{{message}}</li>
</ul>
<!--                    --><?php //require 'mychat.php' ?>
    </div>

    <div class="row">
        <form ng-submit="addMessage()">
            <div class="col-lg-8">
                <input type="text" class="form-control" ng-model="contents" placeholder="Message"/>
            </div>
            <div class="col-lg-4">
                <input type="text" class="form-control" ng-model="username" placeholder="Anonymous"/>
            </div>
            <div class="col-lg-12">
                <input class="btn btn-primary pull-right" style="margin: 4px;" type="submit" value="Submit"
                       id="btn-chat"/>
            </div>
        </form>

    </div>

    <div class="footer">
        <p>&copy; Blake Ross 2014</p>
    </div>

</div>
<!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="lib/bootstrap.min.js"></script>
<script src="js/controllers.js"></script>
</body>
</html>