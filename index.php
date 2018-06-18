<?php session_start();
	include("db.php");
	if(isset($_SESSION['username']) && !empty($_SESSION['username']))
	{
		header("Location:profile.php?id=".base64_encode($_SESSION['username']));
	}
	if(isset($_POST['submit']))
	{
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$msg="";
		
		$query = "SELECT * FROM login WHERE (username='$email' OR email='$email') AND password='$password'";
		$result = mysqli_query($link,$query);
		if(mysqli_num_rows($result))
		{
			$row = mysqli_fetch_array($result);
			$_SESSION['username'] = $row['username'];
			header("Location:profile.php?id=".base64_encode($_SESSION['username']));
		}
		else
		{
			$msg = "Username or Password you entered was not found in the database!";
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
                <a href="index.php" target="_blank">Home</a>
                <div class="clr"></div>
            </div><!--/ freshdesignweb top bar -->
			<header>
				<h1>Online Library Management System <span>LOGIN</span></h1>
            </header>       
      <div  class="form">
    		<form id="loginform" method="post" action=""> 
    			 
    			<p class="contact"><label for="email">Email or Username</label></p> 
    			<input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
                
                <p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password" id="password" name="password" required=""> 
              
            <input class="buttom" name="submit" id="submit" tabindex="5" value="LOGIN" type="submit"> 	 
		</form>
		<h3><?php if(isset($msg) && $msg!="") echo $msg; ?></h3>
	</div>
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div><!--/ freshdesignweb top bar -->
</div>

</body>
</html>
