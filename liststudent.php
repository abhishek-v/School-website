<?php     	
    session_start();
    if(!isset($_SESSION['name']))
	{
		header("refresh:0,url=academylogin.php");
	}
	else
	{  
        require_once('db.php');
		$regno=$_GET['reg'];
        $name=$_SESSION['name'];
        $query="SELECT * from student WHERE regno='$regno';";
        $result=mysqli_query($stat,$query); 
        if($rows=mysqli_fetch_array($result))
        {
            $sname=$rows['name'];  
            $reg=$rows['regno'];  
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

    <title>Admin Interface</title>

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
                <a class="navbar-brand" href="admin.php">Admin's Web Interface</a>
            </div>
            <?php
                require_once('admin_topmenu.php');
            ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
             <div class="collapse navbar-collapse navbar-ex1-collapse">
                     
			<ul class="nav navbar-nav side-nav">
                    
                <li><a href="admin.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
                 <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#dash"><i class="fa fa-fw fa-dashboard fa-fw"></i> Dashboard<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="dash" class="collapse">
                            <li><a href="admin_dash_view.php"><i class="fa fa-fw fa-table fa-fw"></i> View posts</a></li>
                            <li><a href="admin_form_dash.php"><i class="fa fa-fw fa-plus fa-fw"></i> Add Post</a></li>
                            <li><a href="admin_dash_edit.php"><i class="fa fa-fw fa-edit fa-fw"></i> Edit Post</a></li>
                            <li><a href="admin_dash_delete.php"><i class="fa fa-fw fa-minus fa-fw"></i> Delete Post</a></li>
                        </ul>
                    </li>	
                    <li><a href="javascript:;" data-toggle="collapse" data-target="#subject"><i class="fa fa-fw fa-book fa-fw"></i> Subjects<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="subject" class="collapse">
                            <li><a href="admin_listsubject.php"><i class="fa fa-fw fa-table fa-fw"></i> List</a></li>
                            <li><a href="admin_addsubject.php"><i class="fa fa-fw fa-plus fa-fw"></i> Add</a></li>
                            <li><a href="admin_editsubject.php"><i class="fa fa-fw fa-edit fa-fw"></i> Edit</a></li>
                            <li><a href="admin_delsubject.php"><i class="fa fa-fw fa-minus fa-fw"></i> Delete</a></li>
                        </ul>
                    </li>
	            	
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#class"><i class="fa fa-fw fa-university fa-fw"></i> Class<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="class" class="collapse">
                            <li><a href="admin_listclass.php"><i class="fa fa-fw fa-table fa-fw"></i> List</a></li>
                            <li><a href="admin_addclass.php"><i class="fa fa-fw fa-plus fa-fw"></i> Add</a></li>
                            <li><a href="admin_editclass.php"><i class="fa fa-fw fa-edit fa-fw"></i> Edit</a></li>
                            <li><a href="admin_delclass.php"><i class="fa fa-fw fa-minus fa-fw"></i> Delete</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#teacher"><i class="fa fa-fw fa-graduation-cap fa-fw"></i> Teacher<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="teacher" class="collapse">
                            <li><a href="admin_listteacher.php"><i class="fa fa-fw fa-table fa-fw"></i> List</a></li>
                            <li><a href="admin_addteacher.php"><i class="fa fa-fw fa-plus fa-fw"></i> Add</a></li>
                            <li><a href="admin_editteacher.php"><i class="fa fa-fw fa-edit fa-fw"></i> Edit</a></li>
                            <li><a href="admin_delteacher.php"><i class="fa fa-fw fa-minus fa-fw"></i> Delete</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#student"><i class="fa fa-fw fa-child fa-fw"></i> Student<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="student" class="collapse">
                            <li><a href="admin_liststudent.php"><i class="fa fa-fw fa-table fa-fw"></i> List</a></li>
                            <li><a href="admin_addstudent.php"><i class="fa fa-fw fa-plus fa-fw"></i> Add</a></li>
                            <li><a href="admin_editstudent.php"><i class="fa fa-fw fa-edit fa-fw"></i> Edit</a></li>
                            <li><a href="admin_delstudent.php"><i class="fa fa-fw fa-minus fa-fw"></i> Delete</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#timetable"><i class="fa fa-fw fa-table fa-fw"></i> Time Table<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="timetable" class="collapse">
                            <li><a href="admin_listtimetable.php"><i class="fa fa-fw fa-table fa-fw"></i> List</a></li>
                            <li><a href="admin_addtimetable.php"><i class="fa fa-fw fa-plus fa-fw"></i> Add</a></li>
                            <li><a href="admin_edittimetable.php"><i class="fa fa-fw fa-edit fa-fw"></i> Edit</a></li>
                            <li><a href="admin_deltimetable.php"><i class="fa fa-fw fa-minus fa-fw"></i> Delete</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#examschedule"><i class="fa fa-fw fa-calendar fa-fw"></i> Exam Schedule<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="examschedule" class="collapse">
                            <li><a href="admin_listexamschedule.php"><i class="fa fa-fw fa-table fa-fw"></i> List</a></li>
                            <li><a href="admin_addexamschedule.php"><i class="fa fa-fw fa-plus fa-fw"></i> Add</a></li>
                            <li><a href="admin_editexamschedule.php"><i class="fa fa-fw fa-edit fa-fw"></i> Edit</a></li>
                            <li><a href="admin_delexamschedule.php"><i class="fa fa-fw fa-minus fa-fw"></i> Delete</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#fees"><i class="fa fa-fw fa-money fa-fw"></i> Fees<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="fees" class="collapse">
                            <li><a href="admin_listfees.php"><i class="fa fa-fw fa-table fa-fw"></i> List</a></li>
                            <li><a href="admin_addfees.php"><i class="fa fa-fw fa-plus fa-fw"></i> Add</a></li>
                            <li><a href="admin_editfees.php"><i class="fa fa-fw fa-edit fa-fw"></i> Edit</a></li>
                            <li><a href="admin_delfees.php"><i class="fa fa-fw fa-minus fa-fw"></i> Delete</a></li>
                        </ul>
                    </li>
                    <li><a href="admin_string_generate.php"><i class="fa fa-fw fa-certificate"></i> Tokens</a></li>
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
                            <?php echo $sname; ?>
                            <small><?php echo "(".$regno.")"; ?></small>
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
                                        <td><?php echo $rows['name'];?><br></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Class</strong></td>
                                        <td><?php echo $std;?><br></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gender</strong></td>
                                        <td><?php echo $gen;?><br></td>
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
                                    </tr>
                                    <tr>
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
                        <img height="100%" width="100%" src="student_image/<?php echo $img ;?>">
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="3"><h3><strong>Activity</strong></h3></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>S.No</strong></td>
                                        <td><strong>Date</strong></td>
                                        <td><strong>Activity</strong></td>
                                    </tr>
                                    <?php
                                        require('db.php');
                                        $query="SELECT * from activity WHERE regno='$reg'";
                                        $result=mysqli_query($stat,$query); 
                                        $i=1;
                                        while($rows=mysqli_fetch_array($result))
                                        {
                                            $d=$rows['date'];
                                            $re=$rows['activity'];
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $d ;?></td>
                                                <td><?php echo $re?></td>
                                            </tr>
                                            <?php    
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="4"><h3><strong>Feedback</strong></h3></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>S.No</strong></td>
                                        <td><strong>Date</strong></td>
                                        <td><strong>Remarks</strong></td>
                                        <td><strong>Teacher</strong></td>
                                    </tr>
                                    <?php
                                        require('db.php');
                                        $query="SELECT * from feedback WHERE regno='$reg'";
                                        $result=mysqli_query($stat,$query); 
                                        $i=1;
                                        while($rows=mysqli_fetch_array($result))
                                        {
                                            $ct=$rows['teacher'];
                                            $query1="SELECT * from teacher WHERE username='$ct'";
                                            $result1=mysqli_query($stat,$query1);
                                            $row=mysqli_fetch_array($result1);
                                            $t=$row['name'];
                                            $d=$rows['date'];
                                            $re=$rows['remark'];
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $d ;?></td>
                                                <td><?php echo $re?></td>
                                                <td><?php echo $t?></td>
                                            </tr>
                                            <?php    
                                            $i++;
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    <thead>
                                    <tr>
                                        <th colspan="7"><h3><strong>Marks</strong></h3></th>
                                    </tr>
                                </thead>
                                    <?php
                                        require('db.php');
                                        $query="SELECT * from marks WHERE regno='$reg'";
                                        $result=mysqli_query($stat,$query); 
                                        if(mysqli_num_rows($result))
                                        {?>
                                            <tr>
                                                <td><strong>S.No</strong></td>
                                                <td><strong>Exam Name</strong></td>
                                                <td><strong>Subject</strong></td>
                                                <td><strong>Marks</strong></td>
                                                <td><strong>Maximum Marks</strong></td>
                                                <td><strong>Class Average</strong></td>
                                                <td><strong>Class Highest</strong></td>
                                            </tr>
                                            <?php
                                        }
                                        $i=1;
                                        while($rows=mysqli_fetch_array($result))
                                        {
                                            $n=$rows['type'];
                                            $t=$rows['type'];
                                            if($n=='Unit tests/class tests/Other(Specify)')
                                            {
                                                $n=$rows['name'];
                                            }
                                            $na=$rows['name'];
                                            $s=$rows['subj'];
                                            $st=$rows['std'];
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $n ;?></td>
                                                <td><?php echo $rows['subj']?></td>
                                                <td><?php echo $rows['marks']?></td>
                                                <td><?php echo $rows['max']?></td>
                                                <?php
                                                    $query1="SELECT SUM(marks) AS sum from marks WHERE type='$t' and name='$na' and subj='$s' and std='$st' and marks!='Absent'";
                                                    $result1=mysqli_query($stat,$query1); 
                                                    if($rows1=mysqli_fetch_array($result1))
                                                    {
                                                        $su=$rows1['sum'];
                                                        $query2="SELECT * from marks WHERE type='$t' and name='$na' and subj='$s' and std='$st' and marks!='Absent'";
                                                        $result2=mysqli_query($stat,$query2);
                                                        $c2=mysqli_num_rows($result2);
                                                        ?>
                                                        <td><?php echo number_format((float)($su/$c2), 2, '.', ''); ?></td>
                                                        <?php
                                                    }

                                                ?>
                                                <?php
                                                    $query1="SELECT MAX(marks) AS high from marks WHERE type='$t' and name='$na' and subj='$s' and std='$st' and marks!='Absent'";
                                                    $result1=mysqli_query($stat,$query1); 
                                                    if($rows1=mysqli_fetch_array($result1))
                                                    {
                                                        ?>
                                                        <td><?php echo $rows1['high']; ?></td>
                                                        <?php
                                                    }

                                                ?>
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
	}?>
</html>
