<DOCTYPE html>
<html>
	<?php
		session_start();
                $flag=0;$error=0;
		if(isset($_SESSION['dash_name']))
		{
			header("refresh:0,url=form_dash.php");
		}
              if(isset($_POST['submit']))
              {
                    $captcha=$_POST['captcha'];
                    if(sha1($captcha)==$_SESSION['dash_pass_phrase'])
                    {
                         $flag=1;
                         $length=10;
                $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
                         require_once("db.php");
                         $query="DELETE FROM dash_alt_pass";
                         mysqli_query($stat,$query);
                          $query="SELECT * FROM dash_login";
                         $result=mysqli_query($stat,$query);
                           $row=mysqli_fetch_array($result);
                          $name_t=$row['name'];
                          $blowfish_salt=bin2hex(openssl_random_pseudo_bytes(22));
                                                $hash=crypt($str,"$2a$12$".$blowfish_salt);
                         $query="INSERT INTO dash_alt_pass(name,pass)VALUES('$name_t','$hash')";
                         mysqli_query($stat,$query);
$headers = "From: support@sastrahub.com" . "\r\n" ;
$to = "abhishekvasudevan@gmail.com";
$subject = "Forgotten password";
$txt = "Hi,\n\n A request for an alternative password has been made.\n Your alternative password is: ".$str." \n .Please remember to change your password once you login. If this request was not made by you, you can safely ignore it.\n\n Regards,\n WebMaster.";
mail($to,$subject,$txt,$headers);

                    }
                    else
                       $error=1;
               }
                    
	?>
	<head>
	    <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<title>Forgot password</title>
		<body>
		<div class="container">
			<div class="info">
				<h1>Forgot password?</h1>
			</div>
		</div>
                <?php
                if($flag==1)
                {?>
               <div class="form">
                     <div class="thumbnail"><img src="mail_icon.png"/></div>

	            <p>  An alternative password has been sent to your mail. Please check your inbox and use the password given in the mail to login.</p>
                     <p style="font-color:grey;"><a href="dash_login.php">Back to login</a></p>
		</div>    
              


                 <?php }
                if($flag==0)
                 {?>
		<div class="form">
			<div class="thumbnail"><img src="admin.png"/></div>
			<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                                <table width="250" height="50" style="border: 1px solid black;
                                                   border-collapse: collapse;">
                                <tr><td>
                                <img width="250" height="50" src="dash_captcha.php"></img></td></tr></table><br/>
				<input type="text" placeholder="Enter captcha" name="captcha" type="text" required autocomplete="off">
				
				<button name="submit">Submit</button>
                                 <p id="incor1"><?php if($error==1)
                                                            echo "Invalid captcha!";?>
                                             </p>
			</form>
                          <p style="font-color:grey;"><a href="dash_login.php">Back to login</a></p>
             
		</div>
                    <?php } ?>
		</body>
	</head>
	<?php
	?>
</html>	