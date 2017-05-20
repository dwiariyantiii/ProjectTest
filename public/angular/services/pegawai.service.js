(function () {
    "use strict";
    angular
        .module("common.services")
        .factory("pegawaiResource",
                ["$resource",
                 pegawaiResource]);
    function pegawaiResource($resource) {
        return $resource("/api/pegawai/:action/:id",
               { id: '@id' },
               {
                 init: { method: 'GET'},
                 add: {method:'POST'},
                 get: {method:'GET'}, 
                 create:{method :'GET', params:{action:"create"}},
                 update: {method:'POST', params:{action:"update"}},
                 delete: {method:'POST',params:{action:'delete'}}
               })
    }
}());