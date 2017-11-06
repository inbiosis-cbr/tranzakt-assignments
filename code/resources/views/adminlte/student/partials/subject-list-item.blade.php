<tr>
  <td>{{ $studentSubject->subject->name }} ({{ $studentSubject->subject->code }})</td>
  <td>{{ \Carbon\Carbon::parse($studentSubject->created_at)->format('d M Y') }}</td>
  <td>
    @if(isset($studentSubject->studentGrade))
      <label class="label label-info">
        {{ $studentSubject->studentGrade->grade->code }}
      </label>
      &nbsp;&nbsp;/&nbsp;&nbsp;
      @if($studentSubject->getSubjectGrade($studentSubject->subject->id, $studentSubject->studentGrade->grade->id)->is_passing == 1)
        <label class="label label-success">
          Passed
        </label>
      @else
        <label class="label label-danger">
          Failed
        </label>
      @endif
       &nbsp;&nbsp;<label class="label label-default">
        {{ \Carbon\Carbon::parse($studentSubject->studentGrade->updated_at)->format('d M Y') }}
       </label>

    @else
      <label class="label label-default">
        N/A
      </label>
    @endif
  </td>
  <td>
    @if(isset($studentSubject->studentGrade))
      {{ $studentSubject->studentGrade->teacher->name }}
    @endif
  </td>
  <td>
    @php
    /*
    <a href="javascript:void(0);" class="btn btn-warning btn-mark-studentSubject" alt="Mark Subject Grade" title="Mark Subject Grade" data-studentsubjectid="{{ $studentSubject->id }}">
      <i class="fa fa-star-o"></i>
    </a>
    */
    @endphp
  </td>
</tr>