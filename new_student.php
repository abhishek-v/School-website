<?php session_start();$flag=0;$err=0;?>
<!DOCTYPE html>
<html lang="en">

	<head>
	    <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/login.css">
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
		<title>Student registration</title>
         </head>
		<body>
                 <?php
		if(isset($_POST['submit']))
		{
		    $token=trim($_POST['token']);
		    include ('db.php');
		    $query="SELECT * from strings where token='$token'";
		    $result=mysqli_query($stat,$query);
		   if(mysqli_num_rows($result)>0)
                   {
                    $flag=1;
                    $_SESSION['token']=$_POST['token'];
                    header("refresh:0,url=fill_details.php");
                   }
                   else
                   {
                       $flag=0;
                       $err=1;
                   }
		}
       if($flag==0)
        {?>
		<div class="container">
			<div class="info">
				<h1>Student registration</h1>
			</div>
		</div>
		<div class="form">
			<div class="thumbnail"><img src="student.png"/></div>
			<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
				<input maxlength="15" type="text" placeholder="Enter token here" value="<?php 
                              if(isset($_POST['token']))
                               echo $_POST['token']; 
                              else echo "";
                               ?>" name="token" type="text" required autocomplete="on">
                             
				<button name="submit">Submit token</button>
                                <p id="incor1"><?php if($err==1)
                                    echo "Invalid token! Check the characters and try again."
                                                ?></p>
                          
			</form>
		</div>
            <?php }?>
		</body>
	</head>
	
</html>		