
<?php

$num = $_POST['num'];
$imgs = $_POST['name'];
$img = array();
$string = " ";
    for ($i = 1; $i < strlen($imgs); $i++) {
        if ($imgs[$i] != "*" ) {
            $string = $string . $imgs[$i];
        } else {
          $string = trim($string);
          array_push($img, $string);
            $string = " ";
        }
    }


echo $num;
echo $img[0];
for($i=0; $i<number_format($num); $i++){
$name = $img[$i];
$uploadOk = 1;
$file = "img".$i;
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["$file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["$file"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["$file"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["$file"]["tmp_name"],"../../image/questions image/". $name.".".$imageFileType)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["$file"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}
?>