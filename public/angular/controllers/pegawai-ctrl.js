app.controller('pegawaicontroller', function ($scope,$state,pegawaiResource) {
  $scope.widgetShow = false;
  $scope.success = "false";
  $scope.init = [];
  $scope.data = {};
  $scope.golonganlist = [];
  var pegawairesource = new pegawaiResource();
   
   $scope.initData = function()
   { 
       pegawairesource.$init({}, function(data)
       {
          angular.forEach(data.obj, function(item)
          {
              $scope.init.push(item);
          })
       });
   }
   $scope.initData();

  $scope.btnAddClick = function()
  {
    $scope.data = {};
    pegawairesource.$create({},function(data)
    {
        $scope.golonganlist = data.obj;
    });
    $("#modal-add").modal('show');
  }

  $scope.AddClick = function()
  {
      $("#modal-add").modal('hide');
      pegawairesource.NIP = $scope.data.NIP;
      pegawairesource.Nama = $scope.data.Nama;
      pegawairesource.Gelar = $scope.data.Gelar;
      pegawairesource.Jabatan = $scope.data.Jabatan;
      pegawairesource.GolonganID = $scope.data.GolonganID;
      pegawairesource.CreatedBy = "Dwi";
      
      pegawairesource.$add({},function(data)
      {
          console.log(data);
          if(data.success)
        {
            $scope.widgetShow  = true;
            $scope.success = true;
            $scope.message = "Data pegaawai berhasil disimpan";
            $scope.init = [];
            $scope.initData();
        }
        else
        {
            $scope.message = "Error";
        }
    })   
   }



});