<!-- general form elements -->
<div class="box box-warning">
@php
/*
  <div class="box-header with-border">
    <h3 class="box-title">Assign Grade to Subject</h3>
  </div>
  <!-- /.box-header -->
*/
@endphp

  <!-- form start -->
  <form id="form-teacher-subject-grade-create" role="form" method="POST" action="{{ url('/teacher/subject-grades/add') }}">
    {{ csrf_field() }}
    <input type="hidden" name="grade[subject_id]" id="grade_subject_id" value="{{ $subject->id }}" />
    <div class="box-body">
      <div class="form-group">
        <label for="grade_id">Grade</label>
        <select class="form-control" name="grade[grade_id]" id="grade_grade_id" placeholder="Grade" value="">
          <option value="">Please select an option</option>
          @foreach($grades as $grade)
          <option value="{{ $grade->id }}">{{ $grade->name }} ({{ $grade->code }})</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="grade_is_passing">Passing Grade?</label>
        <br />
        <label class="radio-inline">
          <input type="radio" name="grade[is_passing]" id="grade_is_passing_1" checked="checked" value="1">Yes
        </label>

        <label class="radio-inline">
          <input type="radio" name="grade[is_passing]" id="grade_is_passing_0" value="0">No
        </label>
      </div>

      <div class="form-group">
        <label for="grade_ordering">Ordering</label>
        <input type="text" class="form-control" name="grade[ordering]" id="grade_ordering" placeholder="Ordering" value="999" />
        <br />
        <p class="small">
          NOTE: Should order grades based on ranking (Best to Fail)
        </p>
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