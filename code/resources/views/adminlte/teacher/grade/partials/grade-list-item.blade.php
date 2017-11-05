<tr>
  <td>{{ $grade->name }}</td>
  <td>{{ $grade->code }}</td>
  <td>0</td>
  <td>
    <a href="javascript:void(0)" class="btn btn-warning btn-edit-grade" alt="Edit Grade" title="Edit Grade" data-gradeid="{{ $grade->id }}">
      <i class="fa fa-edit"></i>
    </a>
  </td>
</tr>