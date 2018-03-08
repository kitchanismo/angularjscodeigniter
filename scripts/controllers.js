'use strict';

/* Controllers */

var ctrls = angular.module('app.controllers', ['app.services']);

ctrls.controller('mainController', function ($scope,userRequest) {
	
		$scope.message = "Welcome";
		$scope.users = {};
		$scope.newUser = {};

		$scope.loadUsers = function(req=true){
			userRequest.get(req)
			.then(function(res){
	   			$scope.users = res.data.users;
	 	 	})
	 	 	.catch(function(res) {
				$scope.message = 'Error: ' + res;
			});
	 	 	;
		};

		$scope.addUser = function(){
			userRequest.post($scope.newUser)
			.then(function(res){
	   			$scope.message = res.data.alert;
	   			$scope.loadUsers();
	 	 	})
			.catch(function(res) {
				$scope.message = 'Error: ' + res;
			});
		};

		$scope.updateUser = function(){
			userRequest.put($scope.newUser)
			.then(function(res){
	   			$scope.message = res.data.alert;
	   			$scope.loadUsers();
	 	 	})
	 	 	.catch(function(res) {
				$scope.message = 'Error: ' + res;
			});
	 	 	;
		};

		$scope.deleteUser = function(){
			userRequest.delete($scope.newUser)
			.then(function(res){
	   			$scope.message = res.data.alert;
	   			$scope.loadUsers();
	 	 	})
	 	 	.catch(function(res) {
				$scope.message = 'Error: ' + res;
			});;
		};

		$scope.selectUser = function(user) {
			//$scope.loadUsers(false);
			$scope.newUser = user;
		};
	}
);


ctrls.controller('aboutController', function($scope) {
	$scope.sample = "vampiping";
});

