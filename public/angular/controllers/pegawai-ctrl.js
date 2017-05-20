app.controller('pegawaicontroller', function ($scope,$state,$filter,pegawaiResource) {
  $scope.widgetShow = false;
  $scope.success = "false";
  $scope.init = [];
  $scope.data = {};
  $scope.golonganlist = [];
  $scope.pegawai = {};
  $scope.editmode = false;
  var pegawairesource = new pegawaiResource();
   
   $scope.initPegawai = function()
   { 
       pegawairesource.$init({}, function(data)
       {
          angular.forEach(data.obj, function(item)
          {
              $scope.init.push(item);
          })
       });
   }
   $scope.initPegawai();

  $scope.btnAddClick = function()
  {
    $scope.data = {};
    $scope.getListGolongan();
    $("#modal-add").modal('show');
  }

  $scope.getListGolongan = function(){
    pegawairesource.$create({},function(data)
        {
            $scope.golonganlist = data.obj;            
        });
  }

  $scope.AddClick = function()
  {
      $("#modal-add").modal('hide');
    var pegawairesource = new pegawaiResource();
      pegawairesource.NIP = $scope.data.NIP;
      pegawairesource.Nama = $scope.data.Nama;
      pegawairesource.Gelar = $scope.data.Gelar;
      pegawairesource.Jabatan = $scope.data.Jabatan;
      pegawairesource.GolonganID = $scope.data.GolonganID;
      pegawairesource.CreatedBy = "Dwi";
      console.log(pegawairesource);
      pegawairesource.$add({},function(data)
      {
          console.log(data);
          if(data.success)
        {
            $scope.widgetShow  = true;
            $scope.success = true;
            $scope.message = "Data pegaawai berhasil disimpan";
            $scope.init = [];
            $scope.initPegawai();
        }
        else
        {
            $scope.message = "Error";
        }
    })   
   }

    $scope.btnDetailClick = function(id)
    {
        pegawairesource.$get({'id': id}, function(data)
        {
            if(data.success)
            {
                $scope.getListGolongan();
                $scope.pegawai = data.obj;
                var getGolongan = $filter('filter')($scope.golonganlist, function (golongan) { 
                    return golongan.id === $scope.pegawai.GolonganID
                 })[0]
                $scope.pegawai.GolonganName = getGolongan != null ? getGolongan.Golongan +" - "+ getGolongan.Pangkat :"";
                console.log($scope.pegawai);
                $("#modal-detail").modal('show');
                
            }
        });
    }

    $scope.UpdateClick = function()
    {
        pegawairesource.NIP = $scope.pegawai.NIP;
        pegawairesource.Nama = $scope.pegawai.Nama;
        pegawairesource.Gelar = $scope.pegawai.Gelar;
        pegawairesource.Jabatan = $scope.pegawai.Jabatan;
        pegawairesource.GolonganID = $scope.pegawai.GolonganID;
        pegawairesource.$update({'id':$scope.pegawai.id},function(data)
        {
            $("#modal-detail").modal('hide');
            $scope.message = "Data pegaawai berhasil diubah";                        
            $scope.init = [];
            $scope.initPegawai();
        });
    }

    $scope.btnDeleteClick = function(id)
    {
        $("#modal-delete").modal('show');
        $scope.deleteid = id;
    }
    $scope.DeleteClick = function()
    {
        pegawairesource.$delete({'id':  $scope.deleteid },function(data)
        {
        
            $("#modal-delete").modal('hide');
            $scope.message = "Data pegaawai berhasil dihapus";                        
            $scope.init = [];            
            $scope.initPegawai();
        });
    }

    $scope.btnEditClick = function()
    {
        $scope.editmode = true;
    }

    $scope.getSelectedGolongan = function(golonganid, GolonganID){
        return golonganid == GolonganID ? true:false;
    }

});