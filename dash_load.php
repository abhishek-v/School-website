<?php
session_start();
	function succ()
    {
        echo"
         <script type='text/javascript'>
            alert('Post edited successfully!');
            </script>"
            ;
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=dash_edit.php\">";
    }

if(isset($_SESSION['dash_name']))
{
   if($_GET['id'])
   {
       require_once("db.php");
       $check="SELECT * FROM dashboard WHERE author='".$_SESSION['dash_name']."' && id='".$_GET['id']."'";
	   $result=mysqli_query($stat,$check);
	   if(mysqli_num_rows($result)==0)
	      header("refresh:0;url=dash_edit.php");
$title_flag=0;
$format_flag=0;
$description_flag=0;
$flag=0;
 if(isset($_POST['submit']))
 {
    $p=$_POST['image'];
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
                                      if($p!="")
				     unlink("dash/".$p);
					 $format_flag=0;
				}
				else
				{
                                    if(isset($_POST['remove']))
				{
                                       if($p!="")
					  unlink("dash/".$p);
                                       $name="";
				} 
                                     else
					$name=$p;
				} 
				 
				if($format_flag!=1)
				{

				     $query="UPDATE dashboard SET title='$title',message='$description',image='$name' WHERE id='".$_GET['id']."'";
	       			mysqli_query($stat,$query);
                                succ();
				}
	
	}
 }

$username=$_SESSION['dash_name'];
$rows=mysqli_fetch_array($result);
$p=$rows['image'];
if(isset($_POST['title']))
   $title=$_POST['title'];
else
   $title=$rows['title'];
if(isset($_POST['description']))
   $description=$_POST['description'];
else
   $description=$rows['message'];
$photo=$rows['image'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update dashboard</title>

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
                <a class="navbar-brand" href="form_dash.php">Update dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <?php
			require_once("dash_navbar.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
				
                    
                   <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-bar-chart-o"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
					
                            <li>
                                <a href="form_dash.php"><i class="fa fa-fw fa-plus fa-fw"></i>Add posts</a>
                            </li>
                            <li>
                                <a href="dash_edit.php"><i class="fa fa-fw fa-edit fa-fw"></i>Edit posts</a>
                            </li>
							<li>
                                <a href="dash_delete.php"><i class="fa fa-fw fa-minus fa-fw"></i>Delete posts</a>
                            </li>
                            	     <li>
                                <a href="dash_view.php"><i class="fa fa-fw fa-table fa-fw"></i> View posts</a>
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
				
				<form enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF'])."?id=".$_GET['id']; ?>">
                   
			         
                        
					<div class="col-lg-12">
					<h1 class="page-header">
                            Edit post
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
                    <input type="hidden" value="<?php echo $photo;?>" name="image">				 
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
					<input style="width:200px;" value="<?php echo $title;?>" name="title" value="<?php echo $title;?>" class="form-control" maxlength='100'>
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
					<?php if($photo!="")
					{?>
					 <tr>
					 <td>
					 <label>Current image</label>	</td>
                       <td>					 
						 <img width="20%" src="dash/<?php echo $photo; ?>">
                                                <input type="checkbox" name="remove" value="remove">Remove this image
						 </td>
						 </tr>
					<?php }?>
					 <tr>
					 <td>
					 <label>Change image</label></td>
                       <td>			 
						<input type="file" name="img">
						 </td>
						 </tr>
                   </tbody>
					
					</div>
					</table>
					 
					 <button name="submit" id="submit" type="submit" class="btn btn-lg btn-warning">Edit post</button>	
					 <br/>
					 <br/>
				    </div>
					
               </form>	
                    <button onclick="location.href='dash_edit.php'" class="btn btn-lg btn-default">Cancel</button>			   
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
else{
    header("refresh:0,url=dash_edit.php");

}
}
else
{
     header("refresh:0,url=dash_login.php");

}
?>