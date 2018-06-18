<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
	}
	if(isset($_POST['book_update']))
	{
		$bookid = $_POST['book_id'];
		header("Location:update-book.php?book_id=".base64_encode($bookid));
		
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
				<h1>Online Library Management System <span>UPDATE BOOK DETAILS</span></h1>
            </header>       
				<div  class="form">
    		<form id="selbookid" method="post" action=""> 
				<p class="contact"><label for="name">Book ID</label></p> 
    			<input id="book_id" name="book_id" placeholder="Enter Book ID" required="" tabindex="1" type="text"> 
				<br/>
				<input class="buttom" name="book_update" id="submit" tabindex="5" value="Update Book" type="submit"> 	 
			</form>
</div> 
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div><!--/ freshdesignweb top bar -->
</div>

</body>
</html>
