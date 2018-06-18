<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
	}
	$stu_id = base64_decode($_GET['update_id']);
	
	if(isset($_POST['update']))
	{
		$name = $_POST['name'];
		$fname = $_POST['fname'];
		$class  = $_POST['class'];
		$institution = $_POST['institution'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$status = $_POST['status'];
		$msg="";
		
		$query  = "UPDATE students SET name='$name',fname='$fname',class='$class',institute='$institution',contact='$contact',gender='$gender',status='$status' WHERE id='$stu_id'";
			$result = mysqli_query($link,$query);
			if($result)
					$msg = "Student has been updated succssfully";
			else
					$msg = "Some Error Has Been Occured Please Try Again. ".mysqli_error($link);
		
	}
	$details = "SELECT * FROM students WHERE id=".$stu_id;
	$result  = mysqli_query($link,$details);
	$stu = mysqli_fetch_array($result);
	
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
				<h1>Online Library Management System <span>ADD STUDENT</span></h1>
            </header>       
				<div  class="form">
    		<form id="updatestudent" method="post" action=""> 
    			<p class="contact"><label for="name">Name</label></p> 
    			<input name="name" value="<?php echo $stu['name']; ?>" placeholder="First and last name" required="" tabindex="1" type="text"> 
    			 
    			<p class="contact"><label for="fname">Father's Name</label></p> 
    			<input  name="fname" value="<?php echo $stu['fname']; ?>" placeholder="Enter Father's Name" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="class">Class</label></p> 
    			<input  name="class" value="<?php echo $stu['class']; ?>" placeholder="Student Current Class" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="institution">Institution/School</label></p> 
    			<input  name="institution" value="<?php echo $stu['institute']; ?>" placeholder="Enter Institution Name" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="contact">Mobile Number</label></p> 
    			<input  name="contact" value="<?php echo $stu['contact']; ?>" placeholder="Enter Contact No." required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="">Select Gender</label></p> 
    			<input name="gender" <?php if($stu['gender']=="male") echo "checked"; ?> type="radio" value="male"> Male&nbsp;&nbsp;
				<input name="gender" <?php if($stu['gender']=="female") echo "checked"; ?> type="radio" value="female"> Female				
    			
				<p class="contact"><label for="">Student Active Status<label></p> 
    			<input name="status" <?php if($stu['status']=="Active") echo "checked"; ?> type="radio" value="Active"> Active&nbsp;&nbsp;
				<input name="status" <?php if($stu['status']=="Inactive") echo "checked"; ?> type="radio" value="Inactive"> InActive				
    			<br>
            <input class="buttom" name="update" id="submit" tabindex="5" value="Update Student" type="submit"> 	 
   </form>
	<h3><?php if(isset($msg) && $msg!="") echo $msg; ?></h3>
</div> 
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div><!--/ freshdesignweb top bar -->
</div>

</body>
</html>
