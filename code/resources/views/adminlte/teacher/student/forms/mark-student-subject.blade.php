<!-- general form elements -->
<div class="box box-warning">
@php
/*
  <div class="box-header with-border">
    <h3 class="box-title">Mark Grade to Subject</h3>
  </div>
  <!-- /.box-header -->
*/
@endphp

  <!-- form start -->
  <form id="form-teacher-mark-student-subject" role="form" method="POST" action="{{ url('/teacher/student-subject/' . $studentSubject->id . '/mark') }}">
    {{ csrf_field() }}
    <div class="box-body">
      <div class="form-group">
        <label for="studentGrade_grade_id">Grade</label>
        <select class="form-control" name="studentGrade[grade_id]" id="studentGrade_grade_id" placeholder="Grade" value="">
          <option value="">Please select an option</option>
          @foreach($studentSubject->gradeOptions as $grade)
          <option value="{{ $grade->id }}">{{ $grade->name }} ({{ $grade->code }})</option>
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