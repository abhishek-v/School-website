<?php
session_start();
if(isset($_SESSION['t_name']))
{
  $length_flag=0;
  $mismatch_flag=0;
  $exceeded=0;
  $incorrect=0;
 if(isset($_POST['submit']))
 {
     require_once("db.php");
    $old=$_POST['old'];
    $name=$_SESSION['t_name'];
    $pass=$_POST['pass'];
    $pass1=trim($_POST['pass1']);
    $q="SELECT pass FROM teacher WHERE username='$name'";
    $result=mysqli_query($stat,$q);
    $row=mysqli_fetch_array($result);
    if(strlen($pass)>16)
    {
       $exceeded=1;
    }
    if(crypt($old,$row['pass'])!=$row['pass'])
    {
       $incorrect=1;
    }
    if(strlen($pass)<6)
    {
       $length_flag=1;
    }
    if(strcmp($pass,$pass1)!=0)
    {
      $mismatch_flag=1;
    }
    if(($length_flag!=1)&&($mismatch_flag!=1)&&($incorrect!=1)&&($exceeded!=1))
    {
        $blowfish_salt=bin2hex(openssl_random_pseudo_bytes(22));
        $hash=crypt($pass,"$2a$12$".$blowfish_salt);
        $query="UPDATE `teacher` SET `pass`= '$hash' WHERE `username`='$name'";    
        $result=mysqli_query($stat,$query);
        echo "
            <script >
            alert('Password Changed!');
            </script>
        ";
    
    }
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
$photo=$rows['photo'];
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
                
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Change password
                            <small></small>
                        </h1>
                    </div>
                
                    <div class="col-lg-9">
                <?php
                if($length_flag==1||$mismatch_flag==1||$incorrect==1||$exceeded==1)
                {?>
                <div class="alert alert-danger">
                <strong>
                The following problems were found while changing the password:
                </strong>
                <br/><br/>
                <?php 
              if($incorrect==1)
              {?>
              <li>
                  <strong>Old passwords do not match!</strong>
                  <br/>
               </li>
                 <?php }
              if($length_flag==1)
              {?>
              <li>
                  <strong>The length of the password must be atleast 6 characters.</strong>
                  <br/>
               </li>
                 <?php }
               if($exceeded==1)
              {?>
              <li>
                  <strong>The length of the password cannot exceed than 16 characters.</strong>
                  <br/>
               </li>
                 <?php }
              if($mismatch_flag==1)
              {?><li>
                  <strong>Please re-enter the passwords. The entered passwords do not match!</strong>
                  </li>
                 <?php }?>
                 </div> 
                 <?php
                 }
                 ?>
                    <div class="alert alert-success">
                  <strong>
                  Microsoft states that a strong password is one which meets the following requirements:<br/>
                  <ul>
                    <li>
                    Is at least eight characters long.
                    </li>
                    <li>
Does not contain your user name, real name, or company name.
                    </li>
                    <li>
Does not contain a complete word.
                    </li>
                    <li>
Is significantly different from previous passwords.
                    </li>
                    <li>
                    Is a combination of letters, numbers and special characters.(such as ~ ! @ # $ )
                    </li>
                  </ul>
                  <br/>While it is not mandatory to follow the above steps, we advise you to use those instructions to create a strong password.</strong>
                 </div>
                 <div class="alert alert-warning">
                  <strong>NOTE: Your password must be ATLEAST 6 characters long.</strong>
                 </div>
                    <label>
                    Username
                    </label>
                    <input style="width:200px;" value="<?php echo $username;?>" class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled="">
                    
                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                    <br/>
                    <label>Enter old password</label>
                    <input type="password" maxlength='16' style="width:250px;" name="old" class="form-control">
                    <br/>
                    <label>Enter new password</label>
                    <input type="password" maxlength='16' style="width:250px;" name="pass" class="form-control">
                    <br/>
                    <label>Re-enter new password</label>
                    <input type="password" maxlength='16' style="width:250px;" name="pass1" class="form-control">
                    <br/>
                     <button name="submit" id="submit" type="submit" class="btn btn-lg btn-warning">Change password</button>    
                    </div>
              
               </form>             
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