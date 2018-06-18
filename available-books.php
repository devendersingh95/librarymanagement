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
				<h1>Online Library Management System <span>ALL AVAILABLE BOOKS</span></h1>
            </header>       
				<div  class="main">
					<?php 
						$query = "SELECT * FROM books WHERE no_of_books>0";
						$result = mysqli_query($link,$query);
					?>
					<table width="100%" border="1" cellpadding="5px" cellspacing="10px">
						<tr>
							<th>Book Id </th>
							<th>Title</th>
							<th>Author</th>
							<th>Publisher</th>
							<th>Price</th>
							<th>Year of Publishing</th>
							<th>No. of Pages</th>
							<th>Available Books</th>
							<th>Issued</th>
						</tr>
					<?php 
						while($res = mysqli_fetch_array($result))
						{
					?>
						<tr>
							<td><?php echo $res['id']; ?></td>
							<td><?php echo $res['book_name']; ?></td>
							<td><?php echo $res['author']; ?></td>
							<td><?php echo $res['price']; ?></td>
							<td><?php echo $res['publisher']; ?></td>
							<td><?php echo $res['year_of_pub']; ?></td>
							<td><?php echo $res['pages']; ?></td>
							<td><?php echo $res['no_of_books']; ?></td>
							<td><?php echo $res['issued']; ?></td>
						</tr>
						<?php } ?>
					</table>
				</div> 
		<div class="footer"><h3>Project By Devender Singh (53) and Deepesh Sanadhya(46)</h3></div><!--/ freshdesignweb top bar -->
</div>

</body>
</html>
