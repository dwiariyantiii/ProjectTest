(function () {
    "use strict";
    angular
        .module("common.services")
        .factory("golonganResource",
                ["$resource",
                 golonganResource]);
    function golonganResource($resource) {
        return $resource("/api/golongan/:action/:id",
               { id: '@id' },
               {
                 init: { method: 'GET'},
                 add: {method:'POST'},
                 get: {method:'GET'},
                 update: {method:'POST', params:{action:"update"}},
                 delete: {method:'POST',params:{action:'delete'}}
               })
    }
}());