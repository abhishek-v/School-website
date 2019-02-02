<?php     	
    session_start();
    if(!isset($_SESSION['name']))
	{
		header("refresh:0,url=academylogin.php");
	}
	else
	{
		$x = $_GET['x'];
		$name=$_SESSION['name'];
		require('db.php');
		$query="SELECT * from class WHERE std='$x'";
		$result=mysqli_query($stat,$query);	
		$i=1;
		$p="";
		if($rows=mysqli_fetch_array($result))
		{
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
                    <li><a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="javascript:;" data-toggle="collapse" data-target="#subject"><i class="fa fa-fw fa-book fa-fw"></i> Subjects<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="subject" class="collapse">
                            <li><a href="admin_listsubject.php"><i class="fa fa-fw fa-table fa-fw"></i> List</a></li>
                            <li><a href="admin_addsubject.php"><i class="fa fa-fw fa-plus fa-fw"></i> Add</a></li>
                            <li><a href="admin_editsubject.php"><i class="fa fa-fw fa-edit fa-fw"></i> Edit</a></li>
                            <li><a href="admin_delsubject.php"><i class="fa fa-fw fa-minus fa-fw"></i> Delete</a></li>
                        </ul>
                    </li>
                    <li class="active">
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
                    <li>
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
                            <?php echo $x; ?>
                        </h1>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                	<center><p id="incor1"></p></center>
                                    <form enctype="multipart/form-data" method="post" action="editclass1.php">
											<div hidden="true" class="field-wrap">
												<input value="<?php echo $x ?>" name="std" type="text" ></input>
											</div>
												<tr>
													<td><b>Class Teacher</b></td>
											    	<td>
											    	<select name="classteacher" class="form-control" style="width: 95%; height: 35px; background-color: white;>
											    		<?php
											    			require_once('db.php');
											    			$query1="SELECT * from teacher";
										    				$result1=mysqli_query($stat,$query1);	
										    				?><option value='NULL' selected>select an option</option><?php
										                    while($row=mysqli_fetch_array($result1))
										                    {
										                    	if($row['username']==$rows['classteacher'])
										                    	{
										                        	?><option selected="true" value="<?php echo $row['username']; ?>"><?php echo $row['name']; ?></option><?php
										                    	}
										                    	else
										                    	{
										                    		?><option value="<?php echo $row['username']; ?>"><?php echo $row['name']; ?></option><?php
										                    	}
										                    }
										                ?>
											    	</select>
											    	</td>
											    	</tr>
									    <?php
											require_once('db.php');
											$quer="SELECT * from subject";
											$resul=mysqli_query($stat,$quer);	
									        while($row=mysqli_fetch_array($resul))
									        {
									        	?>
									    		<select hidden="true" id="<?php echo $row['id'] ?>" >
											    		<?php
											    			require_once('db.php');
											    			$y=$row['name'];
											    			$query="SELECT * from teacher WHERE `subject1` = \"$y\" OR `subject2` = \"$y\" OR `subject3` = \"$y\" OR `subject4` = \"$y\" OR `subject5` = \"$y\" ";
										    				$result=mysqli_query($stat,$query);	
										                    while($row1=mysqli_fetch_array($result))
										                    {
										                        ?>  <option value="<?php echo $row1['username']; ?>"><?php echo $row1['name'] ; ?></option>
										                        
										                    <?php    
										                    }
										                ?>
												</select>
											<?php } ?>  	
											

											<?php

											for ($i=0; $i < 10; $i++) 
											{
												$x=$i."";
												if($i==0)
												{
													$x="";
												}
												$sub=$rows['subject'.$x];
												if($sub!="")
												{
													$tea=$rows['teacher'.$x];
													$q1="SELECT * from teacher WHERE username='$tea'";
								    				$re1=mysqli_query($stat,$q1);	
								                    if($r1=mysqli_fetch_array($re1))
								                    {
								                    	$tea=$r1['name'];
								                    }
												}
												?>
												<tr>
												<td><b>Subject <?php echo $i+1;?></b></td>
												<td>
												<div class="field1">
													<div class="field-wrap">
												    	<select name="sub_nam[]" class="form-control subj" style="width: 45%; height: 35px; background-color: white; color: black; font-size:22; float: left; font-style: calibri" >
												    	<option disabled selected>select an option</option>
												    		<?php
												    			require_once('db.php');
												    			$query="SELECT * from subject ORDER BY name";
											    				$result=mysqli_query($stat,$query);	
											                    while($row2=mysqli_fetch_array($result))
											                    {
											                        if($sub==$row2['name'])
											                        {?> 
											                         <option selected value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>

											                    <?php
											                		}
											                    	else
											                    	{
											                    		?>
											                    		<option value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>
											                    		<?php
											                    	}    
											                    }
											                    
											                    ?>
												    	</select>
												    	
										            	<select name="teach_nam[]" style="margin-left: 5%; width: 45%; height: 35px; background-color: white; color: black; font-size:22; float: left; font-style: calibri" class="form-control">
										            		<?php
																	
											                    	$quer1="SELECT * from teacher WHERE `subject1` = '$sub' OR `subject2` = '$sub' OR `subject3` = '$sub' OR `subject4` = '$sub' OR `subject5` = '$sub' ";
												    				$resul1=mysqli_query($stat,$quer1);	
												                    while($ro1=mysqli_fetch_array($resul1))
												                    {
												                    	if($sub!=""&&$tea!="")
												                    	{
												                    		if($ro1['name']==$tea)
												                    		{
												                    			?>  <option selected value="<?php echo $ro1['username']; ?>"><?php echo $ro1['name'] ; ?></option><?php
												                    		}
												                    		else
												                    		{
												                    			?>  <option value="<?php echo $ro1['username']; ?>"><?php echo $ro1['name'] ; ?></option><?php
												                    		}
												                    	}
												                    }
											                    ?>
													    </select>
													    
												</div>
												</div>
												</td>
												</tr>

												<?php } ?>
												</tbody>
                            </table>
									      	<tr>
									      	<td colspan="2" align="center"><button style="width:10%;" name="submit" type="submit" class="btn btn-success">Edit</button></td>
									        <!--<button width="100%" name="submit4" class="button button-block" >Edit</button>-->
									        </td>
									        </tr>
									    </form>
									    
                                
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
    <script src="subject1.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>
<?php 
		}
	}?>
</html>
