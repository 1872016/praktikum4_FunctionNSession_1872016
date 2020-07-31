<?php
	$command = filter_input(INPUT_GET, 'cmd');
	if(isset($command) && $command == 'del'){
		$fid = filter_input(INPUT_GET, 'fid');
		if (isset($fid)) {
			deleteFaculty($fid);
			echo '<div class="bg-success">Data successfully deleted</div>';
		} 
	}

	$submitPressed = filter_input(INPUT_POST, "btnSubmit");
	if (isset($submitPressed)) {
		$name = filter_input(INPUT_POST, "txtName");
		$establish = filter_input(INPUT_POST, 'txtEstablish');
		$result = addFaculty($name,$establish);
		if ($result) {
			echo '<div class="bg-success">Data successfully added (Faculty: '. $name .')</div>';
		} else {
			echo '<div class="bg-error">Error add data</div>';
		}
	}
?>

<form action="" method="post">
	<div class="form-group">
		<label for="txtName">Faculty Name</label>
		<input type="text" class="form-control" id="txtName" name="txtName">
		<label for="txtEst">Establish</label>
		<input type="text" class="form-control" id="txtEst" name="txtEst">
	</div>
	<input type="submit" name="btnSubmit" class="btn btn-primary">
</form>
<br>	
<table id="myTable" class="display">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Establish</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$faculties = fetchFacultyData();
			foreach ($faculties as $faculty) {
				echo "<tr>";
				echo "<td>".$faculty['id']."</td>";
				echo "<td>".$faculty['name']."</td>";
				echo "<td>".$faculty['establish']."</td>";
				echo '<td><button class="btn btn-info" onclick="updateFacultyValue(\''.$faculty['id'].'\')">Update</button><button class="btn btn-danger" onclick="deleteFacultyValue(\''.$faculty['id'].'\')">Delete</button></td>';
				echo "</tr>";
			}
			$link = null;
		?>
	</tbody>
</table>