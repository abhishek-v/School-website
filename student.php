<?php     	
    session_start();
    if(!isset($_SESSION['stuname']))
	{
		header("refresh:0,url=index.php");
	}
	else
	{
		$name='';
    	$reg=$_SESSION['stuname'];
		require_once('db.php');
		$query="SELECT * from student WHERE regno='$reg'";
	    $result=mysqli_query($stat,$query);	
        if($rows=mysqli_fetch_array($result))
        {
			$name=$rows['name'];
			$std=$rows['std'];
			$gen=$rows['gender'];
			$add=$rows['address'];
			$d=$rows['date'];
			$m=$rows['month'];
			$y=$rows['year'];
			$phno=$rows['phno'];
            if($d<10)
			{
				$d='0'.$d;
			}
			if($m<10)
			{
				$m='0'.$m;
			}
			$from = new DateTime($y.'-'.$m.'-'.$d);
			$to   = new DateTime('today');
			$age= $from->diff($to)->y;
			$img=$rows['photo'];
			$med=$rows['medrec'];
			$height=$rows['height'];
			$weight=$rows['weight'];
			$bldgrp=$rows['bloodgrp'];
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Interface</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

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
                <a class="navbar-brand" href="student.php">Student's Web Interface</a>
            </div>
            <?php
                require_once('student_topmenu.php');
            ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="student_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="student.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="studsubjects.php"><i class="fa fa-fw fa-book"></i> Subjects</a>
                    </li>
                    <li>
                        <a href="studtable.php"><i class="fa fa-fw fa-table"></i> Timetable</a>
                    </li>
                    <li>
                        <a href="studexamtable.php"><i class="fa fa-fw fa-calendar"></i> Exam Timetable</a>
                    </li>
                    <li>
                        <a href="studfeedback.php"><i class="fa fa-fw fa-edit"></i> Feedback</a>
                    </li>
                    <li>
                        <a href="studactivity.php"><i class="fa fa-fw fa-dashboard"></i> Activities</a>
                    </li>
                    <li>
                        <a href="studmarks.php"><i class="fa fa-fw fa-bar-chart-o"></i> Marks</a>
                    </li>
                    <li>
                        <a href="studattendnce.php"><i class="fa fa-fw fa-bookmark"></i> Attendance</a>
                    </li>
                    <li>
                        <a href="studfees.php"><i class="fa fa-fw fa-money"></i> Fees</a>
                    </li>
                    <li>
                        <a href="studlibrec.php"><i class="fa fa-fw fa-file"></i> Library Records</a>
                    </li>
                    <!--
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>    
                        <a href="tables.html"><i class="fa fa-book fa-fw"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                    -->
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
                            Profile 
                        </h1>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2"><h3><strong>General Profile</strong></h3></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td><?php echo $name ;?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td><strong>STD</strong></td>
                                        <td><?php echo $std ;?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Register No.</strong></td>
                                        <td><?php echo $reg ;?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Address</strong></td>
                                        <td><?php echo $add ;?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Contact No</strong></td>
                                        <td><?php echo $phno ;?></td>
                                    </tr><tr>
                                        <td><strong>Date Of Birth</strong></td>
                                        <td><?php echo $d."-".$m."-".$y ;?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Age</strong></td>
                                        <td><?php echo $age ;?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img width="100%" src="student_image/<?php echo $img ;?>">
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-9">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2"><h3><strong>Physical Profile</strong></h3></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Gender</strong></td>
                                        <td><?php echo $gen ;?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Medical Record</strong></td>
                                        <td><?php echo $med ;?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Height</strong></td>
                                        <td><?php echo $height ;?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Weight</strong></td>
                                        <td><?php echo $weight ;?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Blood Group</strong></td>
                                        <td><?php echo $bldgrp ;?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>
<?php 
		}
		else
		{
			header("refresh:0,url=index.php");
		}
	}?>
</html>
