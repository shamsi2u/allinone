
var app = angular.module('qoute', []);

app.controller('formCtrl',function($scope, $http,$timeout) {
    /*
    * This method will be called on click event of button.
    * Here we will read the email and password value and call our PHP file.
    */
    console.log("im  worjking ");
    
    $scope.formsubmit = function () {

       
    //document.getElementById("message").textContent = "";
    //document.querySelector('message').textContent="";
    
    var request = $http({
        method: "post",
        url: "contactform.php",
        data: {
            email: $scope.email,
            phone: $scope.phone,
            service: $scope.service,
            name :$scope.name,
            question:$scope.question,
            

        },
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    });
    
    /* Check whether the HTTP Request is successful or not. */
     request.then(function (data) {
        // document.getElementById("message").textContent = "You have login successfully with email "+data;
        console.log("sucessfully posted to php")
    });
    }
    });