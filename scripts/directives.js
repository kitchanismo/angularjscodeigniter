var drs = angular.module('app.directives', []);

drs.directive('myApp', function() {
	return {
		// templateUrl: 'templates/home.html',
		 templateUrl: 'http://localhost/ci/',
		 controller: 'mainController' 
	}
});



