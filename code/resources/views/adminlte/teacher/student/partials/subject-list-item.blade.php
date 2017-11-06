<tr>
  <td>{{ $studentSubject->subject->name }} ({{ $studentSubject->subject->code }})</td>
  <td>{{ \Carbon\Carbon::parse($studentSubject->created_at)->format('d M Y') }}</td>
  <td>
    @if(isset($studentSubject->studentGrade))
      <label class="label label-info">
        {{ $studentSubject->studentGrade->grade->code }}
      </label>
    @else
      <label class="label label-default">
        N/A
      </label>
    @endif
  </td>
  <td>
    <a href="javascript:void(0);" class="btn btn-warning btn-mark-studentSubject" alt="Mark Subject Grade" title="Mark Subject Grade" data-studentsubjectid="{{ $studentSubject->id }}">
      <i class="fa fa-star-o"></i>
    </a>
  </td>
</tr>