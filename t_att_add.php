<?php
session_start();
if(isset($_SESSION['t_name']))
{
$flag=0;
$load=false;
  if(isset($_GET['day'])&&(isset($_GET['month']))&&(isset($_GET['year']))&&(isset($_GET['std'])))
 {
 $load=true;
 $date=$_GET['year']."-".$_GET['month']."-".$_GET['day'];
 $std=$_GET['std'];
 }
   if(isset($_POST['submit']))
   {
     $std=$_POST['std1'];
     $q1="SELECT * FROM student WHERE std='$std'";
	  $date=$_POST['year1']."-".$_POST['month1']."-".$_POST['day1'];
    require_once("db.php");
	$result=mysqli_query($stat,$q1);
	while($row=mysqli_fetch_array($result))
	{
	if(isset($_POST['morn_'.$row['regno']]))
	  $t1=$_POST['morn_'.$row['regno']];
	else  
	  $t1="notset";
	if(isset($_POST['aftn_'.$row['regno']]))
	  $t2=$_POST['aftn_'.$row['regno']];
	else
	  $t2="notset";
	if(!strcmp($t1,"Morning")==1&&(!strcmp($t2,"Afternoon")==1))
	  $type=2;
	else if(!strcmp($t1,"Morning")==1)
	  $type=0;
	else if(!strcmp($t2,"Afternoon")==1)
	  $type=1;
	else
	  $type=-1;
	$regno=$row['regno'];
	$q2="DELETE FROM attendance WHERE regno='$regno' && date='$date'";
	mysqli_query($stat,$q2);

	if($type!=-1)
	{
    $query="INSERT INTO attendance(regno,type,date)VALUES('$regno','$type','$date')";
	mysqli_query($stat,$query);
	}
   }
	$flag=1;
  }
require_once("db.php");
$username=$_SESSION['t_name'];
$query="SELECT * FROM teacher WHERE username='$username'";
$result=mysqli_query($stat,$query);
$rows=mysqli_fetch_array($result);

$name=$rows['name'];
$address=$rows['address'];
$designation=$rows['designation'];
$qualification=$rows['qualification'];
$subject1=$rows['subject1'];
$subject2=$rows['subject2'];
$subject3=$rows['subject3'];
$subject4=$rows['subject4'];
$subject5=$rows['subject5'];
$photo=$rows['photo'];
$query="SELECT * FROM class WHERE classteacher='$username' ORDER BY std";
$result=mysqli_query($stat,$query);
$std_arr=[];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacher Interface</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="t_index.php">Teacher's web Interface </a>
            </div>
            <!-- Top Menu Items -->
			<?php
            require_once("navbar.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
				<li>
                        <a href="t_index.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="t_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="t_timetable.php"><i class="fa fa-fw fa-calendar"></i> View timetable</a>
                    </li>
                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-bar-chart-o"></i> Marks <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
						     <li>
                                <a href="t_marks_view.php"><i class="fa fa-fw fa-table fa-fw"></i> View marks</a>
                            </li>
                            <li>
                                <a href="t_marks_add.php"><i class="fa fa-fw fa-plus fa-fw"></i> Update marks</a>
                            </li>
                            <li>
                                <a href="t_marks_edit.php"><i class="fa fa-fw fa-edit fa-fw"></i> Edit marks</a>
                            </li>
							<li>
                                <a href="t_marks_delete.php"><i class="fa fa-fw fa-minus fa-fw"></i> Delete marks</a>
                            </li>
                        </ul>
                    </li>
										<li class="active">
                        <a href="t_att_add.php"><i class="fa fa-fw fa-edit"></i> Attendance</a>
                    </li>
				   <li>
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-envelope"></i> Feedback <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="teacher_feedback_add.php"><i class="fa fa-fw fa-plus"></i> Add feedback</a>
                            </li>
                            <li>
                                <a href="teacher_feedback_view.php"><i class="fa fa-fw fa-desktop"></i> View feedback</a>
                            </li>
                            <li>
                                <a href="teacher_feedback_edit.php"><i class="fa fa-fw fa-edit"></i> Edit feedback</a>
                            </li>
                            <li>
                                <a href="teacher_feedback_del.php"><i class="fa fa-fw fa-minus"></i> Delete feedback</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                       <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-file"></i> Activities <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="teacher_activity_add.php"><i class="fa fa-fw fa-plus"></i> Add activity</a>
                            </li>
                            <li>
                                <a href="teacher_activity_view.php"><i class="fa fa-fw fa-desktop"></i> View activities</a>
                            </li>
                            <li>
                                <a href="teacher_activity_edit.php"><i class="fa fa-fw fa-edit"></i> Edit activities</a>
                            </li>
                            <li>
                                <a href="teacher_activity_del.php"><i class="fa fa-fw fa-minus"></i> Delete activities</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Update attendance
                            <small></small>
                        </h1>
                        
                    </div>
                </div>
				<?php
				 
				 if($flag==1)
				 {?>
				 <div class="alert alert-success">
				  <strong>Attendance has been updated for the class <?php echo $std;?> for the date <?php echo $date;?></strong>
				 </div>
				 <?php
				 }?>
				<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
				<?php
				if(!$load)
				{
				?>
				<div class="alert alert-info">
				  <strong>Select the date and class and click "Go" to load the attendance for the students on the date provided.</strong>
				 </div>
				 <label>Enter date</label><br/>
		 <select name="day" id="day" class="form-control" style="width:80px;display:inline;">
		    <?php
			$int=0;
			  for($i=1;$i<=31;$i++)
			  {
			  ?>
			   <option><?php printf("%02d",$i); ?>
			  <?php
		       }
			   ?>
		 </select>
		<select name="month" id="month" class="form-control" style="width:100px;display:inline;">
		  <option>January</option>
		  <option>February</option>
		  <option>March</option>
		  <option>April</option>
		  <option>May</option>
		  <option>June</option>
		  <option>July</option>
		  <option>August</option>
		  <option>September</option>
		  <option>October</option>
		  <option>November</option>
		  <option>December</option>
		</select>
		<select name="year" id="year" class="form-control" style="width:120px;display:inline;">
		<?php $y=date("Y");
		?>
		   <option><?php echo $y-1;?></option>
		   <option><?php echo $y;?></option>
		   <option><?php echo $y+1;?></option>
		   </select>
		   <br/><br/>
                 <label>Select class</label>
								<br/>
				<select name="std" id="std" class="form-control" style="width:100px">			
                 <?php
                  while($row=mysqli_fetch_array($result))
                  {
                   ?>				  
				 <option><?php echo $row['std']; ?>
				 <?php
				 }?>
				 </select>
				 <br/>
				 <button id="submit1" class="btn btn-lg btn-info" onclick="doThis();return false;">Go</button>
				 <br/>
				 <hr/>
				  <?php
				 }
				 ?>
			<?php	
			if($load)
			{?>
			<div class="alert alert-info">
				  <strong>Leave the checkboxes unticked to denote a student who was not absent.</strong>
				 </div>
			<input type="hidden" name="month1" value="<?php echo $_GET['month'];?>">
			<input type="hidden" name="day1" value="<?php echo $_GET['day'];?>">
			<input type="hidden" name="year1" value="<?php echo $_GET['year'];?>">
			<input type="hidden" name="std1" value="<?php echo $_GET['std'];?>">
			<div class="table-responsive" id="<?php echo $std;?>">
            <table class="table table-bordered table-hover table-striped">	 
				 <thead>
                         <tr>
       <th  colspan="3"><h4><b><?php echo $std." - ".$_GET['day']."/".$_GET['month']."/".$_GET['year'];?></b></h4></th>
                         </tr>
                 </thead>
				 <tbody>
				 <tr>
				 <td>Name</td>
				 <td>Register number</td>
				 <td>Select absent interval</td>
				 </tr>
				 <?php
				 $query="SELECT * FROM student WHERE std='$std'";
			     $result=mysqli_query($stat,$query);
				 while($row=mysqli_fetch_array($result))
                {
				 $query1="SELECT * FROM attendance WHERE regno='".$row['regno']."' && date='$date'";
				 $result1=mysqli_query($stat,$query1);
				 if(mysqli_num_rows($result1)!=0)
				 {
				   $row1=mysqli_fetch_array($result1);
				   $type=$row1['type'];
				 }
				 else
				   $type=-1;
				 ?>
				 <tr>
				 <td><?php echo $row['name'];?></td>
				 <td><?php echo $row['regno'];?></td>
				 <td>
		   <label class="checkbox-inline">
		<input type="checkbox" name="<?php echo "morn_".$row['regno'];?>" value="Morning" <?php if($type==0||$type==2)
		                 echo "checked=\"checked\"";  
		           ?>
		>Morning
		</label>
		<label class="checkbox-inline">
		<input type="checkbox" name="<?php echo "aftn_".$row['regno'];?>" value="Afternoon" <?php if($type==1||$type==2)
		                 echo "checked=\"checked\"";  
		  ?>>Afternoon
		</label>
		</td>
				 </tr>
                <?php }?>
								 </tbody>
				 </table>
				 </div>
				<!-- /.row -->
				<button name="submit" id="submit" type="submit" class="btn btn-lg btn-success">Update attendance</button>
				</form>
				<br/>
				<button onclick="location.href='t_att_add.php'" class="btn btn-lg btn-default">Cancel</button>
		   <br/>
		<?php }
				?>
				  <script>
	      day.addEventListener('change', onSelectChanged, false);
		  month.addEventListener('change', onSelectChanged, false);
		  year.addEventListener('change', onSelectChanged, false);
		  std.addEventListener('change', onSelectChanged, false);
		   var day11,month1,year1,std1,mont;
		   function onSelectChanged()
		  {
		    day1=day.options[day.selectedIndex].text;
			month1=month.options[month.selectedIndex].text;
			year1=year.options[year.selectedIndex].text;
			std1=std.options[std.selectedIndex].text;
			
			switch(month1)
			 {
			    case "January":
				  mont="01";
			      break;
				case "Februaryy":
				  mont="02";
			      break;
				case "March":
				  mont="03";
			      break;
				case "April":
				  mont="04";
			      break;
				case "May":
				  mont="05";
			      break;
				case "June":
				  mont="06";
			      break;
				case "July":
				  mont="07";
			      break;
				case "August":
				  mont="08";
			      break;
				case "September":
				  mont="09";
			      break;
				case "October":
				  mont="10";
			      break;
				case "November":
				  mont="11";
			      break;
				case "December":
				  mont="12";
			      break;
			 }
		  }
		   onSelectChanged();
		  function doThis()
		  {
		    window.location="?day="+day1+"&month="+mont+"&year="+year1+"&std="+std1;
		  }
	  </script>
		
            <!-- /.container-fluid -->
         
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



</body>

</html>
<?php
}
else
{
     header("refresh:0,url=teacherlogin.php");

}
?>