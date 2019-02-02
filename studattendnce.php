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
                    <li>
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
                    <li class="active">
                        <a href="studattendnce.php"><i class="fa fa-fw fa-bookmark"></i> Attendance</a>
                    </li>
                    <li>
                        <a href="studfees.php"><i class="fa fa-fw fa-money"></i> Fees</a>
                    </li>
                    <li>
                        <a href="studlibrec.php"><i class="fa fa-fw fa-file"></i> Library Records</a>
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
                            Attendance
                        </h1>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    
                                    <?php
                                        $f=0;
                                        require('db.php');
                                        $query="SELECT * from attendance WHERE regno='$reg' ORDER BY date";
                                        $result=mysqli_query($stat,$query); 
                                        if(mysqli_num_rows($result))
                                        {
                                            $f=1;
                                            ?>
                                            <tr>
                                                <td><strong>S.No</strong></td>
                                                <td><strong>Absent Date</strong></td>
                                                <td><strong>Absent Period</strong></td>
                                            </tr>
                                            <?php
                                        }
                                        $i=1;
                                        while($rows=mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <?php
                                                    $date=new DateTime($rows['date']);
                                                    $d=$date->format('d-m-Y');

                                                ?>
                                                <td><?php echo $d ;?></td>
                                                <?php
                                                    switch($rows['type'])
                                                    {
                                                        case 0:
                                                            $t="Morning";
                                                            break;
                                                        case 1:
                                                            $t="Afternoon";
                                                            break;
                                                        case 2:
                                                            $t="Full Day";
                                                    }
                                                ?>
                                                <td><?php echo $t; ?></td>
                                            </tr>
                                            <?php    
                                            $i++;
                                        }
                                        if($i==1)
                                        {
                                            echo "No Records Found!!";
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Absent Details
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    <?php
                                        
                                        if($f==1)
                                        {
                                            require('db.php');
                                            $query1="SELECT * from attendance WHERE regno='$reg' and type=0";
                                            $result1=mysqli_query($stat,$query1);
                                            $c1=mysqli_num_rows($result1);
                                            $query2="SELECT * from attendance WHERE regno='$reg' and type=1";
                                            $result2=mysqli_query($stat,$query2);
                                            $c2=mysqli_num_rows($result2);
                                            $query3="SELECT * from attendance WHERE regno='$reg' and type=2";
                                            $result3=mysqli_query($stat,$query3);
                                            $c3=mysqli_num_rows($result3); 
                                            ?>
                                                <tr>
                                                    <td><strong>Morning</strong></td>
                                                    <td><?php echo $c1; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Afternoon</strong></td>
                                                    <td><?php echo $c2; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Full Day</strong></td>
                                                    <td><?php echo $c3; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong><h4>TOTAL <small>(in days)</small></td>
                                                    <td><?php echo 0.5*$c1 + 0.5*$c2 + $c3; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            else
                                            {
                                                echo "No Records Found!!";
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>
</body>
<?php 
		}
		else
		{
			header("refresh:0,url=index.php");
		}
	}?>
</html>
