<tr>
  <td>{{ $student->name }}</td>
  <td>{{ $student->email }}</td>
  <td>
  	-
  </td>
  <td>
    <a href="{{ url('teacher/student-enroll') . '?id=' . $student->id }}" class="btn btn-warning" alt="Enroll Subject" title="Enroll Subject" data-studentid="{{ $student->id }}">
      <i class="fa fa-magic"></i>
    </a>
  </td>
</tr>