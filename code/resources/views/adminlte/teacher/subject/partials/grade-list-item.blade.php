<tr>
  <td>{{ $grade->code }} ({{ $grade->name }})</td>
  @if($grade->is_passing)
  	<td>
  		<span class="label label-success">Yes</span>
  	</td>
  @else
  	<td>
  		<span class="label label-danger">No</span>
  	</td>
  @endif
  <td>{{ $grade->ordering }}</td>
  <td>0</td>
  <td>
    <a href="javascript:void(0)" class="btn btn-danger btn-remove-grade" alt="Remove Grade" title="Remove Grade" data-gradeid="{{ $grade->id }}">
      <i class="fa fa-trash-o"></i>
    </a>
  </td>
</tr>