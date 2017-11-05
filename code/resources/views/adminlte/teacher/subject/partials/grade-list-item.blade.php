<tr>
  <td>{{ $subjectGrade->grade->code }} ({{ $subjectGrade->grade->name }})</td>
  @if($subjectGrade->is_passing == 1)
  	<td>
  		<span class="label label-success">Yes</span>
  	</td>
  @else
  	<td>
  		<span class="label label-danger">No</span>
  	</td>
  @endif
  <td>{{ $subjectGrade->ordering }}</td>
  <td>0</td>
  <td>
    <a href="javascript:void(0)" class="btn btn-danger btn-remove-grade" alt="Remove Grade" title="Remove Grade" data-subjectgradeid="{{ $subjectGrade->id }}">
      <i class="fa fa-trash-o"></i>
    </a>
  </td>
</tr>