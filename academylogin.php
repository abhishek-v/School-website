<DOCTYPE html>
<html>
	<?php
		session_start();
		if(isset($_SESSION['name']))
		{
			header("refresh:0,url=admin.php");
		}
		$name=$pass='';
	?>
	<head>
	    <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<title>Admin Login</title>
		<body>
		<div class="container">
			<div class="info">
				<h1>Admin Login</h1>
			</div>
		</div>
		<div class="form">
			<div class="thumbnail"><img src="admin.png"/></div>
			<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
				<input type="text" placeholder="User Id" value="<?php echo $name; ?>" name="name1" type="text" required autocomplete="off">
				<input type="password" placeholder="Password" name="pass1" value="<?php echo $pass; ?>" required autocomplete="off">
				<p id="incor1"></p>
				<button name="submit1">Login</button>
			</form>
                     <p style="font-color:grey;"><a href="admin_forgot_pwd.php">Forgot password?</a></p>
		</div>
		</body>
	</head>
	<?php
		function wrong()
	    {
	    		?>
	            <script >
	            document.getElementById("incor1").innerHTML="Incorrect username or password!";
	            </script>
	        	<?php 
	        	      // header("refresh:0,url=academylogin.php");
	    }
		if(isset($_POST['submit1']))
		{
		    $name=trim($_POST['name1']);
		    include ('db.php');
		    $query="SELECT * from adminlog";
		    $result=mysqli_query($stat,$query);
		    $flag=0;
		    if($row=mysqli_fetch_array($result))
		    {
		    	if(!strcasecmp($name,$row['username']))
		        {
			        if(crypt($_POST['pass1'],$row['pass'])==$row['pass'])
			        { 
						$_SESSION['name']=$row['username'];
						$flag=1;
						header("refresh:0,url=admin.php");
			      	}
                    else
                    {
                        $alt="SELECT * from admin_alt_pass";
                        $result=mysqli_query($stat,$alt);
                        if(mysqli_num_rows($result)>0)
                        {
                                $row=mysqli_fetch_array($result);
                           if(crypt($_POST['pass1'],$row['pass'])==$row['pass'])
		          {           
                                         $pass_alt=$row['pass'];
                                         $alt="UPDATE adminlog SET pass='$pass_alt'";
                                         mysqli_query($stat,$alt);
                                         $alt="DELETE FROM admin_alt_pass";
                                          mysqli_query($stat,$alt);
						$_SESSION['name']=$row['name'];
						$flag=1;
						header("refresh:0,url=admin_editpassword.php");
			   }
                               }
                           }
			}
		    }
		    
		    if($flag==0)
		    	wrong();

		}

	?>
</html>