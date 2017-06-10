var app = angular.module("RDash", [
    "ui.bootstrap",
    "ui.router",
    "oc.lazyLoad",
    "common.services"]);

app.config([
    '$stateProvider', '$urlRouterProvider',
    function($stateProvider, $urlRouterProvider) {
        
        $stateProvider
            .state('golongan', {
                url: '/golongan',
                templateUrl: '/angular/partialviews/golongan.html'
            }) 
            .state('pegawai', {
                url: '/pegawai',
                templateUrl: '/angular/partialviews/pegawai.html'
            })
            .state('notadinas', {
                url: '/notadinas',
                templateUrl: '/angular/partialviews/notadinas.html',
                           resolve: {
                service: ['$ocLazyLoad', function ($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        serie: true,
                        files: [
                            // 'assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css',
                            // 'assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css',
                            // 'assets/plugins/DataTables/media/js/jquery.dataTables.js',
                            // 'assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js',
                            // 'assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js',
                            // 'assets/plugins/DataTables/extensions/Select/js/dataTables.select.min.js',
                            'angular/plugins/bootstrap-datepicker/css/datepicker.css',
                            'angular/plugins/bootstrap-datepicker/css/datepicker3.css',
                            'angular/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'
                        ]
                    });
                }]
            },
            })
           
    }
]);