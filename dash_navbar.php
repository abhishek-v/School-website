<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['dash_name']))
{?>
<ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo " ".$_SESSION['dash_name'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="dash_editpassword.php"><i class="fa fa-fw fa-gear"></i> Edit password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="dash_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
<?php
}
else
{
  header("refresh:0,url=dash_login.php");

}
?>