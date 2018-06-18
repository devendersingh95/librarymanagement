$(document).ready(function(){
			$("#stu_id").on('input',function(){
				$("#stu_details").empty();
				var s_id = $("#stu_id").val();
				var data = "student_id="+s_id;
				
				$.ajax({
					  url  : 'stu-details.php',
					  type : 'POST',
					  data : data,
					 success:function(data)
						   {
								$("#stu_details").html(data);
						   }
							
					 });
			});
			$("#book_id").on('input',function(){
				$("#book_details").empty();
				var b_id = $("#book_id").val();
				var data = "book_id="+b_id;
				
				$.ajax({
					  url  : 'book-details.php',
					  type : 'POST',
					  data : data,
					 success:function(data)
						   {
								$("#book_details").html(data);
						   }
							
					 });
			});
			$("#clear").on('click',function(){
				$("#stu_details").empty();
				$("#book_details").empty();
			});
			$("#issue_id").on('input',function(){
				$("#issue_det").empty();
				var issue_id = $("#issue_id").val();
				var data = "book_id="+issue_id;
				
				$.ajax({
					  url  : 'issue-details.php',
					  type : 'POST',
					  data : data,
					 success:function(data)
						   {
								$("#issue_det").html(data);
						   }
							
					 });
			});
			
});