<?php
	$fid = filter_input(INPUT_GET, 'fid');
	if (isset($fid)) {
		$result = fetchFaculty($fid);
	}

	$submitPressed = filter_input(INPUT_POST, "btnSubmit");
	if (isset($submitPressed)) {
		$id = $result['id'];
		$name = filter_input(INPUT_POST, 'txtName');
		$establish = filter_input(INPUT_POST, 'txtEstablish');
		updateFaculty($id, $name, $establish);
		header("location:index.php?menu=fac");
	}
?>

<form action="" method="post">
	<div class="form-group">
		<label for="txtId">Id</label>
		<input type="text" class="form-control" name="txtId" value="<?php echo $result['id']; ?>" readonly>
		<label for="txtName">Name</label>
		<input type="text" class="form-control" name="txtName" value="<?php echo $result['name']; ?>">
		<label for="txtEstablish">Establish</label>
		<input type="text" class="form-control" name="txtEstablish" value="<?php echo $result['establish']; ?>">
	</div>
	<input type="submit" name="btnSubmit" class="btn btn-default">
</form>