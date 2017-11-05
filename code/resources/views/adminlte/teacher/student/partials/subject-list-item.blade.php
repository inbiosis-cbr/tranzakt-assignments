<tr>
  <td>{{ $studentSubject->subject->name }} ({{ $studentSubject->subject->code }})</td>
  <td>{{ \Carbon\Carbon::parse($studentSubject->created_at)->format('d M Y') }}</td>
  <td>
  	-
  </td>
  <td>
    <a href="{{ url('teacher/student-enroll') . '?id=' . $student->id }}" class="btn btn-warning" alt="Enroll Subject" title="Enroll Subject" data-studentid="{{ $student->id }}">
      <i class="fa fa-magic"></i>
    </a>
  </td>
</tr>