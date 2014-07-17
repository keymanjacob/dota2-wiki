var app = angular.module('dota2',['ui.bootstrap','ngRoute']);
app.controller('heros',function($scope,$http){
    $http({method: 'GET', url: './img/heros.json'})
    .success(function(data){
        $scope.heros=data;
    });
});


app.controller('clock', function($scope) {  
    var updateClock = function() {    
        $scope.clock = new Date();  };  
    var timer = setInterval(function() {    
        $scope.$apply(updateClock);  }, 1000);  
        updateClock();});

app.controller('vote',function($scope){
    $scope.like=0;
    $scope.hate=0;
    $scope.addlike=function(){$scope.like +=1;};
    $scope.addhate=function(){$scope.hate -=1;};
});

app.controller('herodetails',function($scope,$routeParams,$http){
    $http.get('herodetails/'+$routeParams.heroname+'.json').success(function(data){
        $scope.details=data;
    });
});

app.controller('items',function($scope,$http){
    $http({method: 'GET', url: './img/items.json'})
    .success(function(data){
        $scope.items=data;
        $scope.showdetails=false;
        $scope.show=function(){
            $scope.showdetails=true;
        }
    });
});

