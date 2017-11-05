@extends('adminlte.layout.dashboard')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Grades
        <small>Version 1.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Grades</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">All Grades</h3>
                    <div class="box-tools pull-right">
                    	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-new-grade">
                    		<i class="fa fa-plus"></i> Add New Grade
                    	</button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="min-height: 600px;">
                    <div class="row">
                        <div class="col-sm-12">

							<table id="grade-table-list" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Grade Name</th>
										<th>Code</th>
                    <th>Applied Subjects</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($grades as $grade)
										@include('adminlte.teacher.grade.partials.grade-list-item')
									@endforeach
								</tbody>
							</table>

                        </div>
                    </div>
                </div>

                <div class="box-footer">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('app-modals')
<div class="modal modal-default fade" id="modal-new-grade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">New Subject Grade</h4>
      </div>
      <div class="modal-body">
      	@include('adminlte.teacher.grade.forms.create')
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" onClick="$('#form-teacher-grade-create').submit();">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal modal-default fade" id="modal-update-grade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Update Subject Grade</h4>
      </div>
      <div class="modal-body" id="modal-body-update-grade">

      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" onClick="$('#form-teacher-grade-update').submit();">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endpush

@push('scripts-last')
<!-- DataTables -->
<script src="../themes/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../themes/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
	$(function(){
		$(".btn-edit-grade").each(function(){
			if($(this).data('gradeid') != undefined){
				$(this).on('click', function(){
					$.ajax({
						method: "GET",
						url: "{{ url('teacher/grade') }}" + '/' + $(this).data('gradeid') + '/edit',
						data: ''
					})
					.done(function(response) {
						if(response.html != undefined){
							$("#modal-body-update-grade").html(response.html);
							$("#modal-update-grade").modal('show');
						}
					});
				});
			}
		});
	});
</script>

@endpush