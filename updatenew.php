<?php
session_start();
include 'configgen.php';

 $username = $_REQUEST["username"];
  $studentname = $_REQUEST["stuname"];
  
 $email = $_REQUEST["email"];
  $gender = $_REQUEST["gender"];
  $religion = $_REQUEST["rele"];
//  $gender = $_REQUEST["gender"];
 $student_id=$_REQUEST['id'];


 $upd_sql="UPDATE `users` SET `username` = '$username',  `stuname` = '$studentname',   `email` = '$email', `gender` = '$gender', `rel_id` = '$religion' WHERE `users`.`id` = ".$student_id;


$resl=mysqli_query($conn,$upd_sql);

$del_qry="delete from facility_user where id=".$student_id;
$res2=mysqli_query($conn,$del_qry);
  
$facility_array= $_REQUEST['facility'];
foreach ($facility_array as $facility_id){
  $facility_sql="INSERT INTO facility_user VALUES('','$facility_id','$student_id')";
  mysqli_query($conn,$facility_sql);
}



//$fac_sql = "INSERT INTO `facility_user` (`linkid`, `fid`, `stu_id`) VALUES (NULL, '', '$student_id')";

//$resq= mysqli_query($conn,$fac_sql);

header("location:welcome.php");

?>
