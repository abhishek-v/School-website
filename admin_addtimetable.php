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
                    <li class="active">
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
        <?php
            require_once('db.php');
            $quer="SELECT * from class;";
            $resul=mysqli_query($stat,$quer);   
            while($row=mysqli_fetch_array($resul))
            {
                ?>
                <select hidden="true" id="<?php echo $row['std'] ?>" style="width: 100%; height: 35px;">
                	<option value="NONE">NONE</option>
                    <?php
                        for($i=0;$i<10;$i++)                        
                        {
                            $sub="subject";
                            if($i!=0)
                            {
                                $sub=$sub.$i;              
                            }
                            if($row[$sub]!=NULL)
                            {
	                            ?>
	                            <option value="<?php echo $row[$sub]; ?>"><?php echo $row[$sub] ; ?></option>
	                           <?php 
	                        } ?> 
                        <?php    
                        }
                    ?>
                </select>
		    <?php 
		    }
		    ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Time-Table
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    <center><p id="incor1"></p></center>
                                    <form enctype="multipart/form-data"  method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                                    <div class="form-group">
                                        <label>Standard</label>
                                        <br>

                                        <div class="field1">
                                            <div class="field-wrap">
                                                <select id="sel" class="subj form-control" name="std1" style="width: 50%; height: 40px; required="true" >
                                                    <option value="SELECT" selected>Select an option</option>
                                                    <?php
                                                    require_once("db.php");
                                                    $query="SELECT * FROM class ORDER BY std";
                                                    $result=mysqli_query($stat,$query);
                                                    while($row=mysqli_fetch_array($result))
                                                    {
                                                       ?>
                                                       <option value="<?php echo $row['std'];?>"><?php echo $row['std'];?></option>
                                                       <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <tr>
                                        <td></td>
                                        <?php
                                        for($i=0;$i<10;$i++)
                                        {
                                        ?>
                                            <td><center><b><?php echo $i+1;?></b></center></td>
                                        <?php
                                        }
                                        ?>                          
                                    </tr>
                                    <?php
                                        for($i=0;$i<6;$i++)
                                        {
                                        ?>
                                            <tr>
                                               <td id="day"><b>
                                               <?php
                                               switch($i)
                                               {
                                                    case 0:
                                                       echo "Mon";
                                                       break;
                                                    case 1:
                                                        echo "Tue";
                                                        break;
                                                    case 2:
                                                        echo "Wed";
                                                        break;
                                                    case 3:
                                                        echo "Thu";
                                                        break;
                                                    case 4:
                                                        echo "Fri";
                                                        break;  
                                                    case 5:
                                                        echo "Sat";
                                                        break;
                                                }
                                                ?>
                                                </b></td>
                                                <?php
                                                for($j=0;$j<10;$j++)
                                                {
                                                ?>
                                                    <td>
                                                       <select class="tab" style="width:85px;" id="<?php echo "select".$i.$j;?>" name="<?php echo "select".$i.$j;?>"></select>
                                                    </td>
                                                    <?php
                                                }
                                            ?>
                                        <?php
                                        }
                                    ?>
                                </table>
                                <tr>
                                    <td colspan="3"><button style="width:10%;" class="btn btn-success" name="submit" type="submit">Submit</button></td>
                                </tr>
                                </form>
                                <?php
                                    if(isset($_POST['submit']))
                                    {
                                         if($_POST['std1']=="SELECT")
                                         {
                                            ?><script>alert("Please select a class!");</script><?php
                                         }
                                         else
                                         {
                                            require_once("db.php");
                                            $query="SELECT * FROM timetable WHERE std='".$_POST['std1']."'";
                                            $result=mysqli_query($stat,$query);
                                            if(mysqli_num_rows($result)!=0)
                                            {
                                                  ?><script> alert("Timetable already exists for this class.");</script>
                                                  <?php
                                            }         
                                            else
                                            {
                                               $val=array();
                                               $day="";
                                               $j=0;
                                               $std=$_POST['std1'];
                                               for($i=0;$i<6;$i++)
                                               {
                                                 $k=0;
                                                 for($j=0;$j<10;$j++)
                                                 {
                                                     $val[$k]=$_POST['select'.$i.$j];
                                                     $k++;
                                                 }
                                                 switch($i)
                                                 {
                                                       case 0:
                                                           $day="Monday";
                                                           break;
                                                       case 1:
                                                           $day="Tuesday";
                                                           break;
                                                        case 2:
                                                           $day="Wednesday";
                                                           break;
                                                        case 3:
                                                           $day="Thursday";
                                                           break;
                                                        case 4:
                                                           $day="Friday";
                                                           break;  
                                                         case 5:
                                                           $day="Saturday";
                                                           break;
                                                 }
                                                 $query="INSERT INTO timetable VALUES(NULL,'$std','$day','$val[0]','$val[1]','$val[2]','$val[3]','$val[4]','$val[5]','$val[6]','$val[7]','$val[8]','$val[9]')";
                                                 mysqli_query($stat,$query);
                                               }     
                                                ?>
                                                  <script> alert("Timetable has been added for class <?php echo $_POST['std1'];?>");</script>
                                                  <?php
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
    <script type="text/javascript" src="jQuery.login.js"></script>
    <script src="table.js"></script>
</body>
<?php 
    }		
	?>
</html>
