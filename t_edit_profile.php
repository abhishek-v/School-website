<?php
session_start();
	function succ()
    {
        echo"
         <script type='text/javascript'>
            alert('Profile Changed Succesfully!!');
            </script>"
            ;
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=t_edit_profile.php\">";
    }

if(isset($_SESSION['t_name']))
{
$flag=0;
$qualification_flag=0;
$name_flag=0;
$email_flag=0;
$address_flag=0;
$contactno_flag=0;
$format_flag=0;
 if(isset($_POST['submit']))
 {
    define('GW_UPLOADPATH','image/');
	require_once("db.php");
        $email=mysqli_real_escape_string($stat,trim($_POST['email']));
	$p=$_POST['image'];
	$name=$_FILES['img']['name'];
	$name_t=trim($_POST['name_t']);
    $username=$_SESSION['t_name'];
	$file=substr($name,strrpos($name, '.')+1);
	$target=GW_UPLOADPATH.time().'.'.$file;
	$name=time().'.'.$file;
    $address=mysqli_real_escape_string($stat,trim($_POST['address']));
	$qualification=mysqli_real_escape_string($stat,trim($_POST['qual']));
	$contactno=mysqli_real_escape_string($stat,trim($_POST['contactno']));
	if(!strcmp($name_t,"")==1)
	{
	   $name_flag=1;
	   $flag=1;
	}
        if(filter_var($email, FILTER_VALIDATE_EMAIL)==false)
        {
           $email_flag=1;
           $flag=1;
        }
	if(!strcmp($address,"")==1)
	{
	   $address_flag=1;
	   $flag=1;
	}
	if(!strcmp($qualification,"")==1)
	{
	   $qualification_flag=1;
	   $flag=1;
	}
	if(!strcmp($contactno,"")==1)
	{
	   $contactno_flag=1;
	   $flag=1;
	}

	if($flag!=1)
	{
			   if(!empty($_FILES['img']['name'])&&$file!="jpg"&&$file!="jpeg"&&$file!="png"&&$file!="bmp"&&$file!="JPG"&&$file!="JPEG"&&$file!="PNG"&&$file!="BMP")
                {
                    $format_flag=1;
					$flag=1;
                }
        		else if(isset($name)&&!empty($name)&&move_uploaded_file($_FILES['img']['tmp_name'],$target))
				{
					 $format_flag=0;
					unlink("image/".$p);	
				}
				else
				{
					$name=$p;
				} 
				 
				if($format_flag!=1)
				{
				     $query="UPDATE `teacher` SET name='$name_t',address='$address',qualification='$qualification',photo='$name',contactno='$contactno',email='$email' WHERE username='$username'";
	       			mysqli_query($stat,$query);
	       			succ();
				}
	
	}
 }
require_once("db.php");
$username=$_SESSION['t_name'];
$query="SELECT * FROM teacher WHERE username='$username'";
$result=mysqli_query($stat,$query);
$rows=mysqli_fetch_array($result);
$p=$rows['photo'];
if(isset($_POST['email']))
   $email_t=$_POST['email'];
else
   $email=$rows['email'];
if(isset($_POST['name_t']))
   $name_t=$_POST['name_t'];
else
   $name_t=$rows['name'];
if(isset($_POST['address']))
  $address=$_POST['address'];
else
$address=$rows['address'];
if(isset($_POST['qual']))
  $qualification=$_POST['qual'];
else
  $qualification=$rows['qualification'];
$designation=$rows['designation'];
$photo=$rows['photo'];
if(isset($_POST['contactno']))
 $contactno=$_POST['contactno'];
else
$contactno=$rows['contactno'];
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
										<li>
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
				
				<form enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                   
			         
                        
					<div class="col-lg-12">
					<h1 class="page-header">
                            Edit Profile
                            <small></small>
                        </h1>
					   <?php
				if($flag==1)
				{?>
				<div class="alert alert-danger">
				<strong>
				The following problems were found while changing the password:
				</strong>
				<br/><br/>
				<?php 
			  if($address_flag==1)
			  {?>
			  <li>
				  <strong>Address field cannot be left empty!</strong>
				  <br/>
			   </li>
				 <?php }
			  if($contactno_flag==1)
			  {?>
			  <li>
				  <strong>Contact number field cannot be empty!</strong>
				  <br/>
			   </li>
				 <?php }
			  if($qualification_flag==1)
			  {?>
			  <li>
				  <strong>The qualification field cannot be left empty!</strong>
				  <br/>
			   </li>
				 <?php }
		       if($name_flag==1)
			  {?>
			  <li>
				  <strong>Name cannot be left empty!</strong>
				  <br/>
			   </li>
				 <?php }
                            if($email_flag==1)
			  {?>
			  <li>
				  <strong>Invalid email ID!</strong>
				  <br/>
			   </li>
				 <?php }
			  if($format_flag==1)
			  {?><li>
				  <strong>Invalid image format!</strong>
				  </li>
				 <?php }?>
				 </div>	
				 <?php
				 }
				 ?>		
					<input type="hidden" value="<?php echo $photo;?>" name="image">
					 <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
					<tbody>
				   <tr>
				   <td>
					<label>
					Username
					</label>
					</td>
					<td>
					<input style="width:200px;" value="<?php echo $username;?>" class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled="">
					</td>
					</tr>
					<tr>
					<td>
					<label>
					Name
					</label>
					</td>
					<td>
					<input style="width:200px;" value="<?php echo $name_t;?>" name="name_t" class="form-control" maxlength='100' placeholder="Name">
					</td>
					</tr>
                    <tr>
					<td>
					<label>
					Address
					</label>
                    </td>
					<td>
					<textarea style="width:300px;" type="text" rows='5' cols='100' maxlength='250' name="address" class="form-control"><?php echo $address;?></textarea>
					</td>
					</tr>
					<tr>
					<td>
					<label>
					Qualification
					</label>
					</td>
					<td>
					<input style="width:400px;" value="<?php echo $qualification;?>" name="qual" class="form-control" placeholder="Qualification">
					</td>
					</tr>
					<tr>
					<td>
					<label>
					Designation
					</label>
					</td>
					<td>
					<input style="width:400px;" value="<?php echo $designation;?>" class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled="">
					</td>
					</tr>
					<tr>
					<td>
					<label>
					Contact number
					</label>
					</td>
					<td>
					<input style="width:200px;" value="<?php echo $contactno;?>" name="contactno" class="form-control" placeholder="
					Contact number">
					</td>
					</tr>
                                        <tr>
					<td>
					<label>
					Email
					</label>
					</td>
					<td>
					<input style="width:300px;" value="<?php echo $email;?>" name="email" class="form-control">
					</td>
					</tr>
					<tr>
					<td>
					<label>Current image</label></td>
					<td>
					 <img width="20%" src="image/<?php echo $photo; ?>">
					 </td>
					 </tr>
					 <tr>
					 <td>
					 <label>Change image</label>	</td>
                       <td>					 
						<input type="file" name="img">
						 </td>
						 </tr>
                   </tbody>
					
					</div>
					</table>
					 
					 <button name="submit" id="submit" type="submit" class="btn btn-lg btn-warning">Make changes</button>	
					 <br/>
					 <br/>
				    </div>
					
               </form>	
                    <button onclick="location.href='t_index.php" class="btn btn-lg btn-default">Cancel</button>			   
                </div>
                <!-- /.row -->
              
						
            </div>
			
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