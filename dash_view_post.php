<?php
session_start();

if(isset($_SESSION['dash_name']))
{
   if($_GET['id'])
   {
       require_once("db.php");
       $check="SELECT * FROM dashboard WHERE author='".$_SESSION['dash_name']."' && id='".$_GET['id']."'";
	   $result=mysqli_query($stat,$check);
	   if(mysqli_num_rows($result)==0)
	      header("refresh:0;url=dash_view.php");
$username=$_SESSION['dash_name'];
$rows=mysqli_fetch_array($result);
$p=$rows['image'];

$title=$rows['title'];
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
                <a class="navbar-brand" href="form_dash.php">Dashboard interface</a>
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
				
				
                   
			         
                        
					<div class="col-lg-12">
					<h1 class="page-header">
                            View post
                            <small></small>
                        </h1>
					  
			   </div>			
                            </div>
			
				<div class="alert alert-info">
				<strong>
				You can edit the post via the "Edit posts" menu.
				</strong> 
                                </div>
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
					<?php echo $title;?>
					</td>
					</tr>
                    <tr>
					<td>
					<label>
					Description
					</label>
                    </td>
					<td>
					<?php echo $description;?>
					</td>
					</tr>
					<?php if($photo!="")
					{?>
					 <tr>
					 <td>
					 <label>Image</label>	</td>
                       <td>					 
						 <img width="20%" src="dash/<?php echo $photo; ?>">
                                           
						 </td>
						 </tr>
					<?php }?>
                   </tbody>
					
					</div>
					</table>
					 
					 <br/>
					 
				    </div>
					
 
                    <button onclick="location.href='dash_view.php'" class="btn btn-lg btn-default">Go back</button>			   
                </div>
                <!-- /.row -->
              
						
            </div>
			
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 
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
    header("refresh:0,url=dash_view.php");

}
}
else
{
     header("refresh:0,url=dash_login.php");

}
?>