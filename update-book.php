<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
	}
	$bookid = base64_decode($_GET['book_id']);
	if(isset($_POST['bookupdate']))
	{
		$name = $_POST['name'];
		$author = $_POST['author'];
		$price  = $_POST['price'];
		$publisher = $_POST['publisher'];
		$yop = $_POST['yop'];
		$pages = $_POST['pages'];
		$books = $_POST['books'];
		
		$msg="";
			$query  = "UPDATE books SET book_name='$name',author='$author',price='$price',publisher='$publisher',year_of_pub='$yop',pages='$pages',no_of_books='$books' WHERE id='$bookid'";
			$result = mysqli_query($link,$query);
			if($result)
					$msg = $name." has been Updated succssfully";
			else
					$msg = "Some Error Has Been Occured Please Try Again. ".mysqli_error($link);
		
	}
	$details =  "SELECT * FROM books WHERE id=".$bookid;
	$res = mysqli_query($link,$details);
	$book = mysqli_fetch_array($res);
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
				<h1>Online Library Management System <span>UPDATE BOOK</span></h1>
            </header>       
				<div  class="form">
				<?php if(mysqli_num_rows($res)>0)
				{?>
    		<form id="addbook" method="post" action=""> 
    			<p class="contact"><label for="name">Book Title</label></p> 
    			<input name="name" value="<?php echo $book['book_name']; ?>" placeholder="Enter book name" required="" tabindex="1" type="text"> 
    			 
    			<p class="contact"><label for="author">Author's Name</label></p> 
    			<input  name="author" value="<?php echo $book['author']; ?>" placeholder="Enter author's Name" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="price">Price</label></p> 
    			<input  name="price" placeholder="Enter Price" value="<?php echo $book['price']; ?>" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="publisher">Publisher</label></p> 
    			<input  name="publisher" value="<?php echo $book['publisher']; ?>" placeholder="Enter Publisher Name" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="yop">Year of Publishing</label></p> 
    			<input  name="yop" value="<?php echo $book['year_of_pub']; ?>" placeholder="Enter Year of Publishing" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="pages">No. of Pages</label></p> 
    			<input  name="pages" value="<?php echo $book['pages']; ?>" placeholder="Enter no. of pages" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="books">No. of Books Available </label></p> 
    			<input  name="books" value="<?php echo $book['no_of_books']; ?>" placeholder="Enter No. of Books" required="" tabindex="1" type="text"> 
    			
				<br>
            <input class="buttom" name="bookupdate" id="submit" tabindex="5" value="Update Book" type="submit">
				&nbsp;
			 <input class="buttom" value="Clear" type="reset">
				</form>
				<?php 
				}
				else
				{
					echo "No Book Found in the Database for entered book ID.";
				?>
					<br/><br/><h1><a class="search" href="book-id.php">Go Back</a></h1>
				<?php
				}
				?>
	<h3><?php if(isset($msg) && $msg!="") echo $msg; ?></h3>
</div> 
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div><!--/ freshdesignweb top bar -->
</div>

</body>
</html>
