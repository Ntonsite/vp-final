
var myApp = angular.module('myApp', []);

myApp.controller('MyController', function MyController($scope, $http)
{
	$http.get('assets/js/data.json').then(function(response){
		$scope.phones = response.data;
	});

	$http.get('assets/js/departments.json').then(function(response){
		$scope.departments = response.data;
	});
});
