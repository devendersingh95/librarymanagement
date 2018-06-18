<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
	}
	$page = $_GET['page'];
	if(isset($_POST['class_submit']))
	{
		if($page=="allstudents")
		{
			$class = $_POST['stuclass'];
			header("Location:students.php?class=".$class);
		}
		if($page=="delete")
		{
			$class = $_POST['stuclass'];
			header("Location:delete-student.php?class=".$class);
		}
		if($page=="update")
		{
			$class = $_POST['stuclass'];
			header("Location:update-student.php?class=".$class);
		}
	}
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
				<h1>Online Library Management System <span>SEARCH STUDENT</span></h1>
            </header>       
				<div  class="form">
    		<form id="selclass" method="post" action=""> 
			<select class="select-style gender" name="stuclass">
				<?php 
				$result = mysqli_query($link,"SELECT * FROM students GROUP BY class");
				while($row = mysqli_fetch_array($result))
				{
				?>
					<option value="<?php  echo $row['class']; ?>"><?php  echo $row['class']; ?></option>
				<?php
				}
				?>
				
			</select>
				<br/><br/>
				<input class="buttom" name="class_submit" id="submit" tabindex="5" value="Search Students" type="submit"> 	 
			</form>
</div> 
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div><!--/ freshdesignweb top bar -->
</div>

</body>
</html>
