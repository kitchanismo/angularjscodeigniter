'use strict';

/* Services for request */

var srvcs = angular.module('app.services', []);

srvcs.factory('userRequest', function($http, $q) {
         	
         return {
      		get: function(id = true) {
      			var deferred = $q.defer();
               var url = '';

               if (id){
                  url = 'api/users';
               } else {
                  url = 'api/users/' + id;
               }  

               $http.get(url)            
               .then(function(data) {
      				deferred.resolve(data);
      			},function() {
      				deferred.reject();
      			});
      			return deferred.promise;
      		},

            post: function(req = null) {
               var deferred = $q.defer();
               var url = 'api/postuser';
              
               if (!req){
                  return;
               } 

               $http.post(url, req)            
               .then(function(data) {
                  deferred.resolve(data);
               },function() {
                  deferred.reject();
               });
               return deferred.promise;
            },

            put: function(req = null) {
               var deferred = $q.defer();
               var url = 'api/putuser';
           
               if (!req){
                  return;
               } 

               
               $http.post(url, req)            
               .then(function(data) {
                  deferred.resolve(data);
               },function() {
                  deferred.reject();
               });
               return deferred.promise;
            },

            delete: function(req = null) {
               var deferred = $q.defer();
               var url = 'api/deleteuser';
          
               if (!req){
                  return;
               } 

               $http.post(url, req)            
               .then(function(data) {
                  deferred.resolve(data);
               },function() {
                  deferred.reject();
               });
               return deferred.promise;
            }
            //other request
      };
   }
);

