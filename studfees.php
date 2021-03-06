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
            if($std[1]=='1'||$std[1]=='2'||$std[1]=='0')
            {
                $std=$std[0].$std[1];
            }
            else
            {
                $std=$std[0]."";
            }

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
                    <li>
                        <a href="studattendnce.php"><i class="fa fa-fw fa-bookmark"></i> Attendance</a>
                    </li>
                    <li class="active">
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
                            Fees
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <?php
                                    $d= new DateTime('today');
                                    $da=$d->format('Y-m-d');
                                    require_once('db.php');
                                    $query1="SELECT * FROM fees WHERE date>='$da' and std='$std' ";
                                    $result1=mysqli_query($stat,$query1);
                                    $c=mysqli_num_rows($result1);
                                    if($c>0)
                                    {?>
                                        <tr>
                                            <th colspan="3"><h3><strong>Fees Due</strong></h3></th>
                                        </tr>
                                        <tr>
                                            <td><b>Particulars</b></td>
                                            <td><b>Amount</b></td>
                                            <td><b>Due Date</b></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>    
                                </thead>
                                <tbody>
                                    <?php
                                    while($row=mysqli_fetch_array($result1))
                                    {?>
                                        <tr>
                                            <td><?php echo $row['particulars'] ;?></td>
                                            <td><?php echo $row['amount'] ;?></td>
                                            <td><?php echo $row['date'] ;?></td>
                                        </tr>
                                    <?php
                                    }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <?php
                                    require_once('db.php');
                                    $query2="SELECT * FROM fees WHERE date<'$da' and std='$std' ";
                                    $result2=mysqli_query($stat,$query2);
                                    $c2=mysqli_num_rows($result2);
                                    if($c2>0)
                                    {
                                    ?>
                                        <tr>
                                            <th colspan="3"><h3><strong>Fees Collection</strong></h3></th>
                                        </tr>
                                        <tr>
                                            <td><b>Particulars</b></td>
                                            <td><b>Amount</b></td>
                                            <td><b>Due Date</b></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </thead>
                                <tbody>
                                    <?php
                                    while($row2=mysqli_fetch_array($result2))
                                    {?>
                                        <tr>
                                            <td><?php echo $row2['particulars'] ;?></td>
                                            <td><?php echo $row2['amount'] ;?></td>
                                            <td><?php echo $row2['date'] ;?></td>
                                        </tr>
                                    <?php
                                    }
                                    if($c2>0)
                                    {
                                        $query2="SELECT SUM(amount) AS total FROM fees WHERE date<'$da' and std='$std' ";
                                        $result2=mysqli_query($stat,$query2);
                                        if($row2=mysqli_fetch_array($result2))
                                        {
                                            ?>
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td colspan="2"><b><?php echo $row2['total'];?></b></td>
                                            </tr>
                                            <?php
                                        }
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

</body>
<?php 
	}
	else
	{
		header("refresh:0,url=index.php");
	}
}?>
</html>
