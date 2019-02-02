<?php
	function succ()
    {
        echo"
         <script type='text/javascript'>
            alert('Data Changed Succesfully!!');
            </script>"
            ;
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_editstudent.php\">";
    }
	if(isset($_POST['submit']))
	{
	    include ('db.php');
	    define('GW_UPLOADPATH','student_image/');
	    $x=$_POST['regno'];
	    $p=$_POST['image'];
	    $stuname=trim($_POST['stuname']);
        $std=$_POST['std'];
        $address1=trim($_POST['address1']);
        $gender1=$_POST['gender1'];
        $date1=$_POST['date1'];
        $month1=$_POST['month1'];
        $year1=$_POST['year1'];
        $ft=1;
        $name1="";
        if($_FILES['img1']['name']!="")
        {
            $name1=$_FILES['img1']['name'];
            $file1=substr($name1,strrpos($name1, '.')+1);
            $target=GW_UPLOADPATH.time().'.'.$file1;
            $name1=time().'.'.$file1; 
        }
        else
        {
            $ft=0;
        }
        echo $_FILES['img1']['tmp_name'];
        $weight=trim($_POST['weight']);
        $height=trim($_POST['height']);
        $medrec=trim($_POST['medrec']);
        $bldgrp=trim($_POST['bldgrp']);
        $phno=$_POST['phno'];
		if($stuname!=""&&$address1!=""&&$weight!=""&&$height!=""&&$medrec!=""&&$bldgrp!="")
        {
                $f=1;
                if($ft==1&&$file1!="jpg"&&$file1!="jpeg"&&$file1!="png"&&$file1!="bmp")
                {
                    $f=0;
                        echo"   
                         <script type='text/javascript'>
                            alert('Invalid Image Format!');
                            </script>"
                            ;
                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_editstudent.php\">";
                }
        		else if($name1!=""&&move_uploaded_file($_FILES['img1']['tmp_name'],$target))
				{
					unlink("student_image/".$p);	
				}
				else
				{
                    $name1=$p;
				}
                if($f==1)
                {
    				$query="UPDATE `student` SET name='$stuname',std='$std',gender='$gender1',address='$address1',date='$date1',month='$month1',year='$year1',medrec='$medrec',photo='$name1',height='$height',weight='$weight',bloodgrp='$bldgrp',phno='$phno' WHERE regno='$x'";
           			mysqli_query($stat,$query);
       			    succ();
                }
        }
    }
    ?>