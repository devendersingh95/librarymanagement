<?php session_start();
	include("db.php");
	if(!isset($_SESSION['username']) && empty($_SESSION['username']))
	{
		session_destroy();
		header("Location:index.php");
	}
		if(isset($_POST))
		{
				$student_id = $_POST['student_id'];
				if($student_id!="")
				{
					$result  = mysqli_query($link,"SELECT * FROM students WHERE id=".$student_id);
					if(mysqli_num_rows($result))
					{
						$det = mysqli_fetch_array($result);
						echo "<b>Name :</b> ".$det['name']."&nbsp;&nbsp; <b>Father's Name : </b>".$det['fname']."<br/><b> Class : </b>".$det['class'];
					}
					else
					{
						echo "No Student Found";
					}
				}
		}
?>