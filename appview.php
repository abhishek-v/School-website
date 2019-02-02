<?php
if($_GET['logout']=="1")
{
setcookie("student_name", "", time() - 3600);
}
else
{
require_once("db.php");
if(!isset($_COOKIE['student_name']))
{
if(isset($_POST['regno'])&&isset($_POST['pass']))
{
   $regno=$_POST['regno'];
   $pass=$_POST['pass'];
   $query="SELECT * FROM student WHERE regno='$regno'";
   $result=mysqli_query($stat,$query);
   if(mysqli_num_rows($result)<1)
   {
	  $response["success"]=0;
	  echo json_encode($response);
   }
   else
   {
        $row=mysqli_fetch_array($result);
		$regno_c=$row['regno'];
		$day=$row['date'];
		$pass_c=sprintf("%02d",$day).sprintf("%02d",$row['month']).$row['year'];
		if(!strcmp($regno_c,$regno)==1)
		{
		   if(!strcmp($pass,$pass_c)==1)
		   {
		     $cookiename="student_name";
			 $cookievalue=$regno;
		    setcookie($cookiename,$cookievalue,time() + (10 * 365 * 24 * 60 * 60));
		$response["success"]=1;
	  echo json_encode($response);
          
		   }
		   else
		   {
		   $response["success"]=0;
	       echo json_encode($response);
		   }
        }
		else
		{
		   $response["success"]=0;
	  echo json_encode($response);
		}
   }
}
}

if(isset($_COOKIE['student_name']))
{
if(isset($_GET['profile'])&&isset($_GET['subjects'])&&isset($_GET['timetable'])&&isset($_GET['exams'])&&isset($_GET['feedback'])&&isset($_GET['activities'])&&isset($_GET['marks'])&&isset($_GET['attendance'])&&isset($_GET['fees']))
{
     
      $regno=$_COOKIE['student_name'];
     // require_once("db.php");
	 if(isset($_GET['profile'])==1)
       $query="SELECT * FROM student WHERE regno='$regno'";
       $result=mysqli_query($stat,$query);
	   $row=mysqli_fetch_array($result);
	   $profile=array();
	   $profile["name"]=$row["name"];
	   $profile["std"]=$row["std"];
	   $profile["address"]=$row["address"];
	   $profile["gender"]=$row["gender"];
	   $profile["regno"]=$row["regno"];
	   $dob=$row['date'].$row['month'].$row['year'];
	   $profile["dob"]=$dob;
	   $profile["medrec"]=$row['medrec'];
	   $profile["height"]=$row["std"];
	   $profile["weight"]=$row["std"];
	   $profile["bloodgrp"]=$row["bloodgrp"];
	   $profile["phno"]=$row["phno"];
	   $response["success"]=1;
	   $response["info"] = array();
	   array_push($response["info"],$profile);
	  echo json_encode($response);
}
}
}
?>