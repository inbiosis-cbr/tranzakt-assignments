<tr>
	<td>{{ $subject->name }}</td>
	<td>{{ $subject->code }}</td>
	<td>0</td>
	<td>0</td>
	<td>
		<a href="javascript:void(0)" class="btn btn-warning btn-edit-subject" alt="Edit Subject" title="Edit Subject" data-subjectid="{{ $subject->id }}">
			<i class="fa fa-edit"></i>
		</a>

		<a href="{{ url('teacher/subject-grades?id=' . $subject->id) }}" class="btn btn-warning" alt="Subject Grades" title="Subject Grades">
			<i class="fa fa-trophy"></i>
		</a>

	</td>
</tr>