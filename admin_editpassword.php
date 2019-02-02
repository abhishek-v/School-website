<?php       
    session_start();
    if(!isset($_SESSION['name']))
    {
        header("refresh:0,url=academylogin.php");
    }
    else
    {
                function wrong()
                {
                    ?>
                    <script >
                    document.getElementById("incor1").innerHTML="Old passwords do not match!";
                    </script>
                    <?php
                }
                function empt()
                {
                    ?>
                    <script >
                    document.getElementById("incor1").innerHTML="Password cannot be empty!";
                    </script>
                    <?php
                }
                function wrong1()
                {
                    ?>
                    <script >
                    document.getElementById("incor1").innerHTML="Password do not match!";
                    </script>
                    <?php
                }
                 function wrong2()
                {
                    ?>
                    <script >
                    document.getElementById("incor1").innerHTML="Passwords should be more than 6 characters!!";
                    </script>
                    <?php
                }
                function wrong3()
                {
                    ?>
                    <script >
                    document.getElementById("incor1").innerHTML="Passwords should be less than 16 characters!!";
                    </script>
                    <?php
                }
        $name=$_SESSION['name'];
        $curpass=$pass=$repass="";
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
                            Change Password
                        </h1>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                                        <tr>
                                            <td><b>Current Password:</b></td>
                                            <td><input style="width:200px;" class="form-control" type="password" name="curpass" value="<?php echo $curpass; ?>" maxlength='16' class="log" /></td>
                                        </tr>
                                        <tr>
                                            <td><b>New Password:</b></td>
                                            <td><input style="width:200px;" class="form-control" type="password" name="pass" value="<?php echo $pass; ?>" maxlength='16' class="log"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Retype-New Password:</b></td>
                                            <td><input style="width:200px;" class="form-control" type="password" name="repass" value="<?php echo $repass; ?>" maxlength='16' class="log"></td>
                                        </tr>
                                        </table>
                                        <button style="width:10%" type="submit" name='submit' class="btn btn-danger">Change</button>

                                        
                                    </form>
                                    <center><p id="incor1"></p></center>
                            <?php  
                            if(isset($_POST['submit']))
                            {
                                    $flag=0;
                                    $name='admin';
                                    require_once('db.php');
                                    $query="SELECT * from adminlog;";
                                    $result=mysqli_query($stat,$query);
                                    $curpass=$_POST['curpass'];
                                    $pass=$_POST['pass'];
                                    $repass=$_POST['repass'];
                                    if($curpass==""||$pass==""||$repass=="")
                                    {
                                        empt();
                                    }
                                    else if($pass!=$repass)
                                    {
                                        wrong1();   
                                    }
                                    else if($row=mysqli_fetch_array($result))
                                    {
                                        if(!strcasecmp($name,$row['username']))
                                        {
                                          if(crypt($curpass,$row['pass'])==$row['pass'])
                                          {  
                                            $flag=1;
                                            if(strlen($pass)<6)
                                            {
                                                wrong2();
                                            }
                                            else if(strlen($pass)>16)
                                            {
                                                 wrong3();
                                            }
                                            else
                                            {
                                                
                                                $blowfish_salt=bin2hex(openssl_random_pseudo_bytes(22));
                                                $hash=crypt($pass,"$2a$12$".$blowfish_salt);
                                                $query="UPDATE `adminlog` SET `pass`= '$hash'";    
                                                $result=mysqli_query($stat,$query);
                                                echo "
                                                    <script >
                                                    alert('Password Changed!!');
                                                    </script>
                                                ";
                                                echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_editpassword.php\">";
                                             }
                                          }
                                          else 
                                          {
                                            wrong();
                                          }
                                        }
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
    <script src="jquery-1.12.0.min.js"></script>
    <script src="jquery-migrate-1.2.1.min.js"></script>
    <script src="menu.js"></script>
    <script src="subject1.js"></script>
    <script type="text/javascript" src="jQuery.login.js"></script>

</body>
<?php 
    }       
    ?>
</html>
