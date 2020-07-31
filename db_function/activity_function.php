<?php

function fetchActivityData(){
	$link = createConnection();
	$query = "SELECT * FROM activity";
	$result = $link->query($query);
	closeConnection($link);
	return $result;
}

function fetchActivity($id){
	$link = createConnection();
	$query = "SELECT * FROM activity WHERE id = ?";
	$stmt = $link->prepare($query);
	$stmt->bindParam(1, $id);
	$stmt->execute();
	$result = $stmt->fetch();
	closeConnection($link);
	return $result;
}

function addActivity($title,$description,$place,$start_date,$end_date,$doc_photo,$faculty_id){
	$link = createConnection();
	$query = "INSERT INTO activity(title,description,place,start_date,end_date,doc_photo,faculty_id) VALUES(?,?,?,?,?,?,?)";
	$stmt = $link->prepare($query);
	$stmt->bindParam(1, $title);
	$stmt->bindParam(2, $description);
	$stmt->bindParam(3, $place);
	$stmt->bindParam(4, $start_date);
	$stmt->bindParam(5, $end_date);
	$stmt->bindParam(6, $doc_photo);
	$stmt->bindParam(7, $faculty_id);
	$link->beginTransaction();
	if ($stmt->execute()) {
		$link->commit();
		$result = 1;
	} else {
		$link->rollBack();
	}
	closeConnection($link);
	return $result;
}

function deleteActivity($id){
	$link = createConnection();
	$query = "DELETE FROM activity WHERE id = ?";
	$stmt = $link->prepare($query);
	$stmt->bindParam(1, $id);
	$link->beginTransaction();
	if ($stmt->execute()) {
		$link->commit();
	} else {
		$link->rollBack();
	}
	closeConnection($link);
}

function updateActivity($id,$title,$description,$place,$start_date,$end_date,$doc_photo,$faculty_id){
	$link = createConnection();
	$query = "UPDATE activity SET title=?,description=?,place=?,start_date=?,end_date=?,doc_photo=?,faculty_id=? WHERE id = ?";
	$stmt = $link->prepare($query);
	$stmt->bindParam(1, $title);
	$stmt->bindParam(2, $description);
	$stmt->bindParam(3, $place);
	$stmt->bindParam(4, $start_date);
	$stmt->bindParam(5, $end_date);
	$stmt->bindParam(6, $doc_photo);
	$stmt->bindParam(7, $faculty_id);
	$stmt->bindParam(8, $id);
	$link->beginTransaction();
	if ($stmt->execute()) {
		$link->commit();
	} else {
		$link->rollBack();
	}
	closeConnection($link);
}