(function () {
    "use strict";
    angular
        .module("common.services")
        .factory("sampleResource",
                ["$resource",
                 sampleResource]);
    function sampleResource($resource) {
        return $resource("/api/samples/:action/:_id",
               { _id: '@_id' },
               {
                 init: { method: 'GET',params:{action:'Init'}},
                 add: {method:'POST', params: {action:'Create'}},
                 get: {method:'GET'},
                 update: {method:'POST',params:{action:'Update'}},
                 delete: {method:'POST',params:{action:'Delete'}}
               })
    }
}());