<?php
	$command = filter_input(INPUT_GET, 'cmd');
	if(isset($command) && $command == 'del'){
		$aid = filter_input(INPUT_GET, 'aid');
		if (isset($aid)) {
			deleteActivity($aid);
			echo '<div class="bg-success">Data successfully deleted</div>';
		} 
	}

	$submitPressed = filter_input(INPUT_POST, "btnSubmit");
	if (isset($submitPressed)) {
		$title = filter_input(INPUT_POST, 'txtTitle');
		$description = filter_input(INPUT_POST, 'txtDescription');
		$place = filter_input(INPUT_POST, 'txtPlace');
		$start_date = filter_input(INPUT_POST, 'txtStartDate');
		$end_date = filter_input(INPUT_POST, 'txtEndDate');
		$doc_photo = filter_input(INPUT_POST, 'txtDocPhoto');
		$faculty_id = filter_input(INPUT_POST, 'txtFacultyId');
		$result = addActivity($title, $description, $place, $start_date, $end_date, $doc_photo, $faculty_id);
		if ($result) {
			echo '<div class="bg-success">Data successfully added (Activity: '. $title .')</div>';
		} else {
			echo '<div class="bg-error">Error add data</div>';
		}
	}
?>

<form action="" method="post">
	<div class="form-group">
		<label for="txtTitle">Title</label>
		<input type="text" class="form-control" name="txtTitle">
		<label for="txtDescription">Description</label>
		<input type="text" class="form-control" name="txtDescription">
		<label for="txtPlace">Place</label>
		<input type="text" class="form-control" name="txtPlace">
		<label for="txtStartDate">Start Date</label>
		<input type="text" class="form-control" name="txtStartDate">
		<label for="txtEndDate">End Date</label>
		<input type="text" class="form-control" name="txtEndDate">
		<label for="txtDocPhoto">Doc Photo</label>
		<input type="text" class="form-control" name="txtDocPhoto">
		<label for="txtFacultyId">Faculty Id</label>
		<input type="text" class="form-control" name="txtFacultyId">
	</div>
	<input type="submit" name="btnSubmit" class="btn btn-primary">
</form>
<br>	
<table id="myTable" class="display">
	<thead>
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Description</th>
			<th>Place</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Doc Photo</th>
			<th>Faculty Id</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$activities = fetchActivityData();
			foreach ($activities as $activity) {
				echo "<tr>";
				echo "<td>".$activity['id']."</td>";
				echo "<td>".$activity['title']."</td>";
				echo "<td>".$activity['description']."</td>";
				echo "<td>".$activity['place']."</td>";
				echo "<td>".$activity['start_date']."</td>";
				echo "<td>".$activity['end_date']."</td>";
				echo "<td>".$activity['doc_photo']."</td>";
				echo "<td>".$activity['faculty_id']."</td>";
				echo '<td><button class="btn btn-info" onclick="updateActivityValue(\''.$activity['id'].'\')">Update</button><button class="btn btn-danger" onclick="deleteActivityValue(\''.$activity['id'].'\')">Delete</button></td>';
				echo "</tr>";
			}
			$link = null;
		?>
	</tbody>
</table>