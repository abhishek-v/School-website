<?php
session_start();
 if(!isset($_SESSION['name']))
	{
		header("refresh:0,url=academylogin.php");
	}
	else
	{
		$name=$_SESSION['name'];
	function succ()
    {
        echo"
         <script type='text/javascript'>
            alert('Post added successfully!');
            </script>"
            ;
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_form_dash.php\">";
    }
$title_flag=0;
$format_flag=0;
$description_flag=0;
$flag=0;
 if(isset($_POST['submit']))
 {
    define('GW_UPLOADPATH','dash/');
	require_once("db.php");
	$name=$_FILES['img']['name'];
	$title=mysqli_real_escape_string($stat,trim($_POST['title']));
    $author=$_SESSION['dash_name'];
	$file=substr($name,strrpos($name, '.')+1);
	$target=GW_UPLOADPATH.time().'.'.$file;
	$name=time().'.'.$file;
    $description=mysqli_real_escape_string($stat,trim($_POST['description']));
	if(!strcmp($title,"")==1)
	{
	   $title_flag=1;
	   $flag=1;
	}

	if(!strcmp($description,"")==1)
	{
	   $description_flag=1;
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
				}
				else
				{
					$name="";
				} 
				 
				if($format_flag!=1)
				{

				     $query="INSERT INTO dashboard(title,message,image,author,date)VALUES('$title','$description','$name','$author',now())";
	       			mysqli_query($stat,$query);
	       			succ();
				}
	
	}
 }
require_once("db.php");
$username=$_SESSION['dash_name'];
if(isset($_POST['title']))
   $title=$_POST['title'];
else
   $title="";
if(isset($_POST['description']))
   $description=$_POST['description'];
else
   $description="";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin interface</title>

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
                <a class="navbar-brand" href="admin.php">Admin's Web Interface</a>
            </div>
            <!-- Top Menu Items -->
            <?php
			require_once("admin_topmenu.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                     
			<ul class="nav navbar-nav side-nav">
                    
                <li><a href="admin.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
                 <li  class="active">
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
                    <li><a href="admin_string_generate.php"><i class="fa fa-fw fa-certificate"></i> Tokens</a></li>
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
                            Add post
                            <small></small>
                        </h1>
					   <?php
				if($flag==1)
				{?>
				<div class="alert alert-danger">
				<strong>
				The following problems were found while posting:
				</strong>
				<br/><br/>
				 
				 <?php
				  if($description_flag==1)
			  {?>
			  <li>
				  <strong>The description cannot be empty.</strong>
				  <br/>
			   </li>
			   <?php
			   }
			   ?>
			   <?php
				  if($title_flag==1)
			  {?>
			  <li>
				  <strong>The title cannot be empty.</strong>
				  <br/>
			   </li>
			   <?php
			   }
			   ?>
			   <?php
				  if($format_flag==1)
			  {?>
			  <li>
				  <strong>Invalid image format.</strong>
				  <br/>
			   </li>
			   <?php
			   }
			   ?>
			   </div>	
				 <?php
				 }
				 ?>		
					 <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
					<tbody>
					<tr>
					<td>
					<label>
					Title of the post
					</label>
					</td>
					<td>
					<input style="width:200px;" value="<?php echo $title;?>" name="title" class="form-control" maxlength='100'>
					</td>
					</tr>
                    <tr>
					<td>
					<label>
					Description
					</label>
                    </td>
					<td>
					<textarea style="width:300px;" type="text" rows='5' cols='100' maxlength='250' name="description" class="form-control"><?php echo $description;?></textarea>
					</td>
					</tr>
					 <tr>
					 <td>
					 <label>Image(not mandatory)</label>	</td>
                       <td>					 
						<input type="file" name="img">
						 </td>
						 </tr>
                   </tbody>
					
					</div>
					</table>
					 
					 <button name="submit" id="submit" type="submit" class="btn btn-lg btn-success">Post</button>	
					 <br/>
					 <br/>
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

?>