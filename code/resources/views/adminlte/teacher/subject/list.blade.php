@extends('adminlte.layout.dashboard')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Subjects
        <small>Version 1.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Subjects</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">All Teaching Subjects</h3>
                    <div class="box-tools pull-right">
                    	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-new-subject">
                    		<i class="fa fa-plus"></i> Add New Subject
                    	</button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="min-height: 600px;">
                    <div class="row">
                        <div class="col-sm-12">

							<table id="subject-table-list" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Subject Name</th>
										<th>Code</th>
										<th>Total Students</th>
										<th>Teachers</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($subjects as $subject)
										@include('adminlte.teacher.subject.partials.subject-list-item')
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
<div class="modal modal-default fade" id="modal-new-subject">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">New Teaching Subject</h4>
      </div>
      <div class="modal-body">
        <p>Form for new subject</p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary">Submit</button>
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
@endpush