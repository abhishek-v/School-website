<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['t_name']))
{?>
<ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo " ".$rows['name'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="t_edit_profile.php"><i class="fa fa-fw fa-gear"></i> Edit profile</a>
                        </li>
                        <li>
                            <a href="t_edit_pass.php"><i class="fa fa-fw fa-wrench"></i> Edit password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout_t.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
<?php
}
else
{
  header("refresh:0,url=teacherlogin.php");

}
?>