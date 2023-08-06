<?php

	$con = mysqli_connect('localhost', 'root');
	mysqli_select_db($con, 'exam');
	$teacher_id = "9569505582ghT67";
	$name = $_POST['tname'];
	$target = $_POST['ttarget'];
	$subject = $_POST['tsubject'];
	$type = $_POST['ttype'];
	$duration = $_POST['tduration'];
	$nsub = $_POST['tnsub'];
	$topic = $_POST['ttopic'];
	$description = $_POST['tdescription'];
	$price = $_POST['tprice'];
	$per_subject_question = "*";
	for($i=0; $i<$nsub; $i++){
		$per_subject_question = $per_subject_question . "0*";
	}
	$sql= "INSERT INTO paper (teacher_id, name_of_test, type, target, number_of_subjects, name_of_subjects, total_question, per_subject_question, question, duration, topics, price,description) VALUES ('$teacher_id', '$name', '$type', '$target', '$nsub', '$subject',0, '$per_subject_question', '@', '$duration', '$topic', '$price', '$description')";
	if(mysqli_query($con,$sql)){
		$last_id = mysqli_insert_id($con);
		echo "1".$last_id;
	}else{
		echo "some error happened";
	}



?>