var app = angular.module("RDash", [
    // "ui.bootstrap",
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
                templateUrl: '/angular/partialviews/notadinas.html'
            })
           
    }
]);