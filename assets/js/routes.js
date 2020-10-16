app.config(function($routeProvider) {
  $routeProvider
  
  .when("/product", {
    templateUrl : "view/product.html",
	controller: 'myCtrl'
  })
  .when("/import", {
    templateUrl : "view/import.html",
	controller: 'myCtrl'
  })
  .when("/export", {
    templateUrl : "view/export.html",
	controller: 'myCtrl'
  })
  .when("/trash", {
    templateUrl : "view/trash.html",
	controller: 'myCtrl'
  })
});