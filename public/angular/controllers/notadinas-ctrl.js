app.controller('notadinascontroller', function ($scope,$state,notadinasResource, pegawaiResource) {
    $('#tangalsurat, #tanggalberangkat,#tanggalkembali ').datepicker({
        todayHighlight: true,
        format: "dd-M-yyyy"
    });
    var pegawairesource = new pegawaiResource();
    var notadinasresource = new notadinasResource();
    $scope.listpegawai = [];
    $scope.SaveObj = {
        instansitujuan:null, 
        instansipengirim:null,
        nomorsurat:null,
        tangalsurat:null,
        sifatsurat:null,
        lampiran:null,
        perihal:null,
        deskripsi:null,
        asalkota:null,
        kotatujuan:null,
        tanggalberangkat:null,
        tanggalkembali:null,
        file:null,
        pegawaiid:[],

    };
    $scope.listnotadinas = [];
    $scope.editmode = false;
    $scope.init = function(){
        notadinasresource.$init(function(data){
            $scope.listnotadinas = data.obj;
        });
    }
    $scope.init();
    $scope.btnAddClick = function()
    {
        $scope.data = {};
        $scope.getListPegawai();
        $("#modal-add").modal('show');
    }

    $scope.btnDetailClick = function(obj){
        $scope.data = obj;
        console.log(obj);
        $("#modal-add").modal('show');
        
    }

    $scope.getListPegawai = function(){
        pegawairesource.$init(function(data){
            $scope.listpegawai = data.obj;
        });
    }

    $scope.AddClick = function(){
        console.log($scope.SaveObj);
        var notadinasresource = new notadinasResource();        
        notadinasresource.SaveObj = $scope.SaveObj;
        notadinasresource.$add(function(data){
            console.log(data);
        });

    }

});