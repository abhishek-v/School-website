<DOCTYPE html>
<html>
	<?php
		session_start();
		if(isset($_SESSION['t_name']))
		{
			header("refresh:0,url=t_index.php");
		}
		$name=$pass='';
	?>
	<head>
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name=’viewport’ />
		<meta name=”viewport” content=”width=device-width” />
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<title>Teacher Login</title>
		<body>
		<div class="container">
			<div class="info">
				<h1>Teacher Login</h1>
			</div>
		</div>
		<div class="form">
			<div class="thumbnail"><img src="teacher.jpg"/></div>
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
				<input type="text" placeholder="User Id" value="<?php echo $name; ?>" name="name2" type="text" required autocomplete="off">
				<input type="password" placeholder="Password" name="pass2" value="<?php echo $pass; ?>" required autocomplete="off">
				<p id="incor1"></p>
				<button name="submit2">Login</button>
                                   <p style="font-color:grey;"><a href="teacher_forgot_pwd.php">Forgot password?</a></p>
			</form>
		</div>
		</body>
	</head>
	<?php

	    function wrong1()
	    {
    		?>
            <script >
            document.getElementById("incor1").innerHTML="Incorrect username or password!!!";
            </script>
        	<?php 
	    }
		if(isset($_POST['submit2']))
		{
		   require_once('db.php');  
		    $name=mysqli_real_escape_string($stat,trim($_POST['name2']));
			
			$query="SELECT * from teacher";
			$result=mysqli_query($stat,$query);
			$flag=0;
		    while($row=mysqli_fetch_array($result))
		    {
		    	if(!strcasecmp($name,$row['username']))
		        {
					if(crypt($_POST['pass2'],$row['pass'])==$row['pass'])
					{ 
					 	$_SESSION['t_name']=$row['username'];
                        mysqli_close($stat);
						header("refresh:0,url=t_dashboard.php");
						$flag=1;
					}
                    else
                    {
                        $alt_name=$row['username'];
                        $alt="SELECT pass from teacher_alt_pass WHERE user='$alt_name'";
                        $result=mysqli_query($stat,$alt);
                        if(mysqli_num_rows($result)>0)
                        {
                            $row=mysqli_fetch_array($result);
                            if(crypt($_POST['pass2'],$row['pass'])==$row['pass'])
		     	     		{ 
                                $alt="DELETE FROM teacher_alt_pass WHERE user='$alt_name'";
                                mysqli_query($stat,$alt);
								$_SESSION['t_name']=$name;
								$flag=1;mysqli_close($stat);
								header("refresh:0,url=t_edit_pass.php");
			   				}
                        }
                    }
				}
		    }
			 if($flag==0)
		    	wrong1();
		}

	?>
</html>