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
				$result  = mysqli_query($link,"SELECT * FROM issue_book WHERE book_id=".$book_id);
				if(mysqli_num_rows($result))
				{
					echo "<h3>Details Of The Students Whom this Book has been Issued</h3><br/>";
					echo "<table width='100%' cellpadding='5px' border='1'>";
					$i=1;
					
						echo "<tr><td>S No.</td><td>Student Name</td><td>Class</td><td>OPTION</td></tr>";
					while($det = mysqli_fetch_array($result))
					{
						$stu_det = mysqli_fetch_array(mysqli_query($link,"SELECT * FROM students WHERE id=".$det['student_id']));
						echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$stu_det['name']."</td>";
							echo "<td>".$stu_det['class']."</td>";
							echo "<td><a class='search' href='receive.php?issue_id=".$det['id']."'>Receive</a></td>";
						echo "</tr>";
						$i++;
					}
					echo "</table>";
				}
				else
				{
					echo "No Issued Book Found for this ID!";
				}
				}
		}
?>