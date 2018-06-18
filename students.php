<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
	}
	$class = $_GET['class'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Library Management System</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
<body>
<div class="container">
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top">
                <a href="profile.php?id=<?php echo base64_encode($_SESSION['username']); ?>">Home</a>
                <span class="right"><a href="logout.php">LOGOUT</a></span>
				<div class="clr"></div>
            </div><!--/ freshdesignweb top bar -->
			<header>
				<h1>Online Library Management System <span>STUDENT DETAILS</span></h1>
            </header>       
				<div  class="main">
					<?php 
						$query = "SELECT * FROM students WHERE class='$class'";
						$result = mysqli_query($link,$query);
					?>
					<table width="100%" border="1" cellpadding="5px" cellspacing="10px">
						<tr>
							<th>Student Id </th>
							<th>Name</th>
							<th>Father Name</th>
							<th>Class</th>
							<th>School/Inst.</th>
							<th>Gender</th>
							<th>Active Status</th>
						</tr>
					<?php 
						while($res = mysqli_fetch_array($result))
						{
					?>
						<tr>
							<td><?php echo $res['id']; ?></td>
							<td><?php echo $res['name']; ?></td>
							<td><?php echo $res['fname']; ?></td>
							<td><?php echo $res['class']; ?></td>
							<td><?php echo $res['institute']; ?></td>
							<td><?php echo $res['gender']; ?></td>
							<td><?php echo $res['status']; ?></td>
						</tr>
						<?php } ?>
					</table>
					<br>
						<h2><a href="select-class.php?page=allstudents" >Search New Class</a></h2><br/>
				</div> 
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div><!--/ freshdesignweb top bar -->
</div>

</body>
</html>
