
<?php 
	$x = $_GET['uname'];
	require('db.php');
	$query="SELECT * from teacher WHERE username='$x'";
	$result=mysqli_query($stat,$query);	
	$i=1;
	
	if($rows=mysqli_fetch_array($result))
	{?>
		<div style="width: 70%; float: left;">
		<h2>
		<table style="color: white;font-size: 25 ;background-color: black;padding: 15px 15px">
		<tr>
			<td class="prop">Name</td>
			<td>:</td>
			<td><?php echo $rows['name'];?><br></td>
		</tr>
		<tr>
			<td class="prop">Address</td>
			<td>:</td>
			<td><?php echo $rows['address'];?><br></td>
		</tr>
		<tr>
			<td class="prop">Contact No.</td>
			<td>:</td>
			<td><?php echo $rows['contactno'];?><br></td>
		</tr>
			<td class="prop">Qualififcation</td>
			<td>:</td>
			<td><?php echo $rows['qualification'];?><br></td>
		<tr>
			<td class="prop">Designation</td>
			<td>:</td>
			<td><?php echo $rows['designation'];?><br></td>
		</tr>
		<?php  
		 	$query1="SELECT * from class WHERE classteacher='$x'";
			$result1=mysqli_query($stat,$query1);	
			if(mysqli_num_rows($result1)!=0)
			{
				while($row=mysqli_fetch_array($result1))
				{
					?>
					<tr>
					 	<td class="prop">Class Teacher</td>
					 	<td>:</td>
						<td><?php echo $row['std'] ?><br></td>
					</tr>
					<?php		
				}
			}
		 ?>
		<tr>
		<td class="prop">
		Subjects 
		</td>
		<td style="padding-right: 20px">:</td>
		<td>
		<?php
		
		for ($i=1; $i <=5 ; $i++) 
		{ 
			if($rows['subject'.$i]!="")
			{
				echo $rows['subject'.$i]." ";?><?php
			}
		}
		?>
		 </td>
		 </tr>
		<?php  
		 	$query1="SELECT * from class WHERE teacher='$x' OR teacher1='$x' OR teacher2='$x' OR teacher3='$x' OR teacher4='$x' OR teacher5='$x' OR teacher6='$x' OR teacher7='$x' OR teacher8='$x' OR teacher9='$x'";
			$result1=mysqli_query($stat,$query1);	
			if(mysqli_num_rows($result1)!=0)
			{
				?>
				<tr>
					<td class="prop">Classes</td>
					<td>:</td>
					<td>
				<?php
				while($row=mysqli_fetch_array($result1))
				{?>
					
					<?php echo $row['std']." - "; ?>
					<?php
					if($row['teacher']==$x)
					{
						echo $row['subject']." ";
					}
					for ($i=1; $i <=9 ; $i++) 
					{ 
						if($row['teacher'.$i]==$x)
						{
							echo $row['subject'.$i]." ";
						}
					}
					?>
					<br>
					<?php
				}
				?>
				
				</td>
				</tr>
				<?php
			}
		 ?>		 

		 
		 </table>
		</h2>
		</div>
		<div style="width: 30%; float: right;">
			<img height="50%" width="70%" src="image/<?php echo $rows['photo']; ?>">
		</div>
		<?php 
	}

?>