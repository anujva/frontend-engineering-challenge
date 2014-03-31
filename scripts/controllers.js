var myNameSpace = angular.module("MyApp", []);

myNameSpace.controller("MyController", function MyController($scope, $http){
	$http.get('scripts/data.json').success(function(data){
		$scope.datafeed = data;
	});
});