app.config(
    ['$routeProvider',function($routeProvider){
        $routeProvider.
            when('/heros',{templateUrl:'./views/herolist.html',controller:'heros'}).
            when('/hero/:heroname',{templateUrl:'./views/heroinfo.html',controller:'herodetails'}).
            when('/items',{templateUrl:'./views/itemlist.html',controller:'items'}).
            otherwise({redirectTo:'/heros'})
    }]
);