var app = angular.module('myApp', ["ngRoute"]);

app.run(function($rootScope, $location, $anchorScroll, $routeParams) {
    $rootScope.$on('$routeChangeSuccess', function(newRoute, oldRoute) {
      $location.hash($routeParams.scrollTo);
      $anchorScroll();  
    });
  })
  
  app.controller('myCtrl', ['$scope','$location', '$anchorScroll', '$routeParams', '$http',function($scope, $location, $anchorScroll, $routeParams, $http) {
/****************************************************************************************/
/*									Variable initialization								*/
/*																						*/
/****************************************************************************************/

//Delete Modal
$scope.getModalID =0;
$scope.getID = function(productsCode){
    $scope.getModalID =productsCode;
}
//Alert
$scope.message=false;

//Sending JSON
function dataPost(dataJSON){
    $http ({
        method: "post",
        url: 'model/insert.php',
        data: dataJSON,
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        

   
    }).then(function mySuccess(response) {
        window.location.reload();
        $scope.message=true;   
      });
      
}

//Scroll button function
    mybutton = document.getElementById("myBtn");

    window.onscroll = function() {scrollFunction()};
    
    //displaying button Top
    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    
    //Form functions
    
    $scope.import_fun = function(code,nam,quantity,date,faktura){
        

        $scope.importJson=[{
            "table_name": "import",
            "product_code": code ,
            "product_name": nam ,
            "quantity": quantity,
            "date": date,
            "faktura" : faktura,
           
        }];

        dataPost($scope.importJson);
        
       
    } //End import_fun

    $scope.export_fun = function(code,nam,quantity,ispratnica_date,ispratnica_no){
        

        $scope.exportJson=[{
            "table_name": "export",
            "product_code": code,
            "product_name": nam,
            "quantity": quantity,
            "ispratnica_date": ispratnica_date,
            "ispratnica_no": ispratnica_no
        }];

        dataPost($scope.exportJson);
        
    }// End export_fun

    $scope.trash_fun =function(code,nam,quantity,date) {
        

        $scope.trashJson = [{
            "table_name": "trash",
            "product_code": code,
            "product_name": nam,
            "quantity": quantity,
            "date": date
        }];

        dataPost($scope.trashJson);
        
    }// End trash_fun

    $scope.deleteRow = function(code){
        $scope.deleteJSON = [{
            "table_name": "import",
            "pk_value": code
        }];
        $http ({
            method: "post",
            url: 'model/delete.php',
            data: $scope.deleteJSON,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            
        }).then(function mySuccess(response) {
            window.location.reload();
            $scope.message=true;
          });
    }// End delete function
    

/****************************************************************************************/
/*								        	JSON	        							*/
/****************************************************************************************/


$scope.product=[]

$http.get("model/select.php?table_name=product").then(function (response) {$scope.product = response.data.records;});

$scope.import=[]

$http.get("model/select.php?table_name=import").then(function (response) {$scope.import = response.data.records;});

$scope.export=[]

$http.get("model/select.php?table_name=export").then(function (response) {$scope.export = response.data.records;});

$scope.trash=[]

$http.get("model/select.php?table_name=trash").then(function (response) {$scope.trash = response.data.records;});


}]);