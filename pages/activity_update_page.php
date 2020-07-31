<?php
	$aid = filter_input(INPUT_GET, 'aid');
	if (isset($aid)) {
		$result = fetchActivity($aid);
	}

	$submitPressed = filter_input(INPUT_POST, "btnSubmit");
	if (isset($submitPressed)) {
		$id = $result['id'];
		$title = filter_input(INPUT_POST, 'txtTitle');
		$description = filter_input(INPUT_POST, 'txtDescription');
		$place = filter_input(INPUT_POST, 'txtPlace');
		$start_date = filter_input(INPUT_POST, 'txtStartDate');
		$end_date = filter_input(INPUT_POST, 'txtEndDate');
		$doc_photo = filter_input(INPUT_POST, 'txtDocPhoto');
		$faculty_id = filter_input(INPUT_POST, 'txtFacultyId');
		updateActivity($id, $title, $description, $place, $start_date, $end_date, $doc_photo, $faculty_id);
		header("location:index.php?menu=act");
	}
?>

<form action="" method="post">
	<div class="form-group">
		<label for="txtId">Id</label>
		<input type="text" class="form-control" name="txtId" value=<?php echo '"'.$result['id'].'"'; ?> readonly>
		<label for="txtTitle">Title</label>
		<input type="text" class="form-control" name="txtTitle" value=<?php echo '"'.$result['title'].'"'; ?>>
		<label for="txtDescription">Description</label>
		<input type="text" class="form-control" name="txtDescription" value=<?php echo '"'.$result['description'].'"'; ?>>
		<label for="txtPlace">Place</label>
		<input type="text" class="form-control" name="txtPlace" value=<?php echo '"'.$result['place'].'"'; ?>>
		<label for="txtStartDate">Start Date</label>
		<input type="text" class="form-control" name="txtStartDate" value=<?php echo '"'.$result['start_date'].'"'; ?>>
		<label for="txtEndDate">End Date</label>
		<input type="text" class="form-control" name="txtEndDate" value=<?php echo '"'.$result['end_date'].'"'; ?>>
		<label for="txtDocPhoto">Doc Photo</label>
		<input type="text" class="form-control" name="txtDocPhoto" value=<?php echo '"'.$result['doc_photo'].'"'; ?>>
		<label for="txtFacultyId">Faculty Id</label>
		<input type="text" class="form-control" name="txtFacultyId" value=<?php echo '"'.$result['faculty_id'].'"'; ?>>
	</div>
	<input type="submit" name="btnSubmit" class="btn btn-primary">
</form>