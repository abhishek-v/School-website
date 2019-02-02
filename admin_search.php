<?php     	
    session_start();
    if(!isset($_SESSION['name']))
	{
		header("refresh:0,url=academylogin.php");
	}
	else
	{
		$name=$_SESSION['name'];
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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Student search
                            <small></small>
                        </h1>
                    </div>
					<div class="col-lg-9">
					<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
					<h4 style="display:inline;">Search by:</h4>
					<div class="form-group" style="display:inline;">
					<label class="radio-inline">
					<input type="radio" name="filter" value="name" 
					<?php
					if(isset($_POST['filter']))
					{
					  if(!strcmp($_POST['filter'],"name"))
					  {
					    echo " checked";
					  }
					}
					else
					   echo "checked";?>
					>Name
                    </label>
					<label class="radio-inline">
					<input type="radio" name="filter" value="regno"
					<?php
					if(isset($_POST['filter']))
					{
					  if(!strcmp($_POST['filter'],"regno"))
					  {
					    echo " checked";
					  }
					}?>
					>Register number
					</label>
					</div>
					<br/>
					<br/>
					<h4 style="display:inline;">Select standard: </h4>
					<select id="std" name="std" style="display:inline;width:100px;" class="form-control" id="std">
                    <option>ALL</option>
                    <option>LKG</option>
                    <option>UKG</option>
					<?php
					for($l=1;$l<=12;$l++)
					{?>
					<option><?php echo $l; ?></option>
					<?php
					}
					?>
                    </select>
            <?php if(isset($_POST['std']))
					{?>
					<script type="text/javascript">
            document.getElementById('std').value = "<?php echo $_POST['std'];?>";
             </script>					
			 <?php }?>
                 <br/><br/>					
					<input type="text"  maxlength='16' style="display:inline;width:250px;" name="search" class="form-control" value="<?php 
					if(isset($_POST["search"]))
					    echo $_POST["search"];
					else echo "";?>">
				<button type="submit" name="submit" style="display:inline;" class="btn btn-primary">Search</button>
		   <br/>
		   				</form>
			<div id="results">
			<br/>
			<br/>
			<?php
			if(isset($_POST['submit']))
			{
			   require_once("db.php");
			   $filter=$_POST['filter'];
			   $std=$_POST['std'];
			   if(strcmp(trim($_POST['search']),""))
			   {
			   if(!strcmp($std,"ALL"))
			   {
			   if(!strcmp($filter,"name"))
			   $query="SELECT * FROM student WHERE name LIKE '".$_POST['search']."%'";
			   if(!strcmp($filter,"regno"))
			   $query="SELECT * FROM student WHERE regno LIKE '".$_POST['search']."%'";
			   }
			   else
			   {
			    if(!strcmp($filter,"name"))
			   $query="SELECT * FROM student WHERE name LIKE '".$_POST['search']."%' && std LIKE '".$std."_'";
			     if(!strcmp($filter,"regno"))
				$query="SELECT * FROM student WHERE regno LIKE '".$_POST['search']."%' && std LIKE '".$std."_'";
			   }
			   $result=mysqli_query($stat,$query);
			   if(mysqli_num_rows($result)>0)
			   {?>
			   <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">	 
				 <thead>
                         <tr>
       <th  colspan="3"><h4>Results</h4></th>
                         </tr>
                 </thead>
				 <tbody>
				 <tr>
				 <td><b>Class</b></td>
				 <td><b>Name</b></td>
				 <td><b>Register number</b></td>
				 <?php
			   while($row=mysqli_fetch_array($result))
			   {
			  ?>   
			  <tr>
			  <td>
			  <?php echo $row['std'];?>
			  </td>
			  <td>
			  <a href="liststudent.php?reg=<?php echo $row['regno'];?>"><?php echo $row['name'];?></a>
			  </td>
			  <td>
			  <a href="liststudent.php?reg=<?php echo $row['regno'];?>"><?php echo $row['regno'];?></a>
			  </td>
			   <?php
			   }
			   }
			   else
			   {
			   ?>
			   <div>
			    <b><?php echo "No results found.";?></b>
			   </div>
			   <?php
			}
			}
			}
			?>
			<div>
					</div>
					
					 
                </div>
            </div>
            <!-- /.container-fluid -->
            <?php
			if(isset($_POST['name']))
			{?>
			<script type="text/javascript">
            document.getElementById('name').value = "<?php echo $_POST['name'];?>;
             </script>	
		   <?php }?>
        </div>
        <!-- /#page-wrapper -->

    </div>
	</div>
	</div>
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
		
	}?>
</html>
