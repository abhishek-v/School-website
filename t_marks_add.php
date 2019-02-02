<?php
session_start();
//loop through others condition check for each name
if(isset($_SESSION['t_name']))
{
$flag=0;
if(isset($_POST['submit']))
{
  require_once("db.php");
  $std_sub=$_POST['std_subj'];
  $std_t=strchr($std_sub,' ',true);
  $query="SELECT * FROM student WHERE std='$std_t'";
  $result=mysqli_query($stat,$query);
  $subj=strchr($std_sub,"- ",false);
  $subj=substr($subj,2,strlen($subj));
  $type=$_POST['type'];
	$subj_temp="";
	for($i=0;$i<strlen($subj);$i++)
	{
	   if($subj[$i]==" ")
	     $subj_temp[$i]="_";
	   else 
	     $subj_temp[$i]=$subj[$i];
	}
	 $max=mysqli_real_escape_string($stat,trim($_POST["max_".implode($subj_temp).$std_t]));
	if(!strcmp($max,""))
	{
	   $flag=-4;
	}
  //check if test already present
  if($flag!=-4)
  {
  $query1="SELECT * FROM marks WHERE type='$type' && subj='$subj' && std='$std_t'";
  $result1=mysqli_query($stat,$query1);
  if(!strcmp($type,"Unit tests/class tests/Other(Specify)"))
  {
  if(!strcmp(mysqli_real_escape_string($stat,trim($_POST['other'])),""))
     $flag=-3;
   }
  if($flag!=-3)
  {
   if(mysqli_num_rows($result1)!=0)
   {
    while($row=mysqli_fetch_array($result1))
	{
	if((!strcmp($row['type'],"Unit tests/class tests/Other(Specify)")))
	{
	   if(!strcasecmp($row['name'],mysqli_real_escape_string($stat,trim($_POST['other']))))
	      $flag=-2;
	}
	else
    $flag=-1;
	}
	
   }
  if(($flag!=-1)&&($flag!=-2))
  {
  while($row=mysqli_fetch_array($result))
  {
     
     $reg_no=$row['regno'];
	 $other=mysqli_real_escape_string($stat,trim($_POST['other']));
	 $mark=$_POST[implode($subj_temp).$reg_no];
	 if(!strcmp(trim($mark),""))
	   $mark="Absent";
	 //name is name of the test
     $query="INSERT INTO marks(type,name,subj,regno,std,marks,max)VALUES('$type','$other','$subj','$reg_no','$std_t','$mark','$max')";
	 mysqli_query($stat,$query);
	 $flag=1;
  }
  }
  }
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
                           Update marks
                            <small></small>
                        </h1>
                        
                    </div>
                </div>
				<?php
				if($flag==1)
				{
				?>
				<div class="alert alert-success">
				  <strong>You have successfully added the marks.</strong>
				 </div>
				 <?php
				 }
				 if($flag==-1)
				{
				?>
				<div class="alert alert-danger">
				  <strong>The marks for <?php echo $type;?> have already been entered. Use the edit menu to change the marks for this test!</strong>
				 </div>
				 
				 <?php
				 }
				 if($flag==-2)
				 {?>
				 <div class="alert alert-danger">
				  <strong>There is already a test named <?php echo $_POST['other'];?>. Use a different name for this test.</strong>
				 </div>
				 <?php
				 }
				 if($flag==-3)
				 {
				 ?>
				 <div class="alert alert-danger">
				  <strong>The name of the test cannot be empty!</strong>
				 </div>
				<?php
				}
				 if($flag==-4)
				 {
				 ?>
				 <div class="alert alert-danger">
				  <strong>Maximum marks for the test needs to be entered!</strong>
				 </div>
				<?php
				}
				?>
				<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
			    
                                <label>Select type</label>
								<br/>
                                <select name="type" id="type" class="form-control" style="width:300px;display:inline;">
                                    <option>Quarterly examination</option>
                                    <option>Half yearly examination</option>
									<option>Annual examination</option>
									<option>Unit tests/class tests/Other(Specify)</option>
                                </select>
                   			&nbsp &nbsp	
                  <input name="other" id="other" style="width:300px;display:inline;" class="form-control" placeholder="Name of the test">
					
                            <br/>
                            <br/>
                  <?php
                    if(isset($_POST['type']))
                    {?>					
					<script type="text/javascript">
            document.getElementById('type').value = "<?php echo $_POST['type'];?>";
             </script>
			      <?php }?>
					<script>
					document.getElementById("other").style.visibility = "hidden";
					      type.addEventListener('change', onSelectChanged, false);
							var mark=document.getElementById('type');
                         var val=mark.options[mark.selectedIndex].text;
								 
							    if(val=="Unit tests/class tests/Other(Specify)")
								{								   
                              document.getElementById("other").style.visibility = "visible";
								}
							function onSelectChanged()
							{
							     var val=mark.options[mark.selectedIndex].text;
								 
							    if(val=="Unit tests/class tests/Other(Specify)")
								{								   
                              document.getElementById("other").style.visibility = "visible";
								}
								else
								{
								 document.getElementById("other").style.visibility = "hidden";
								
								}
							
							}
   
   </script>
                 <label>Select class</label>
								<br/>
				<select name="std_subj" id="std_subj" class="form-control" style="width:300px">
			<?php	
			$i=0;
			
			while($row=mysqli_fetch_array($result))
                    {
					
                 $std=$row['std'];
	             if(!strcmp($row['teacher'],$username))
	            {
	                ?><option id="<?php echo $std."_".$row['subject'];?>"><?php echo $std." - ".$row['subject'];?></option>
					<?php
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
	                   ?><option id="<?php echo $std."_".$row['subject'.$k];?>"><?php echo $std." - ".$row['subject'.$k];?></option>
		       			<?php
						$subj_arr[$i]=$row['subject'.$k];;
					$std_arr[$i]=$std;
					$i++;
						
                       } 
				    }
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
				<div class="alert alert-info">
				  <strong>Leave the "Marks awarded" field empty to denote an absentee.</strong>
				 </div>
				
				<!-- /.row -->
				
             <?php
			
			    function create_div()
				{
				  
				   global $i;
				   global $std_arr;
				   global $subj_arr;
				   global $stat;
				 for($j=0;$j<$i;$j++)
				 {
				?>
				 
				  <div id="<?php echo "div_".$std_arr[$j]." - ".$subj_arr[$j];?>" style="display:none;">
				    
					<div class="table-responsive">
                                    <table style="width:1000px;" class="table table-bordered table-hover table-striped">
									  <thead>
                                                        <tr>
                                                            <th  colspan="3"><h4><b><?php echo $std_arr[$j]." - ".$subj_arr[$j];?></b></h4></th>
                                                        </tr>
                                      </thead>
                                        <tbody>
		                                    <tr>
                                                <td><b>Register No.</b></td>
                                                <td><b>Name</b></td>
                                                <td><b>Marks awarded</b></td>
                                            </tr>
				  <?php
				    $query="SELECT * FROM student WHERE std='".$std_arr[$j]."'";
					$result=mysqli_query($stat,$query);
					
					while($row=mysqli_fetch_array($result))
					{
					?>
					<tr>
					<td>
					<?php   echo $row['regno']."<br/>";
					?>
					</td>
					<td>
					<?php   echo $row['name']."<br/>";
					?>
					</td>
					<td>
					<input type="number" name="<?php echo $subj_arr[$j].$row['regno'];?>" style="width:150px;" value="<?php 
					if(isset($_POST[$subj_arr[$j].$row['regno']]))
					    echo $_POST[$subj_arr[$j].$row['regno']];
					else echo "";?>" class="form-control" id="<?php echo "reg_".$row['regno'];?>" />
					
					</td>
					</tr>
					<?php
					}
				   
				   ?>
				  
				   </tbody>
				   </table>
				    <label>Maximum marks</label>
				   <input type="number" name="<?php echo "max_".$subj_arr[$j].$std_arr[$j];?>" style="width:75px;" value="<?php 
					if(isset($_POST["max_".$subj_arr[$j].$std_arr[$j]]))
					    echo $_POST["max_".$subj_arr[$j].$std_arr[$j]];
					else echo "";?>" class="form-control" /><br/>
				   
				   <button name="submit" id="submit" type="submit" class="btn btn-default">Add marks</button>
				   </tr>
				   
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
					    var val1=st.options[st.selectedIndex].text;
						document.getElementById("div_"+val1).style.display="block";
						var hide_this="div_"+val1;
						function stdChanged()
						{				
					    document.getElementById(hide_this).style.display="none";
						val1=st.options[st.selectedIndex].text;
						document.getElementById("div_"+val1).style.display="block";
						hide_this="div_"+val1;
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