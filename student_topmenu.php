<!-- Top Menu Items -->
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['stuname']))
{?>
    <ul class="nav navbar-right top-nav">
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $name; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="student_editprofile.php"><i class="fa fa-fw fa-user"></i> Edit Profile</a>
                </li>
                <li>
                    <a href="student_permission.php"><i class="fa fa-fw fa-file"></i> Permission</a>
                </li>
                <li>
                    <a href="student_bonafide.php"><i class="fa fa-fw fa-certificate"></i> Bonafide</a>
                </li>
                <li>
                    <a href="student_history.php"><i class="fa fa-fw fa-history"></i> History</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logoutstu.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <?php
}
else
{
  header("refresh:0,url=student.php");

}
?>