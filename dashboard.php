                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard 
                        </h1>
                        
                    </div>
                </div>
                <?php
                    require_once('db.php');
                    $quer1="SELECT * FROM dashboard ORDER BY id DESC;";
                    $resul1=mysqli_query($stat,$quer1); 
                    while($ro=mysqli_fetch_array($resul1)) 
                    {
                        $d=new DateTime($ro['date']);
                        $da=$d->format('d-m-Y');
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2"><h3><strong><?php echo $ro['title'] ;?></strong><small><?php echo"( Posted On: ".$da." ) "?><br>Posted by : <?php echo $ro['author']; ?> </small></h3></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><br> &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp <?php echo $ro['message']; ?> <br><br></td> 
                                        <?php if($ro['image']!="")
                                        {
                                            ?>
                                            <td><div class="col-lg-3">
                                                <img width="200px" src="dash/<?php echo $ro['image'] ;?>">
                                            </div></td>
                                            <?php
                                        }
                                        ?>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
                <?php
            }
            ?>
                <!-- /.row -->
