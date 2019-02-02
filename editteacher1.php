<?php
	function succ()
    {
        echo"
         <script type='text/javascript'>
            alert('Data Inserted Succesfully!!');
            </script>"
            ;
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_editteacher.php\">";
    }
	if(isset($_POST['submit']))
	{
	    include ('db.php');
	    define('GW_UPLOADPATH','image/');
	    $x=trim($_POST['usname']);
	    $p=$_POST['image'];
	    $tname=trim($_POST['teachname']);
	    $add=trim($_POST['address']);
	    $qual=trim($_POST['qual']);
	    $des=trim($_POST['des']);
		$name=$_FILES['img']['name'];
		$file=substr($name,strrpos($name, '.')+1);
		$target=GW_UPLOADPATH.time().'.'.$file;
		$name=time().'.'.$file; 
		$contact=trim($_POST['contact']);
		$sub=$_POST['field_name'];
		$f=1;
		$count=count($sub);
		for($i=0;$i<$count-1;$i++)
		{
			for($j=$i+1;$j<$count;$j++)
			{	
				if($sub[$i]==$sub[$j]&&$sub[$i]!='NULL')
				{
					echo"

		            <script>
		            	document.getElementById('incor1').innerHTML='Enter unique subjects!!!';
		            </script>";
		        	$f=0;
				}
			}
		}
		for ($i=0; $i <5 ; $i++) 
		{ 
			if($sub[$i]=="NULL")
				$sub[$i]=NULL;
		}
		if($f==1)
		{
			    $flag=0;
			    if(!empty($_FILES['img']['name'])&&$file!="jpg"&&$file!="jpeg"&&$file!="png"&&$file!="bmp"&&$file!="JPG"&&$file!="JPEG"&&$file!="PNG"&&$file!="BMP")
                {
                    echo"   
                         <script type='text/javascript'>
                            alert('Invalid Image Format!');
                            </script>"
                            ;
                            $flag=1;
                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_editteacher.php\">";
                }
        		else if(isset($name)&&!empty($name)&&move_uploaded_file($_FILES['img']['tmp_name'],$target))
				{
					unlink("image/".$p);	
				}
				else
				{
					$name=$p;
				}
				if($flag!=1)
				{
					$query="UPDATE `teacher` SET name='$tname',address='$add',qualification='$qual',designation='$des',photo='$name',subject1='$sub[0]',subject2='$sub[1]',subject3='$sub[2]',subject4='$sub[3]',subject5='$sub[4]',contactno='$contact' WHERE username='$x'";
	       			mysqli_query($stat,$query);
	       			succ();
	       		}
		}
	}
	


?>