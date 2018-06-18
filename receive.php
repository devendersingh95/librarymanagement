<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
	}
	if(isset($_GET['issue_id']))
	{
		$id = $_GET['issue_id'];
		$msg="";
		$book_id = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM issue_book WHERE id=".$id));
		$bid = $book_id['book_id'];
		$book_det = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM books WHERE id=".$bid));
		
		$books = $book_det['no_of_books']+1;
		$issue = $book_det['issued']-1;
		
		$update = "UPDATE books SET no_of_books='$books',issued='$issue' WHERE id='$bid'";
		
		$query = "DELETE FROM issue_book WHERE id=".$id;
		
		if(mysqli_query($link,$update))
		{
			mysqli_query($link,$query);
			$msg = "Book Has Been Received Successfully!";
		}
		else
		{
			$msg = "Some Error Occured!";
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
				<h1>Online Library Management System <span>RECEIVE BOOK</span></h1>
            </header>       
				<div  class="form">
    		<form id="recbook" method="post" action=""> 
				<p class="contact"><label for="issuebook_id">ISSUED Book ID</label></p> 
    			<input name="issuebook_id" id="issue_id" placeholder="Enter Book ID" required="" tabindex="1" type="text"> 
    			<div id="issue_det"></div>
				<br/>
			</form>
			<h3><?php if(isset($msg)) echo $msg; ?></h3>
			</div> 
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div><!--/ freshdesignweb top bar -->
</div>
<script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/issue.js"></script>
</body>
</html>
