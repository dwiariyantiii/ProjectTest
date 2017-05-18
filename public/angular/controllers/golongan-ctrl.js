app.controller('golongancontroller', function ($scope,$state,golonganResource) {
  $scope.widgetShow = false;
  $scope.success = "false";
  $scope.init = [];
  $scope.data = {};
  $scope.message = {};
  $scope.golongan = {};
  $scope.editmode = false;
  var golonganresource = new golonganResource();

  
  $scope.initgolongan = function()
  {
      golonganresource.$init({}, function(data)
    {
      if(data.success)
      {
          angular.forEach(data.obj, function(item)
          {
              $scope.init.push(item);
          })
      }
      //console.log($scope.init);  
        });
  }
  $scope.initgolongan();

  $scope.btnAddClick = function()
  {
    $scope.data = {};
    $("#modal-add").modal('show');
  }
  $scope.AddClick = function()
  {
    $("#modal-add").modal('hide');
    console.log($scope.data);
    golonganresource.Golongan = $scope.data.golongan;
    golonganresource.Pangkat = $scope.data.pangkat;
    golonganresource.CreatedBy = "Test";
    golonganresource.$add({},function(data)
    {
        if(data.success)
        {
            $scope.widgetShow  = true;
            $scope.success = true;
            $scope.message = "Data golongan berhasil disimpan";
            $scope.init = [];
            $scope.initgolongan();
        }
        else
        {
            $scope.message = "Error";
        }
    })
  }
  $scope.btnDetailClick = function(id)
  {
    golonganresource.$get({'id': id}, function(data)
    {
      if(data.success)
      {
        $scope.golongan = data.obj;
        $("#modal-detail").modal('show');
        //console.log($scope.golongan);
      }
    })
  }

  $scope.UpdateClick = function()
  {
    golonganresource.Golongan = $scope.golongan.Golongan;
    golonganresource.Pangkat = $scope.golongan.Pangkat;
    golonganresource.CreatedBy = "Test";
    golonganresource.$update({'id':$scope.golongan.id},function(data)
    {
        $("#modal-detail").modal('hide');
        $scope.init = [];
        $scope.initgolongan();
    })
  }
  $scope.btnDeleteClick = function(id)
  {
     $("#modal-delete").modal('show');
     $scope.deleteid = id;
  }
$scope.DeleteClick = function()
{
  golonganresource.$delete({'id':  $scope.deleteid },function(data)
    {
      
        $scope.init = [];
         $("#modal-delete").modal('hide');
        $scope.initgolongan();
    })
}
$scope.btnEditClick = function()
{
  $scope.editmode = true;
}


});