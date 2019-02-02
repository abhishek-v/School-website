<?php     	
    session_start();
	define('GRAPH_WIDTH',400);
	define('GRAPH_HEIGHT',400);
    if(!isset($_SESSION['stuname']))
	{
		header("refresh:0,url=index.php");
	}
	else
	{
		$name='';
    	$reg=$_SESSION['stuname'];
		require_once('db.php');
		$query="SELECT * from student WHERE regno='$reg'";
	    $result=mysqli_query($stat,$query);	
        if($rows=mysqli_fetch_array($result))
        {
			$name=$rows['name'];
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Interface</title>

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
                <a class="navbar-brand" href="student.php">Student's Web Interface</a>
            </div>
            <?php
                require_once('student_topmenu.php');
            ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="student_dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="student.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="studsubjects.php"><i class="fa fa-fw fa-book"></i> Subjects</a>
                    </li>
                    <li>
                        <a href="studtable.php"><i class="fa fa-fw fa-table"></i> Timetable</a>
                    </li>
                    <li>
                        <a href="studexamtable.php"><i class="fa fa-fw fa-calendar"></i> Exam Timetable</a>
                    </li>
                    <li>
                        <a href="studfeedback.php"><i class="fa fa-fw fa-edit"></i> Feedback</a>
                    </li>
                    <li>
                        <a href="studactivity.php"><i class="fa fa-fw fa-dashboard"></i> Activities</a>
                    </li>
                    <li class="active">
                        <a href="studmarks.php"><i class="fa fa-fw fa-bar-chart-o"></i> Marks</a>
                    </li>
                    <li>
                        <a href="studattendnce.php"><i class="fa fa-fw fa-bookmark"></i> Attendance</a>
                    </li>
                    <li>
                        <a href="studfees.php"><i class="fa fa-fw fa-money"></i> Fees</a>
                    </li>
                    <li>
                        <a href="studlibrec.php"><i class="fa fa-fw fa-file"></i> Library Records</a>
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
                            Marks
                        </h1>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    
                                    <?php
                                        require('db.php');
                                        $query="SELECT * from marks WHERE regno='$reg'";
                                        $result=mysqli_query($stat,$query); 
                                        if(mysqli_num_rows($result))
                                        {?>
                                            <tr>
                                                <td><strong>S.No</strong></td>
                                                <td><strong>Exam Name</strong></td>
                                                <td><strong>Subject</strong></td>
                                                <td><strong>Marks</strong></td>
                                                <td><strong>Maximum Marks</strong></td>
                                                <td><strong>Class Average</strong></td>
                                                <td><strong>Class Highest</strong></td>
                                            </tr>
                                            <?php
                                        }
                                        $i=1;
                                         $pos=0;
                                        $test_name=array();$marks_graph_avg=array();
                                                         $marks_graph_self=array();
                                                         $marks_graph_max=array();
                                                         $marks_graph_top=array();
                                                      $flag_quart=-1;$count_quart=0;
                                                        $flag_half=-1;$count_half=0;
                                                        $flag_ann=-1;$count_ann=0;
                                            
                                                          $ut_index=array();$ut_pos=0;
                                                       
                                        while($rows=mysqli_fetch_array($result))
                                        {   $whois_ann=0;$whois_half=0;$whois_quart=0;$whois_unit=0;
                                            $n=$rows['type'];
                                            $t=$rows['type'];
                                            if($n=='Unit tests/class tests/Other(Specify)')
                                            {
                                                $n=$rows['name'];
                                            }
                                            $na=$rows['name'];
                                            $s=$rows['subj'];
                                            $st=$rows['std'];
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $n ;?></td>
                                                <td><?php echo $rows['subj']?></td>
                                                <td><?php echo $rows['marks']?></td>
                                                <td><?php echo $rows['max']?></td>
                                                <?php
                                                    $query1="SELECT SUM(marks) AS sum from marks WHERE type='$t' and name='$na' and subj='$s' and std='$st' and marks!='Absent'";
                                                    $result1=mysqli_query($stat,$query1); 
                                                    if($rows1=mysqli_fetch_array($result1))
                                                    {
                                                        $su=$rows1['sum'];
                                                        $query2="SELECT * from marks WHERE type='$t' and name='$na' and subj='$s' and std='$st' and marks!='Absent'";
                                                        $result2=mysqli_query($stat,$query2);
                                                        $c2=mysqli_num_rows($result2);
                                                       
                                                        if($t=="Quarterly examination")
                                                          {
                                                               $whois_quart=1;
                                                             if($flag_quart<0)
                                                             {
                                                              $flag_quart=$pos;
                                                              $marks_graph_avg[$pos]=round((float)($su/$c2),2);
                                                             $temp_max=$rows['max'];
                                                              if($rows['marks']=="Absent")
                                                                   $marks_graph_self[$pos]=0;
                                                                else
                                                               $marks_graph_self[$pos]=$rows['marks'];
                                                          $marks_graph_max[$pos]=$rows['max'];
                                                           $marks_graph_self[$pos]=$marks_graph_self[$pos]/$marks_graph_max[$pos];
                                                             $marks_graph_avg[$pos]=$marks_graph_avg[$pos]/$marks_graph_max[$pos];
                                                              $test_name[$pos]=$t;
                                                              $marks_graph_top[$pos]=0;
                                                              $count_quart++;$pos++;
                                                             }
                                                              else
                                                              {  $count_quart++;
                                                                 
                                                              if($rows['marks']!="Absent")
                                                               {
                                                                 $temp_m=$rows['marks'];
                                                                    $temp_max=$rows['max'];
                                                                    $temp_m=$temp_m/$temp_max;
                                                                $temp_avg=(float)($su/$c2);
                                                                $temp_avg=$temp_avg/$temp_max;
                                                                $marks_graph_self[$flag_quart]+=$temp_m;
                                                                $marks_graph_avg[$flag_quart]+=$temp_avg;
                                                                }
                                                          $marks_graph_max[$flag_quart]+=$rows['max'];
                                                              }
                                                          }
                                                        if($t=="Half yearly examination")
                                                          {
                                                                 $whois_half=1;
                                                                    
                                                             if($flag_half<0)
                                                             {
                                                              $flag_half=$pos;
                                                              $marks_graph_avg[$pos]=round((float)($su/$c2),2);
                                                              $temp_max=$rows['max'];
                                                               if($rows['marks']=="Absent")
                                                                   $marks_graph_self[$pos]=0;
                                                                else
                                                               $marks_graph_self[$pos]=$rows['marks'];
                                                          $marks_graph_max[$pos]=$rows['max'];
                                                           $marks_graph_self[$pos]=$marks_graph_self[$pos]/$marks_graph_max[$pos];
                                                            $marks_graph_avg[$pos]=$marks_graph_avg[$pos]/$marks_graph_max[$pos];
                                                              $test_name[$pos]=$t;$marks_graph_top[$pos]=0;
                                                              $count_half++;$pos++;
                                                             }
                                                              else
                                                              {
                                                                  $count_half++;
                                                               if($rows['marks']!="Absent")
                                                                {
                                                                   $temp_avg=round((float)($su/$c2),2);
                                                                   
                                                                   $temp_m=$rows['marks'];
                                                                    $temp_max=$rows['max'];
                                                                    $temp_avg=$temp_avg/$temp_max;
                                                                    $temp_m=$temp_m/$temp_max;
                                                               $marks_graph_self[$flag_half]+=$temp_m;
                                                               $marks_graph_avg[$flag_half]+=$temp_avg;
                                                                 }
                                                          $marks_graph_max[$flag_half]+=$rows['max'];
                                                              }
                                                          }
                                                         if($t=="Annual examination")
                                                          {
                                                               $whois_ann=1;
                                                                 $temp_max=$rows['max'];
                                                             if($flag_ann<0)
                                                             {
                                                              $flag_ann=$pos;
                                                              $marks_graph_avg[$pos]=round(((float)($su/$c2)),2);
                                                                if($rows['marks']=="Absent")
                                                                   $marks_graph_self[$pos]=0;
                                                                else
                                                              $marks_graph_self[$pos]=$rows['marks'];
                                                              $marks_graph_max[$pos]=$rows['max'];
                                                              $marks_graph_self[$pos]=$marks_graph_self[$pos]/$marks_graph_max[$pos];
                                                              $test_name[$pos]=$t;
                                                              $marks_graph_avg[$pos]=$marks_graph_avg[$pos]/$marks_graph_max[$pos];
                                                              $count_ann++;$marks_graph_top[$pos]=0;
                                                              $pos++;
                                                             }
                                                              else
                                                              { 
                                                                  $count_ann++;
                                                                  
                                                               if($rows['marks']!="Absent")
                                                                 {
                                                               
                                                                 $temp_m=$rows['marks'];
                                                                 $temp_max=$rows['max'];
                                                                 $temp_m=$temp_m/$temp_max;
                                                                   $temp_avg=round((float)($su/$c2),2);
                                                                $temp_avg=$temp_avg/$temp_max;
                                                                $marks_graph_avg[$flag_ann]+=$temp_avg;
                                                               $marks_graph_self[$flag_ann]+=$temp_m;
                                                               
                                                                 }
                                                          $marks_graph_max[$flag_ann]+=$rows['max'];
                                                              }
                                                          }
                                                         if($t=="Unit tests/class tests/Other(Specify)")
                                                          {
                                                              $test_name[$pos]=$na."(".$rows['subj'].")";
                                                             
                                                          $marks_graph_avg[$pos]=(float)($su/$c2);
                                                         if($rows['marks']=="Absent")
                                                                   $marks_graph_self[$pos]=0;
                                                                else
                                                               $marks_graph_self[$pos]=$rows['marks'];       
                         
                                                          $marks_graph_max[$pos]=$rows['max'];
                                                                 $whois_unit=1;
                                                                 $ut=$pos;
                                                                    $ut_index[$ut_pos]=$ut; $ut_pos++;
                                                                  $pos++;
                                                          }
                                                        ?>
                                                        <td><?php echo number_format((float)($su/$c2), 2, '.', ''); ?></td>
                                                        <?php
                                                    }

                                                ?>
                                                <?php
                                                    $query1="SELECT MAX(marks) AS high from marks WHERE type='$t' and name='$na' and subj='$s' and std='$st' and marks!='Absent'";
                                                    $result1=mysqli_query($stat,$query1); 
                                                    if($rows1=mysqli_fetch_array($result1))
                                                    {   
                                                          if($whois_quart==1)
                                                       {
                                                           $temp_m=round((float)($rows1['high']/$temp_max),2);
                                                      $marks_graph_top[$flag_quart]+=$temp_m;
                                                        }
                                                        if($whois_half==1)
                                                       {  
                                                           $temp_m=round((float)($rows1['high']/$temp_max),2);
                                                           
                                                      $marks_graph_top[$flag_half]+=$temp_m;
                                                           
                                                        }
                                                       if($whois_ann==1)
                                                       {
                                                          $temp_m=$rows1['high']/$temp_max;
                                                      $marks_graph_top[$flag_ann]+=$temp_m;
                                                        }
                                                       if($whois_unit==1)
                                                         {
                                                           $marks_graph_top[$ut]=$rows1['high'];
                                                         }
                                                        ?>
                                                        <td><?php echo $rows1['high']; ?></td>
                                                        <?php
                                                    }

                                                ?>
                                            </tr>
                                            <?php    
                                            $i++;
                                        }
				   				
                                        if($i==1)
                                        {
                                            echo "No Records Found!!";
                                        }
                                    ?>
                      
                                </tbody>
                            </table>
           <?php if($i!=1)
            { 
                 for($k=0;$k<count($ut_index);$k++)
                 {
                     $l=$ut_index[$k];
                   $marks_graph_self[$l]=(100*$marks_graph_self[$l])/$marks_graph_max[$l];
                   $marks_graph_avg[$l]=(100*$marks_graph_avg[$l])/$marks_graph_max[$l];
                   $marks_graph_top[$l]=(100*$marks_graph_top[$l])/$marks_graph_max[$l];
                 }
                   if($flag_quart!=-1)
                   {
                           
                        $marks_graph_self[$flag_quart]=(100*$marks_graph_self[$flag_quart])/$count_quart; 
                        $marks_graph_avg[$flag_quart]=(100*$marks_graph_avg[$flag_quart])/$count_quart;
                   $marks_graph_top[$flag_quart]=(100*$marks_graph_top[$flag_quart])/$count_quart;
                   }
                    if($flag_half!=-1)
                   {
                        $marks_graph_self[$flag_half]=(100*$marks_graph_self[$flag_half])/$count_half;
                       $marks_graph_avg[$flag_half]=(100*$marks_graph_avg[$flag_half])/$count_half;
                   $marks_graph_top[$flag_half]=(100*$marks_graph_top[$flag_half])/$count_half;
                 
                   }
                   if($flag_ann!=-1)
                   {
                        $marks_graph_self[$flag_ann]=(100*$marks_graph_self[$flag_ann])/$count_ann;
                       $marks_graph_avg[$flag_ann]=(100*$marks_graph_avg[$flag_ann])/$count_ann;
                   $marks_graph_top[$flag_ann]=(100*$marks_graph_top[$flag_ann])/$count_ann;
                   }
                       ?>
                          <!--graph-->
   <div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>
   
     
      <script src="js/jquery.js"></script>
     <script src="js/highcharts.js"></script> 
<script language="JavaScript">
$(document).ready(function() {
   var title = {
      text: 'Performance graph'   
   };
   var subtitle = {
      text: ''
   };
   var xAxis = {
       title: {
         text: 'Name of the test'
      },
      categories: [
       <?php 
       for($k=0;$k<count($test_name);$k++)
       {
          echo "'".$test_name[$k]."'";
          if($k!=count($test_name))
            echo ",";
        }?>
       ]
   };
   var yAxis = {
      title: {
         text: 'Marks'
      },
      plotLines: [{
         value: 0,
         width: 1,
         color: '#808080'
      }]
   };   

   var tooltip = {
      valueSuffix: '\x25'
   }

   var legend = {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle',
      borderWidth: 0
   };
   
   var series =  [
      {
         name: 'Class average',
         data: [ <?php 
       for($k=0;$k<count($marks_graph_avg);$k++)
       {
          if($marks_graph_avg[$k]!=0)
          echo $marks_graph_avg[$k];
          else
          echo "null";
          if($k!=count($marks_graph_avg))
            echo ",";
        }?>]
      }, 
      {
         name: 'Class topper',
         data: [<?php 
       for($k=0;$k<count($marks_graph_top);$k++)
       {  
          if($marks_graph_top[$k]!=0)
          echo $marks_graph_top[$k];
          else
          echo "null";
          if($k!=count($marks_graph_top))
            echo ",";
        }?>]
      }, 
      {
         name: 'Self',
         data: [<?php 
       for($k=0;$k<count($marks_graph_self);$k++)
       {
          if($marks_graph_self[$k]!=0)
          {
          echo $marks_graph_self[$k];
          }
          else
          {
          echo "null";
          }
          if($k!=count($marks_graph_self))
            echo ",";
        }?>]
      }
   ];

   var json = {};

   json.title = title;
   json.subtitle = subtitle;
   json.xAxis = xAxis;
   json.yAxis = yAxis;
   json.tooltip = tooltip;
   json.legend = legend;
   json.series = series;
   
  $('#container').highcharts(json);
});
</script>
<!-- end of graph -->
<?php }?>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
 
    <!-- jQuery -->
  

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    
</body>
<?php 
		}
		else
		{
			header("refresh:0,url=index.php");
		}
	}?>
</html>
