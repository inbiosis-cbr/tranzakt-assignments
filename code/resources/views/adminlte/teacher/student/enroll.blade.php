@extends('adminlte.layout.dashboard')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Students
        <small>Version 1.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Students</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $student->name }}'s Subjects</h3>
                    <div class="box-tools pull-right">
                      @if(count($student->subjects) < 2)
                    	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-add-studentSubject">
                    		<i class="fa fa-plus"></i> Assign Subjects
                    	</button>
                      @else
                      <span class="label label-info">Maximum 2 enrolled subjects reached!</span> 
                      @endif
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="min-height: 600px;">
                    <div class="row">
                        <div class="col-sm-12">

							<table id="grade-table-list" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Subject</th>
                    <th>Enrolled Date</th>
										<th>Grade</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($student->subjects as $studentSubject)
										@include('adminlte.teacher.student.partials.subject-list-item', ['studentSubject' => $studentSubject])
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
<div class="modal modal-default fade" id="modal-add-studentSubject">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Assign Subject to {{ $student->name }}</h4>
      </div>
      <div class="modal-body">
      	@include('adminlte.teacher.student.forms.add-subject')
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" onClick="$('#form-teacher-add-studentSubject').submit();">Submit</button>
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