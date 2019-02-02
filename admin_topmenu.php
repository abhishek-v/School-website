<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['name']))
{
    $name=$_SESSION['name'];
    require_once('db.php');
    $query0="SELECT * from request WHERE status='Processing'";
    $result0=mysqli_query($stat,$query0);
    $c0=mysqli_num_rows($result0); 
?>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">
        <li>
	<a href="admin_search.php"><i class="fa fa-fw fa-search fa-fw"></i> Search Student</a>
	 </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i>
        <?php 
        if($c0!=0)
        {?>
            <div id="butn" class="btn"><div class="notification"><?php echo $c0; ?></div></div> 
        <?php 
        }
        ?>   
        <b class="caret"></b></a>
        <ul class="dropdown-menu message-dropdown">
        <?php
        while($c0!=0&&$rows0=mysqli_fetch_array($result0))
        {
            
            $regno10=$rows0['regno'];
            $query10="SELECT * from student WHERE regno='$regno10'";
            $result10=mysqli_query($stat,$query10);
            if($row0=mysqli_fetch_array($result10))
            {
                $img0=$row0['photo'];
                $name10=$row0['name'];
            }
            ?>
            
                <li class="message-preview">
                    <a href="admin_request1.php">
                        <div class="media">
                            <span class="pull-left">
                                <img class="media-object" style="width:50px;height:70px;" src="student_image/<?php echo $img0;?>" alt="">
                            </span>
                            <div class="media-body">
                                <h5 class="media-heading"><strong><?php echo $name10;?></strong>
                                </h5>
                                <b><p class="small text-muted">Type: <?php echo $rows0['type'];?></p></b>
                                <p><b>Sub: </b><?php echo $rows0['subject'];?></p>
                            </div>
                        </div>
                    </a>
                </li>
            <?php
            }
            ?>
            <li class="message-footer">
                <a href="admin_request.php">Read All Requests</a>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $name; ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="admin_editpassword.php"><i class="fa fa-fw fa-gear"></i> Edit Password</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="logoutadmin.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>
<?php
}
else
{
    header("refresh:0,url=admin.php");
}
?>