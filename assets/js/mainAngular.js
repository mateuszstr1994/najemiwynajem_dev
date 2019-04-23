/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var APP = angular.module("niwApp", []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

APP.controller("checkEmailController", function($scope, $http) {
    console.log('checkEmailController');
});

APP.controller("fosUserConfirmedController", ['$scope','$timeout', function($scope, $timeout) {
    console.log('fosUserConfirmedController');
    var stopped;
    $scope.counter = 15;
    $scope.redirectUrl =  angular.element('#redirectUrl').attr('href');
    $scope.countdown = function() {
        stopped = $timeout(function() {
            $scope.counter--;
            $scope.countdown();
        }, 1000);

        if($scope.counter < 1) {
            $timeout.cancel(stopped);
            angular.element('#clearAfterCountDown').remove();
            $scope.counter = 'Przekierowywanie';
            window.location.replace($scope.redirectUrl);
        }

    };

}]);




