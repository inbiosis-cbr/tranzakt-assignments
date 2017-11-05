<!-- general form elements -->
<div class="box box-warning">
@php
/*
  <div class="box-header with-border">
    <h3 class="box-title">Add Subject to Student</h3>
  </div>
  <!-- /.box-header -->
*/
@endphp

  <!-- form start -->
  <form id="form-teacher-add-studentSubject" role="form" method="POST" action="{{ url('/teacher/student-subject/create') }}">
    {{ csrf_field() }}
    <input type="hidden" name="studentSubject[student_id]" id="studentSubject_student_id" value="{{ $student->id }}" />
    <div class="box-body">
      <div class="form-group">
        <label for="studentSubject_subject_id">Subject</label>
        <select class="form-control" name="studentSubject[subject_id]" id="studentSubject_subject_id" placeholder="Subject" value="">
          <option value="">Please select an option</option>
          @foreach($subjects as $subject)
          <option value="{{ $subject->id }}">{{ $subject->name }} ({{ $subject->code }})</option>
          @endforeach
        </select>
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