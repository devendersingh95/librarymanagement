<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
	}
	
	if(isset($_POST['add_student']))
	{
		$name = $_POST['name'];
		$fname = $_POST['fname'];
		$class  = $_POST['class'];
		$institution = $_POST['institution'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$status = $_POST['status'];
		$msg="";
		
		$check  = "SELECT * FROM students WHERE name='$name' AND fname='$fname'";
		if(mysqli_num_rows(mysqli_query($link,$check))==0)
		{
				
		$query  = "INSERT INTO students (`name`, `fname`, `class`, `institute`, `contact`, `gender`, `status`) VALUES ('$name','$fname','$class','$institution','$contact','$gender','$status')";
			$result = mysqli_query($link,$query);
			if($result)
					$msg = "Student has been Added succssfully";
			else
					$msg = "Some Error Has Been Occured Please Try Again. ".mysqli_error($link);
		
		}
		else
		{
			$msg = "Student Already Exists in the database Please Try Again";
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
				<h1>Online Library Management System <span>ADD STUDENT</span></h1>
            </header>       
				<div  class="form">
    		<form id="addstudent" method="post" action=""> 
    			<p class="contact"><label for="name">Name</label></p> 
    			<input name="name"  placeholder="First and last name" required="" tabindex="1" type="text"> 
    			 
    			<p class="contact"><label for="fname">Father's Name</label></p> 
    			<input  name="fname"  placeholder="Enter Father's Name" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="class">Class</label></p> 
    			<input  name="class"  placeholder="Student Current Class" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="institution">Institution/School</label></p> 
    			<input  name="institution"  placeholder="Enter Institution Name" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="contact">Mobile Number</label></p> 
    			<input  name="contact"  placeholder="Enter Contact No." required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="">Select Gender</label></p> 
    			<input name="gender" checked type="radio" value="male"> Male&nbsp;&nbsp;
				<input name="gender"  type="radio" value="female"> Female				
    			
				<p class="contact"><label for="">Student Active Status<label></p> 
    			<input name="status" checked type="radio" value="Active"> Active&nbsp;&nbsp;
				<input name="status"  type="radio" value="Inactive"> UnActive				
    			<br>
            <input class="buttom" name="add_student" id="submit" tabindex="5" value="Add Student" type="submit"> 	 
			<input class="buttom" type="reset" value="Clear All"/>
	</form>
	<h3><?php if(isset($msg) && $msg!="") echo $msg; ?></h3>
</div> 
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div><!--/ freshdesignweb top bar -->
</div>

</body>
</html>
