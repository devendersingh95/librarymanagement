<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
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
				<h1>Online Library Management System <span><?php echo $_SESSION['username']; ?>'s Profile</span></h1>
            </header>       
			<div class="main">
				<h3><br/><b>STUDENTS</b><br/></h3>
				<a href="add-student.php">
				<div class="category">
					ADD STUDENT	
				</div>
				</a>
				
				<a href="select-class.php?page=allstudents">
				<div class="category">
					SHOW STUDENT	
				</div>
				</a>
				<a href="select-class.php?page=delete">
				<div class="category">
					DELETE STUDENT	
				</div>
				</a>
				<a href="select-class.php?page=update"><div class="category">
					UPDATE STUDENT DETAILS	
				</div>
				</a>
			</div><br/>
			<div class="main2">
				<h3><br/><b>BOOKS</b><br/></h3>
				<a href="add-book.php">
				<div class="category">
					ADD BOOK	
				</div>
				</a>
				
				<a href="all-books.php">
				<div class="category">
					SHOW ALL BOOKS	
				</div>
				</a>
				<a href="available-books.php"><div class="category">
					SHOW AVAILABLE	
				</div>
				</a>
				<a href="book-id.php"><div class="category">
					UPDATE BOOK DETAILS	
				</div>
				</a>
				<a href="issue.php"><div class="category">
					ISSUE BOOK	
				</div>
				</a>
				<a href="receive.php"><div class="category">
					RECIEVE BOOK	
				</div>
				</a>
			</div>
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div><!--/ freshdesignweb top bar -->
</div>

</body>
</html>
