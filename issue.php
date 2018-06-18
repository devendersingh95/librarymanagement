<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
	}
	if(isset($_POST['bookissue']))
	{
		$stu_id = $_POST['stu_id'];
		$book_id = $_POST['book_id'];
		$date = date("Y-m-d");
		$msg="";
		
		$check_book = "SELECT * FROM books WHERE id=".$book_id;
		$res = mysqli_query($link,$check_book);
		$avail = mysqli_fetch_array($res);
		
		$checkstu = "SELECT * FROM students WHERE id=".$stu_id;
		$resstu = mysqli_query($link,$checkstu);
		
		if($avail['no_of_books']>0 && mysqli_num_rows($resstu)>0)
		{
			$check_stu = "SELECT * FROM issue_book WHERE student_id=".$stu_id;
			$result = mysqli_query($link,$check_stu);
			if(mysqli_num_rows($result)==0)
			{
				$query = "INSERT INTO issue_book (`book_id`, `student_id`, `issue_date`, `status`) VALUES ('$book_id','$stu_id','$date','issued')";
				$books = $avail['no_of_books']-1;
				$issue = $avail['issued']+1;
				$update = "UPDATE books SET no_of_books='$books',issued='$issue' WHERE id=".$book_id;
				if(mysqli_query($link,$update))
				{
					mysqli_query($link,$query);
					$msg = "BOOK has been successfully issued to Student ID : ".$stu_id;
				}
				else
				{
					$msg = "Some Error has been occured Please Try Again! ".mysqli_error($link);
				}
			}
			else
			{
				$stu_det = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM students WHERE id=".$stu_id));
				$msg="Error : Another Book Has Already Been Issued to ".$stu_det['name'];
			}
				
		}
		else
		{
			$msg = "Error : BOOK Quantity is not available for the issue Or Student Doesn't Exists";
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
				<h1>Online Library Management System <span>ISSUE BOOK</span></h1>
            </header>       
				<div class="form">
    		<form id="addbook" method="post" action=""> 
    			<p class="contact"><label for="stu_id">Student ID </label> </p> 
    			<input name="stu_id" id="stu_id" placeholder="Enter student's id " required="" tabindex="1" type="text"> 
				<a class="search" href="select-class.php?page=allstudents" target="_blank">Search</a>
    			 <br/>
				 <div id="stu_details">
				</div>
				<br/>
				<p class="contact"><label for="book_id">Book ID</label></p> 
    			<input  name="book_id" id="book_id" placeholder="Enter book's id" required="" tabindex="1" type="text"> 
				<a class="search" href="available-books.php" target="_blank">Search</a>
    			<br/>
				<div id="book_details">
				</div>
				<br/>
				<br>
            <input class="buttom" name="bookissue" id="submit" tabindex="5" value="Issue Book" type="submit">
				&nbsp;
			 <input class="buttom" id="clear" value="Clear" type="reset">
				</form>
	<h3><?php if(isset($msg) && $msg!="") echo $msg; ?></h3>
</div> 
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div><!--/ freshdesignweb top bar -->
</div>
	
		<script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/issue.js"></script>
</body>
</html>
