app.controller('pegawaicontroller', function ($scope,$state,$filter,pegawaiResource) {
  $scope.widgetShow = false;
  $scope.success = "false";
  $scope.init = [];
  $scope.data = {};
  $scope.listgolongan = [];
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
            $scope.listgolongan = data.obj;            
        });
  }

  $scope.AddClick = function()
  {
        $("#modal-add").modal('hide');
	  var pegawairesource = new pegawaiResource();
      pegawairesource.nip = $scope.data.nip;
      pegawairesource.nama = $scope.data.nama;
      pegawairesource.gelar = $scope.data.gelar;
      pegawairesource.jabatan = $scope.data.jabatan;
      pegawairesource.golonganid = $scope.data.golonganid;
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
              
                $("#modal-detail").modal('show');
                
            }
        });
  }

  $scope.UpdateClick = function()
  {
      pegawairesource.nip = $scope.pegawai.nip;
        pegawairesource.nama = $scope.pegawai.nama;
        pegawairesource.gelar = $scope.pegawai.gelar;
        pegawairesource.jabatan = $scope.pegawai.jabatan;
        pegawairesource.golonganid = $scope.pegawai.golonganid;
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