<?php     	
    session_start();
    if(!isset($_SESSION['name']))
	{
		header("refresh:0,url=academylogin.php");
	}
	else
	{
        function succ()
       {
        echo"
          <script type='text/javascript'>
                alert('Data Inserted Succesfully!!');
                </script>"
                ;
               echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_addclass.php\">";
       }
		$name=$_SESSION['name'];
        $standard=$section=$std=$std1=$sec=$sub=$teach="";
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
                            Add Class
                        </h1>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-7">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    <center><p id="incor1"></p></center>
                                    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                                    <tr>
                                        <td><strong>Standard:</strong></td>
                                        <td>
                                      <select name="standard" class="form-control" style="width: 50%; height: 30px; font-size:22; font-style: calibri" required="true">
                                       <option value="LKG">LKG</option>
                                        <option value="UKG">UKG</option>
                                         <?php
                                           for($i=1;$i<=12;$i++)
                                            {?>
                                             <option value="<?php echo $i;?>"><?php echo $i;?>
                                             <?php }?>  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Section:</strong></td>
                                        <td><input  name="section" class="form-control" style="width:50%" type="text" required autocomplete="off" value="<?php echo $section; ?>"></td>
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
                                                        while($rows=mysqli_fetch_array($result))
                                                        {
                                                            ?>  <option value="<?php echo $rows['username']; ?>"><?php echo $rows['name'] ; ?></option>
                                                            
                                                        <?php    
                                                        }
                                                    ?>
                                            </select>
                                    <?php } ?>
                                    <tr>
                                        <td><strong>Class Teacher</strong></td>
                                        <td>
                                            <select name="classteach_name" class="form-control" style="width: 50%; height: 30px; font-size:22; font-style: calibri" required="true">
                                                <?php
                                                    require_once('db.php');
                                                    $query="SELECT * from teacher";
                                                    $result=mysqli_query($stat,$query); 
                                                    while($rows=mysqli_fetch_array($result))
                                                    {
                                                        ?>  <option value="<?php echo $rows['username']; ?>"><?php echo $rows['name']; ?></option>
                                                        
                                                    <?php    
                                                    }
                                                ?>
                                            </select>
                                            
                                            </td>
                                    </tr>
                                        
                                        <?php
                                            for($i=0;$i<10;$i++)
                                            {
                                                ?>
                                                
                                                <tr>
                                                    <td><b>Subject <?php echo $i+1 ?></b></td>
                                                    <td> 
                                                        <div class="field1">
                                                            <div class="field-wrap">
                                                                <select name="sub_name[]" class="subj form-control" id="firstsub" style="width: 45%;  float: left; font-style: calibri">
                                                                <option disabled selected>select an option</option>
                                                                    <?php
                                                                        require_once('db.php');
                                                                        $query="SELECT * from subject ORDER BY name";
                                                                        $result=mysqli_query($stat,$query); 
                                                                        while($rows=mysqli_fetch_array($result))
                                                                        {
                                                                            ?>  <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                                                                        <?php    
                                                                        }
                                                                        
                                                                        ?>
                                                                </select>
                                                                <select name="teach_name[]" class="teach form-control" style="width: 45%; margin-left: 5%;  float: left; font-style: calibri">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               
                                            <?php
                                            }
                                            ?>        
                                           
                                </tbody>
                            </table>
                            
                                <button name="submit3" class="btn btn-success" >Submit</button>
                                <?php  
                                    if(isset($_POST['submit3']))
                                    {
                                        include ('db.php');
                                        $std1=trim($_POST['standard']);
                                        $sec=trim($_POST['section']);
                                        $std=$std1."".$sec;
                                        $clsteach=trim($_POST['classteach_name']);
                                        $query="SELECT * from class WHERE std='$std' ";
                                        $result=mysqli_query($stat,$query); 
                                        @$sub=$_POST['sub_name'];
                                        @$teach=$_POST['teach_name'];
                                        $f=1;
                                        $count=count($sub);
                                        for($i=0;$i<$count-1;$i++)
                                        {
                                            for($j=$i+1;$j<$count;$j++)
                                            {   
                                                if($sub[$i]==$sub[$j])
                                                {
                                                    ?>
                                                    <script>
                                                        document.getElementById("incor1").innerHTML="Enter unique subjects!!!";
                                                    </script>
                                                    <?php 
                                                    $f=0;
                                                }
                                            }
                                        }
                                        if($f==1)
                                        {
                                            if(mysqli_num_rows($result)!=0) 
                                            {
                                                    ?>
                                                    <script>
                                                    document.getElementById("incor1").innerHTML="Section Already Exist!!!";
                                                    </script>
                                                    <?php 
                                            }
                                            else if($count==0) 
                                            {
                                                    ?>
                                                    <script>
                                                    document.getElementById("incor1").innerHTML="Please select atleast 1 subject!";
                                                    </script>
                                                    <?php 
                                            }
                                            else
                                            {

                                                $flag=0;
                                                for ($i=0; $i <$count ; $i++) 
                                                { 
                                                    $x=$sub[$i];
                                                    $query1="SELECT * from subject WHERE `id`= '$x'";
                                                    $result1=mysqli_query($stat,$query1);
                                                    if($rows1=mysqli_fetch_array($result1))
                                                    {
                                                        $sub1[$i]=$rows1['name'];
                                                    }
                                                }
                                                for ($i=0; $i < 10; $i++) 
                                                { 
                                                    if($i>=$count)
                                                    {
                                                        $sub1[$i]=NULL;
                                                        $teach[$i]=NULL;
                                                    }
                                                }
                                                
                                                $query="INSERT INTO class VALUES (NULL, '$std','$clsteach','$sub1[0]','$teach[0]','$sub1[1]','$teach[1]','$sub1[2]','$teach[2]','$sub1[3]','$teach[3]','$sub1[4]','$teach[4]','$sub1[5]','$teach[5]','$sub1[6]','$teach[6]','$sub1[7]','$teach[7]','$sub1[8]','$teach[8]','$sub1[9]','$teach[9]')";
                                                mysqli_query($stat,$query);
                                               succ();
                                        
                                            }
                                        }
                                    }
                                ?>
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
		
	}?>
</html>
