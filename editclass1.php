<?php

	$x=$_POST['std'];
		function succ()
	    {
	        echo"
	         <script type='text/javascript'>
	            alert('Data Inserted Succesfully!!');
	            </script>"
	            ;
	        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_editclass.php\">";
	    }
	    function fail()
	    {
	        echo"
	         <script type='text/javascript'>
	            alert('Data Not Inserted!!');
	            </script>"
	            ;
	        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_editclass.php\">";
	    }
		if(isset($_POST['submit']))
		{
		    include ('db.php');
		    $clsteach=$_POST['classteacher'];
		    @$sub=$_POST['sub_nam'];
		    @$teach=$_POST['teach_nam'];
		    $query="SELECT * from class WHERE std='$x' ";
            $result=mysqli_query($stat,$query); 
			$f=1;
			$count=count($sub);
			for($i=0;$i<$count-1;$i++)
            {
                for($j=$i+1;$j<$count;$j++)
                {   
                    if($sub[$i]==$sub[$j])
                    {
                        
                        $f=0;
                    }
                }
            }
            if($f==1)
            {
                if($count==0) 
                {
                        
                }
                else
                {
                    $flag=0;
                    for ($i=0; $i <$count ; $i++) 
                    { 
                        $x1=$sub[$i];
                        $query1="SELECT * from subject WHERE `id`= '$x1'";
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
                    $query="UPDATE class SET classteacher='$clsteach',subject='$sub1[0]',teacher='$teach[0]',subject1='$sub1[1]',teacher1='$teach[1]',subject2='$sub1[2]',teacher2='$teach[2]',subject3='$sub1[3]',teacher3='$teach[3]',subject4='$sub1[4]',teacher4='$teach[4]',subject5='$sub1[5]',teacher5='$teach[5]',subject6='$sub1[6]',teacher6='$teach[6]',subject7='$sub1[7]',teacher7='$teach[7]',subject8='$sub1[8]',teacher8='$teach[8]',subject9='$sub1[9]',teacher9='$teach[9]' WHERE std='$x'";
                    mysqli_query($stat,$query);
                   succ();
            
                }
            }

        }
        fail();
?>