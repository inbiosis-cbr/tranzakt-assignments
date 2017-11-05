<!-- general form elements -->
<div class="box box-warning">
@php
/*
  <div class="box-header with-border">
    <h3 class="box-title">Edit Grade Form</h3>
  </div>
  <!-- /.box-header -->
*/
@endphp

  <!-- form start -->
  <form id="form-teacher-grade-update" role="form" method="POST" action="{{ url('/teacher/grade/' . $grade->id) }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="box-body">
      <div class="form-group">
        <label for="grade_name">Grade Name</label>
        <input type="text" class="form-control" name="grade[name]" id="grade_name" placeholder="Grade Name" value="{{ $grade->name }}" />
      </div>

      <div class="form-group">
        <label for="grade_code">Grade Code</label>
        <input type="text" class="form-control" name="grade[code]" id="grade_code" placeholder="Grade Code" value="{{ $grade->code }}" />
      </div>

      <div class="form-group" style="display: none;">
        <label for="grade_score">Grade Score</label>
        <input type="text" class="form-control" name="grade[score]" id="grade_score" placeholder="Grade Score" value="0" />
      </div>

      @php
      /*
      <div class="form-group">
        <label for="grade_is_passing">Passing Grade?</label>
        <br />
        <label class="radio-inline">
          <input type="radio" name="grade[is_passing]" id="grade_is_passing_1" checked="checked">Yes
        </label>

        <label class="radio-inline">
          <input type="radio" name="grade[is_passing]" id="grade_is_passing_0">No
        </label>
      </div>
      */
      @endphp
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