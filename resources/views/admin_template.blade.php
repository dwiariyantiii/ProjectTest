<!DOCTYPE html>
<html ng-app="RDash">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-SPPD</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

   <link href="gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
     <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script type='text/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link href="gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="gentelella-master/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="gentelella-master/build/css/custom.min.css" rel="stylesheet">   
 

  <!--library-->
  <script type='text/javascript' src="angular/plugins/angular/angular.js"></script>
  <script type='text/javascript'  src="angular/plugins/angular/ocLazyLoad.min.js"></script>
  <script type='text/javascript' src="angular/plugins/angular-ui-router/release/angular-ui-router.js"></script>
  <script type='text/javascript' src="angular/plugins/angular/angular-resource.js"></script>


  <!--plugins-->
  <script type='text/javascript' src="angular/route.js"></script>


</head>
<body class="nav-md footer_fixed" ng-controller="mastercontroller" style="background:#e3e3e3">
@if(Auth::check()) 
<div class="container body" >
      <div class="main_container">
       <!-- Header -->
        @include('header')
              <!-- page content -->
        <div class="right_col" role="main" ui-view >
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
         @include('footer')
        <!-- /footer content -->
      </div>
</div>
@else
<div class="right_col" role="main" >
    @yield('content')
</div>
@endif
    <!-- jQuery -->
    <script type='text/javascript' src="gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script type='text/javascript' src="gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script type='text/javascript' src="gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script type='text/javascript' src="gentelella-master/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script type='text/javascript' src="gentelella-master/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script type='text/javascript' src="gentelella-master/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script type='text/javascript' src="gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script type='text/javascript' src="gentelella-master/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script type='text/javascript' type='text/javascript' src="gentelella-master/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script type='text/javascript' src="gentelella-master/vendors/Flot/jquery.flot.js"></script>
    <script type='text/javascript' src="gentelella-master/vendors/Flot/jquery.flot.pie.js"></script>
    <script type='text/javascript' src="gentelella-master/vendors/Flot/jquery.flot.time.js"></script>
    <script type='text/javascript' src="gentelella-master/vendors/Flot/jquery.flot.stack.js"></script>
    <script type='text/javascript' src="gentelella-master/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script type='text/javascript' src="gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script type='text/javascript' src="gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script type='text/javascript' src="gentelella-master/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script type='text/javascript' src="gentelella-master/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script type='text/javascript' src="gentelella-master/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script type='text/javascript' src="gentelella-master/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script type='text/javascript' src="gentelella-master/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script type='text/javascript' src="gentelella-master/vendors/moment/min/moment.min.js"></script>
    <script type='text/javascript' src="gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script type='text/javascript' src="gentelella-master/build/js/custom.min.js"></script>





    <!--service-->
<script src="angular/services/common.service.js"></script>
<script src="angular/services/sampleResource.js"></script>
<script src="angular/services/golonganResource.js"></script>
<script src="angular/services/passingdata.service.js"></script>


    <!--controller-->
<script src="angular/controllers/Master.js"></script>
<script src="angular/controllers/sample-ctrl.js"></script>
<script src="angular/controllers/golongan-ctrl.js"></script>

</body>
</html>
