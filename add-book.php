<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
	}
	if(isset($_POST['add_book']))
	{
		$name = $_POST['name'];
		$author = $_POST['author'];
		$price  = $_POST['price'];
		$publisher = $_POST['publisher'];
		$yop = $_POST['yop'];
		$pages = $_POST['pages'];
		$books = $_POST['books'];
		
		$msg="";
		$check  = "SELECT * FROM books WHERE book_name='$name' AND author='$author'";
		if(mysqli_num_rows(mysqli_query($link,$check))==0)
		{
				
		$query  = "INSERT INTO books (`book_name`, `author`, `price`, `publisher`, `year_of_pub`, `pages`, `no_of_books`,`issued`) VALUES('$name','$author','$price','$publisher','$yop','$pages','$books',0)";
			$result = mysqli_query($link,$query);
			if($result)
					$msg = "Book has been Added succssfully";
			else
					$msg = "Some Error Has Been Occured Please Try Again. ".mysqli_error($link);
		
		}
		else
		{
			$msg = "Book Already Exists in the database Please Try Again";
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
				<h1>Online Library Management System <span>ADD NEW BOOK</span></h1>
            </header>       
				<div  class="form">
    		<form id="addbook" method="post" action=""> 
    			<p class="contact"><label for="name">Book Title</label></p> 
    			<input name="name" placeholder="Enter book name" required="" tabindex="1" type="text"> 
    			 
    			<p class="contact"><label for="author">Author's Name</label></p> 
    			<input  name="author"  placeholder="Enter author's Name" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="price">Price</label></p> 
    			<input  name="price" placeholder="Enter Price" value="Rs. " required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="publisher">Publisher</label></p> 
    			<input  name="publisher"  placeholder="Enter Publisher Name" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="yop">Year of Publishing</label></p> 
    			<input  name="yop"  placeholder="Enter Year of Publishing" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="pages">No. of Pages</label></p> 
    			<input  name="pages"  placeholder="Enter no. of pages" required="" tabindex="1" type="text"> 
    			
				<p class="contact"><label for="books">No. of Books Available </label></p> 
    			<input  name="books" placeholder="Enter No. of Books" required="" tabindex="1" type="text"> 
    			
				<br>
            <input class="buttom" name="add_book" id="submit" tabindex="5" value="Add Book" type="submit">
				&nbsp;
			 <input class="buttom" value="Clear" type="reset">
				</form>
				<br/>
	<h3><?php if(isset($msg) && $msg!="") echo $msg; ?></h3>
</div> 
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div>
</div>

</body>
</html>
