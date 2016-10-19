        
<!doctype html>
<html>
<head>
<title>Data Parser</title>

<!-- App Styles -->
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-theme.css">
</head>
<!-- @ngapp initiated -->
<body ng-app="dataParser" ng-controller="Entries as vm">
<!-- Loader  -->
<div id="loader" ng-if="vm.showLoader">
    <div class="show"></div>
</div>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <h3 class="no-mg-t">
                    <span class="logo_first">Data</span>
                    <span class="logo_second">Parser</span>
                </h3>
            </a>
        </div>
    </div>
</nav>
<!-- Search Box -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Search Products Here:</h4>
            <form ng-submit="vm.logNewUrl()">
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" ng-model="vm.url"class="form-control input-lg" placeholder="Enter Url Here"  required />
                        <span class="input-group-btn">
                            <button  class="btn btn-info btn-lg" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Products Listing -->
<div class="container">

  

    <div class="row" ng-if="vm.urlentries.length > 1">
        <div class="col-md-12">
            <h3 class="text-center">
                Products Listing
            </h3>
            <i class="pull-right alert-note">Note: &nbsp; Click on each table row to see its details.</i>
        </div>
        <div id="no-more-tables" rel="tooltip" data-original-title="Place your stuff here">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
                <thead class="cf">
                    <tr>
                        <th>Name</th>
                        <th>Product ID</th>
                        <th>Description</th>
                        <th class="numeric">Price</th>
                        <th class="numeric">Currency</th>
                        <th class="numeric">Category</th>
                        <th class="numeric">Product URL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="prod in vm.urlentries" data-toggle="modal" data-id="1" data-target="#myModal" ng-click="vm.showProductData(prod);">
                        <td data-title="Name">
                            <img class="prod_img col-md-5" ng-src="{{prod.imageURL}}" alt="{{prod.name}}">
                                <h5 class="prod_name col-md-7">{{prod.name}}</h5>
                            </td>
                            <td data-title="Product ID">
                                <h6>{{prod.productID}}</h6>
                            </td>
                            <td data-title="Description" ng-if="prod.description">
                                <h6>{{prod.description | truncate:80:" ..."}}</h6>
                            </td>
                            <td data-title="Price" class="numeric">
                                <h5>{{prod.price}}</h5>
                            </td>
                            <td data-title="Currency" class="numeric text-uppercase" ng-init="prod.currency = 'EUR'">
                                <h5>{{prod.currency}}</h5>
                            </td>
                            <td data-title="Category" class="numeric">
                                <p class="text-capitalize" ng-repeat="category in prod.categories">
                                        {{category}}
                                    </p>
                            </td>
                            <td data-title="Product URL" class="numeric" ng-if="prod.productURL">
                                <a ng-href="{{prod.productURL}}">
                                        {{prod.productURL  | truncate:40:" ->"}}
                                    </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br/>
          <div class="alert alert-danger" ng-if="vm.errorMsg">
               {{vm.errorMsgBody}}
          </div>
    </div>

    <!-- Product Detail Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Product Detail</h4>
                </div>
                <div class="modal-body">
                    <h2>{{vm.activeProduct.name}}</h2>
                    <hr/>
                    <p class="detail_heading">
                        <span>Product ID:</span> 
                        {{vm.activeProduct.productID}}
                        
                    </p>
                    <p  class="detail_heading">
                        <span>Category:</span>
                        <i ng-repeat="cat in vm.activeProduct.categories">{{cat}} &nbsp;</i>
                    </p>
                    <h5>{{vm.activeProduct.price}}, {{vm.activeProduct.currency}} </h5>
                    <h4>
                        <u>Description:</u>
                    </h4>
                    <p>{{vm.activeProduct.description}}</p>
                    <img class="prod_detail_img" ng-src="{{vm.activeProduct.imageURL}}" alt="{{vm.activeProduct.name}}" />
                    <p class="detail_heading">
                        <span>Product URL:</span>
                        <a ng-href="{{vm.activeProduct.productURL}}" target="_blank">{{vm.activeProduct.productURL}}</a>
                    </p>
                </div>
               
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
</body>
<!-- Application Dependencies -->
<script type="text/javascript" src="bower_components/angular/angular.js"></script>
<script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="bower_components/angular-bootstrap/ui-bootstrap.js"></script>
<script type="text/javascript" src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<script type="text/javascript" src="bower_components/angular-resource/angular-resource.js"></script>
<script type="text/javascript" src="bower_components/moment/moment.js"></script>
<!-- Application Scripts -->
<script type="text/javascript" src="scripts/app.js"></script>
<script type="text/javascript" src="scripts/controllers/TimeEntry.js"></script>
<script type="text/javascript" src="scripts/services/time.js"></script>
</html>