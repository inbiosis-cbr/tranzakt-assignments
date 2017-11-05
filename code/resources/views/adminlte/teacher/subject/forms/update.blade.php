<!-- general form elements -->
<div class="box box-warning">
@php
/*
  <div class="box-header with-border">
    <h3 class="box-title">Edit {{ $subject->name }}</h3>
  </div>
  <!-- /.box-header -->
*/
@endphp

  <!-- form start -->
  <form id="form-teacher-subject-update" role="form" method="POST" action="{{ url('/teacher/subject/' . $subject->id) }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input type="hidden" name="id" id="subject_id" value="{{ $subject->id }}" />
    <div class="box-body">
      <div class="form-group">
        <label for="subject_name">Subject Name</label>
        <input type="text" class="form-control" name="subject[name]" id="subject_name" placeholder="Subject Name" value="{{ $subject->name }}" />
      </div>

      <div class="form-group">
        <label for="subject_name">Subject Code</label>
        <input type="text" class="form-control" name="subject[code]" id="subject_code" placeholder="Subject Code" value="{{ $subject->code }}" />
      </div>

      <div class="form-group">
        <label for="subject_name">Description</label>
        <textarea class="form-control" name="subject[description]" id="subject_description" placeholder="Description" >{{ $subject->description }}</textarea>
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