<script src="privasi/public/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="privasi/javascript/golongan.js"></script>
<script>
  var golongan;
  $(document).ready(function()
  {
    golongan = new sppd_golongan();
  })
 
</script>
@extends('admin_template')
@section('content')


 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">
                  <button onclick="golongan.openmodaladd()" type="button" class="btn btn-flat" data-widget=""><i class="glyphicon glyphicon-plus"></i> Tambah Golongan</button>
              </h3>
            </div>
             <div class="box-body">
              </div>
          </div>
        </div>
    </div>
</section>
<div class="modal modal-message fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="javascript:;" class="close" data-dismiss="modal">x</a>
                    <h4 class="modal-title">Add Subject</h4>
                </div>
                <div class="modal-body">
                       <div class="form-group">
                        <label>Subject Name</label>
                        <input type="text" class="form-control col-md-6" ng-model="subject.SubjectName">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-default btn-width btn-margin" data-dismiss="modal">Cancel</a>
                    <button type="button" class="btn btn-default btn-width" ng-click="AddClik()">
                        <span>Add</span>
                    </button>
                  
                </div>
            </div>
        </div>
    </div>
@endsection
