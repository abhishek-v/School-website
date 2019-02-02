<?php
session_start();
if(isset($_SESSION['t_name']))
{
$flag=0;
if(isset($_POST['submit']))
{
  require_once("db.php");
  $std_sub=$_POST['std_subj'];
  $type=strchr($std_sub,': ',true);
  $temp=substr(strchr($std_sub,": "),2);
  $std_t=strchr($temp,' ',true);
  $subj=strchr($temp,"- ",false);
  $subj=substr($subj,2,strlen($subj));
  if(strcmp($type,"Quarterly examination")&&strcmp($type,"Half yearly examination")&&strcmp($type,"Annual examination"))
  {
  $name_test=$type;
  $temp_flag=1;
  }
  else{
  $name_test="";
  $temp_flag=0;
  }
  if($temp_flag==1)
    $query="DELETE FROM marks WHERE std='$std_t' && subj='$subj' && name='$name_test'";
  else
  $query="DELETE FROM marks WHERE std='$std_t' && subj='$subj' && type='$type'";
  $result=mysqli_query($stat,$query);
  $flag=1;
  echo"
  <script type='text/javascript'>
  alert('You have successfully deleted the marks for the selected test');
   </script>";
  header("refresh:0,url=".$_SERVER['PHP_SELF']);
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
$query="SELECT * FROM class WHERE teacher='$username'";
$result=mysqli_query($stat,$query);
$std_arr=[];
$subj_arr=[];
$type_arr=[];
$std_arr_final=[];
$subj_arr_final=[];
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
                   <li class="active">
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
                           Delete marks
                            <small></small>
                        </h1>
                        
                    </div>
                </div>
				<?php
				
				 
				 ?>
				<form method="POST" onsubmit="return confirm_delete();" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                 <label>Select test</label>
								<br/>
				<select name="std_subj" id="std_subj" class="form-control" style="width:500px">
			<?php	
			$i=0;
			
			while($row=mysqli_fetch_array($result))
                    {
					
                 $std=$row['std'];
	             if(!strcmp($row['teacher'],$username))
	            {
					$subj_arr[$i]=$row['subject'];
					$std_arr[$i]=$std;
					$i++;
					}
					
                 }
				 
				 for($k=1;$k<10;$k++)
				 {
				  $query1="SELECT * from class WHERE teacher".$k."='$username'";
		             $result1=mysqli_query($stat,$query1);
				    while($row=mysqli_fetch_array($result1))
                    {
					 $std=$row['std'];
					 
				      if(!strcmp($row['teacher'.$k],$username))
	                  {
					  $subj_arr[$i]=$row['subject'.$k];
					$std_arr[$i]=$std;
					
					
					$i++;
					
				    }
				 }
			   }
			   $l=0;
			   $m=0;
			   while($l<$i)
			   {
			      $query="SELECT DISTINCT type,std,subj,name FROM marks WHERE subj='".$subj_arr[$l]."' && std='".$std_arr[$l]."';";
					
					$result=mysqli_query($stat,$query);
					while($row=mysqli_fetch_array($result))
					{
					$type_arr[$m]=$row['type'];
					$std_arr_final[$m]=$row['std'];
					$subj_arr_final[$m]=$row['subj'];
					 $m++;
				 ?>
				<option id="<?php echo $row[0]." - ".$row[1];?>">
				<?php
				if(!strcmp($row['type'],"Unit tests/class tests/Other(Specify)"))
				   echo $row[3].": ".$row[1]." - ".$subj_arr[$l];
				else
   				echo $row[0].": ".$row[1]." - ".$subj_arr[$l];?>
				</option>
                    	
				 <?php
				   }
				 $l++;
			   }
				 ?>
				</select>
				<?php
				if(isset($_POST['std_subj']))
				{?>
				<script type="text/javascript">
				document.getElementById('std_subj').value = "<?php echo $_POST['std_subj'];?>";
				</script>
				<?php }?>
				<br/>
				<div class="alert alert-warning">
				  <strong>If you wish to change the marks, you can do so, via the "Edit marks" page</strong>
				 </div>
				<!-- /.row -->
			
             <?php
			
			    function create_div()
				{
				 
				  global $m; 
				   global $i;
				   global $type_arr;
				   global $std_arr_final;
				   global $subj_arr_final;
				   global $stat;
				   $j=0;
				 for($j=0;$j<$m;$j++)
				 {
				?>
				 
				  <div id="<?php echo "div_".$std_arr_final[$j]." - ".$subj_arr_final[$j].$type_arr[$j];?>" style="display:none;">
				    
					<div class="table-responsive">
                                    <table style="width:1000px;" class="table table-bordered table-hover table-striped">
									  <thead>
                                                        <tr>
                                                            <th  colspan="3"><h4><b><?php echo $std_arr_final[$j]." - ".$subj_arr_final[$j];?></b></h4></th>
                                                        </tr>
                                      </thead>
                                        <tbody>
		                                    <tr>
                                                <td><b>Register No.</b></td>
                                                <td><b>Name</b></td>
                                                <td><b>Marks awarded</b></td>
                                            </tr>
				  <?php
				    $query="SELECT * FROM marks WHERE std='".$std_arr_final[$j]."' && subj='".$subj_arr_final[$j]."' && type='".$type_arr[$j]."'";
					$result=mysqli_query($stat,$query);
					$execute_once=0;
					while($row=mysqli_fetch_array($result))
					{
					if($execute_once==0)
					{
					$execute_once=1;
					$max_mark=$row['max'];
					}
					?>
					<tr>
					<td>
					<?php   echo $row['regno']."<br/>";
					?>
					</td>
					<td>
					<?php 
                    $retname="SELECT name FROM student WHERE regno='".$row['regno']."'";
					$res=mysqli_query($stat,$retname);
					$row1=mysqli_fetch_array($res);
					echo $row1[0]."<br/>";
					?>
					</td>
					<td>
				
					<?php if(!strcmp($row['marks'],"Absent"))
					echo "Absent";
					else
					echo $row['marks'];?>
					<input type="hidden" name="$subj_arr_final[$j].$row['regno']" style="display:none;" id="<?php echo "div".$j;?>" />
					</td>
					</tr>
					<?php
					}
				   
				   ?>
				   
				   </tbody>
				   </table>
				   <label>Maximum marks: </label><?php echo " ".$max_mark;?>
				   <br/><br/>
				   <button name="submit" id="submit" type="submit" class="btn btn-lg btn-danger">Delete marks</button>
				  
				   
				   </div>
				   </div>
				   <?php }
				}
				create_div();
				?>
				</form>
				
				     
					  
		<script>
		        
                        std_subj.addEventListener('change',stdChanged, false);
						var st=document.getElementById('std_subj');
					    var val1=st.selectedIndex;
					
						var par=document.getElementById("div"+val1).parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.id;
						
						document.getElementById(par).style.display="block";
						var hide_this="div"+val1;
						function stdChanged()
						{				
					    par=document.getElementById(hide_this).parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.id;
						document.getElementById(par).style.display="none";
						val1=st.selectedIndex;
						par=document.getElementById("div"+val1).parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.id;
						document.getElementById(par).style.display="block";
						hide_this="div"+val1;
						}
						function confirm_delete()
						{
						if(confirm("Are you sure you want to delete the selected test?"))
						return true;
						else
						return false;
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