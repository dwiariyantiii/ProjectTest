(function () {
    "use strict";
    angular
        .module("common.services")
        .factory("notadinasResource",
                ["$resource",
                 notadinasResource]);
    function notadinasResource($resource) {
        return $resource("/api/notadinas/:action/:id",
               { id: '@id' },
               {
                 init: { method: 'GET'},
                 add: {method:'POST'}
               })
    }
}());