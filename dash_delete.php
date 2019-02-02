<?php
session_start();

if(isset($_SESSION['dash_name']))
{
$flag=0;
$err=0;
 if(isset($_POST['submit']))
 {
     if(isset($_POST['post']))
     {
          require_once("db.php");
         $id=$_POST['post'];
         $query="SELECT * FROM dashboard WHERE id='$id'";
  
            $result=mysqli_query($stat,$query);
         $row=mysqli_fetch_array($result);
         if($row['image']!="")
            unlink("dash/".$row['image']);
         $query="DELETE FROM dashboard WHERE id='$id'";

         mysqli_query($stat,$query);
         $flag=1;
     }
     else
      {
        $err=1;
      }
  }
require_once("db.php");
$username=$_SESSION['dash_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Delete posts</title>

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
                <a class="navbar-brand" href="form_dash.php">Dashboard Interface</a>
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
				
				<form enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                   
			         
                        
					<div class="col-lg-12">
					<h1 class="page-header">
                            Delete posts
                            <small></small>
                        </h1>
						<?php
                          if($err==1)
                            {?>
                                  <div class="alert alert-danger">
				<strong>
				You need to choose a post to delete it.
				</strong>
                                    </div>
                          <?php }
			   ?>	
                           <?php
                          if($flag==1)
                            {?>
                                  <div class="alert alert-success">
				<strong>
				You have successfully deleted the post.
				</strong>
                                    </div>
                          <?php }
			   ?>	
				<div class="alert alert-info">
				<strong>
			       Use the "View posts" menu to check the post which you want to remove before clicking the DELETE button.
				</strong>
                                    </div>
			   
					 <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
					<tbody>
					<tr>
					<td>
					#
					</td>
					<td>
					Title of the post
					</td>
					<td>
		            Date posted
					</td>
					</tr>
					<?php
					$query="SELECT * FROM dashboard WHERE author='".$_SESSION['dash_name']."'";
					$result=mysqli_query($stat,$query);
					while($row=mysqli_fetch_array($result))
					{?>
                    <tr>
					<td>
					 
                                    <input type="radio" name="post" value="<?php echo $row['id'];?>">
                          
					</td>
					<td>
					<?php echo $row['title'];?>
					</td>
					<td>
					<?php echo $row['date'];?>
					</td>
					</tr>
					<?php } ?>
                   </tbody>
					
					</div>
					</table>
					 
					 <button  onclick="return confirm('Do you really want to delete this post?');" name="submit" id="submit" type="submit" class="btn btn-lg btn-danger">DELETE</button>	
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
else
{
     header("refresh:0,url=dash_login.php");

}
?>