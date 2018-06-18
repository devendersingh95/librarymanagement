<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
	}
		if(isset($_POST))
		{
				$book_id = $_POST['book_id'];
				if($book_id!="")
				{
					$result  = mysqli_query($link,"SELECT * FROM books WHERE id=".$book_id);
					if(mysqli_num_rows($result))
					{
						$det = mysqli_fetch_array($result);
						echo "<b>Title :</b> ".$det['book_name']."&nbsp;&nbsp; <b>Author : </b>".$det['author']."<br/><b> Available No. of Books : </b>".$det['no_of_books'];
					}
					else
					{
						echo "No Book Found for this ID";
					}
				}
		}
?>