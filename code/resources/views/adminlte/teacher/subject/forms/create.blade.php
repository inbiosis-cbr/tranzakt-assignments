<!-- general form elements -->
<div class="box box-warning">
@php
/*
  <div class="box-header with-border">
    <h3 class="box-title">New Subject Form</h3>
  </div>
  <!-- /.box-header -->
*/
@endphp

  <!-- form start -->
  <form id="form-teacher-subject-create" role="form" method="POST" action="{{ url('/teacher/subject/create') }}">
    {{ csrf_field() }}
    <div class="box-body">
      <div class="form-group">
        <label for="subject_name">Subject Name</label>
        <input type="text" class="form-control" name="subject[name]" id="subject_name" placeholder="Subject Name" value="" />
      </div>

      <div class="form-group">
        <label for="subject_name">Subject Code</label>
        <input type="text" class="form-control" name="subject[code]" id="subject_code" placeholder="Subject Code" value="" />
      </div>

      <div class="form-group">
        <label for="subject_name">Description</label>
        <textarea class="form-control" name="subject[description]" id="subject_description" placeholder="Description" ></textarea>
      </div>
    </div>
    <!-- /.box-body -->

@php
/*
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
*/
@endphp

  </form>
</div>
<!-- /.box -->