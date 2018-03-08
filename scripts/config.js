'use strict';
var cnfg = angular.module('app.config',['ngRoute']);

cnfg.config(function ($routeProvider,$locationProvider) {
    $routeProvider
    .when('/users', { 
         templateUrl: 'pages/sample.html', 
         controller: 'sampleController' 
    })
    .otherwise({
        redirectTo: function () {
          return '/';
        }
    })
   // get rid of hash bang(!)
    $locationProvider.hashPrefix('');
}); 


