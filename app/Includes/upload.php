<?php
$target_path  = "../uploads/";
$uniq_name = $_POST['uniqName'];
$target_path = $target_path . $uniq_name;

if(move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path)) {
    echo "The file ".  basename($_FILES['avatar']['name']). " has been uploaded";
} else {
    echo "There was an error uploading the file, please try again!";
}
