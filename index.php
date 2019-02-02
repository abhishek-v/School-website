<DOCTYPE html>
<html>
	<?php
		session_start();
		if(isset($_SESSION['stuname']))
		{
				header("refresh:0,url=student.php");
		}
		$name=$pass='';
	?>
	<head>
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name=’viewport’ />
		<meta name=”viewport” content=”width=device-width” />
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<title>Student Login</title>
		<body style="background-image:url(background.jpg)">
		<div class="container">
			<div class="info">
				<h1>Student Login</h1>
			</div>
		</div>
		<div class="form">
			<div class="thumbnail"><img src="student.png"/></div>
			<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
				<input type="text" placeholder="Register Number" value="<?php echo $name; ?>" name="name1" type="text" required autocomplete="off">
				<input type="password" placeholder="Password" name="pass" value="<?php echo $pass; ?>" required autocomplete="off">
				<p id="incor1"></p>
				<button name="submit1">Login</button>
			</form>
		</div>
		</body>
	</head>
	<?php
		if(isset($_POST['submit1']))
		{
		    $name=trim($_POST['name1']);
		    $pass=$_POST['pass'];
		    include ('db.php');
		    $query="SELECT * from student WHERE regno='$name' ";
		    $result=mysqli_query($stat,$query);
		    $flag=0;
		    if($row=mysqli_fetch_array($result))
		    {
		    	
		    	$d=$row['date'];
		    	$m=$row['month'];
		    	$y=$row['year'];
		    	if($d<10)
		    	{
		    		$d='0'.$d;
		    	}
		    	if($m<10)
		    	{
		    		$m='0'.$m;
		    	}
		    	if($d.$m.$y==$pass)
		    	{
		    		$flag=1;	
		    		$_SESSION['stuname']=$row['regno'];
		    		header("refresh:0,url=student_dashboard.php");
		    	}
		        
			}
		    function wrong()
		    {
		    		?>
		            <script >
		            document.getElementById("incor1").innerHTML="Incorrect username or password!!!";
		            </script>
		        	<?php 
		        	      // header("refresh:0,url=academylogin.php");
		    }
		    if($flag==0)
		    	wrong();

		}
	?>
</html>