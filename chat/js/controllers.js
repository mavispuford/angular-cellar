function RouteCtrl($route) {

    var self = this;

    $route.when('/wines', {template:'tpl/welcome.html'});

    $route.when('/wines/:wineId', {template:'tpl/wine-details.html', controller:WineDetailCtrl});

    $route.otherwise({redirectTo:'/wines'});

    $route.onChange(function () {
        self.params = $route.current.params;
    });

    $route.parent(this);

    this.addWine = function () {
        window.location = "#/wines/add";
    };

}

function WineListCtrl(Wine) {

    this.wines = Wine.query();

}

function WineDetailCtrl(Wine) {

    this.wine = Wine.get({wineId:this.params.wineId});


    this.saveWine = function () {
        if (this.wine.id > 0)
            this.wine.$update({wineId:this.wine.id});
        else
            this.wine.$save();
        window.location = "#/wines";
    }

    this.deleteWine = function () {
        this.wine.$delete({wineId:this.wine.id}, function() {
            alert('Wine ' + wine.name + ' deleted')
            window.location = "#/wines";
        });
    }

}

function MyChatCtrl($scope,$http, $location, $anchorScroll){
    $scope.messages = [];

    $http.get("/api/messages")
        .success(function(data, status, headers, config){
            console.log("messages retrieved successfully");
            $scope.messages = data;
//            console.log($scope.messages);

            // Scroll to the newest message
            $location.hash('msg_id-' + $scope.messages[$scope.messages.length - 1].id);
            $anchorScroll();
        });

    $scope.addMessage = function() {
        if (!$scope.username)
        {
            $scope.username = 'Anonymous';
        }

        $http.post("/api/messages",{'username': $scope.username, 'contents': $scope.contents})
            .success(function(data, status, headers, config){
                console.log("inserted Successfully: " + data.contents);
                $scope.messages.push(data);

                // Scroll to the newly-added message
                $location.hash('msg_id-' + data.id);
                $anchorScroll();

                // Clear the user's message box
                $scope.contents = '';
            });
    }
}