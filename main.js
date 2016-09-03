angular.module('myApp', [])
    .controller('GitController', function($scope, $http) {
        $scope.$watch('search', function() {
            fetch();
        });

        $scope.$watch('stars', function() {
            fetch();
        });

        $scope.page = 1;

        $scope.$watch('page', function() {
            fetch();
        });

        $scope.addPage = function() {
            $scope.page++;
            console.log($scope.page);
        };

        $scope.removePage = function() {
            $scope.page--;
            console.log($scope.page);
        };

        $scope.keepPage = function() {
            $scope.page = $scope.page;
            console.log($scope.page);
        };

        $scope.lastPage = function() {
            $scope.page = Math.round($scope.details[total_count]/30);
            console.log($scope.page);
        };

        $scope.Math = window.Math;
        $scope.search = "";
        $scope.stars = "";
        $scope.limit = "";

        function fetch() {
            if ($scope.search === "c++" || $scope.search === "C++") {
                $scope.search = "cpp";
            }
            if ($scope.stars === "") {
                $http.get("https://api.github.com/search/repositories?q=language:" + $scope.search + "&sort=forks&order=desc&page=" + $scope.page)
                    .then(function(response) {
                        $scope.details = response.data;
                    });
            } else {
                $http.get("https://api.github.com/search/repositories?q=language:" + $scope.search + "+stars:>=" + $scope.stars + "&sort=forks&order=desc&page=" + $scope.page)
                    .then(function(response) {
                        $scope.details = response.data;
                    });
            }
        }
    });
