<?php
    
    function succ()
    {
        echo"
         <script type='text/javascript'>
            alert('Timetable Changed Succesfully!!');
            </script>"
            ;
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_edittimetable.php\">";
    }
    if(isset($_POST['submit']))
    {
        $std=$_POST['std'];    
        require_once("db.php");
        $val=array();
        $day="";
        $j=0;
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
            $query="UPDATE timetable SET period1='$val[0]',period2='$val[1]',period3='$val[2]',period4='$val[3]',period5='$val[4]',period6='$val[5]',period7='$val[6]',period8='$val[7]',period9='$val[8]',period10='$val[9]' WHERE std='$std' and day='$day' ";
            mysqli_query($stat,$query);
            
        }   
        succ();  
    }
?>