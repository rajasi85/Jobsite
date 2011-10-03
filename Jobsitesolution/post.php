<?
 include_once('connect.php');
 //tracks movements across the site
 session_start();
 
$title = "jobsite | Post a Job vacancy";
$description = "job vacancies editor";
$keywords = "We are hiring, we have this and this job,blah blah";

require_once('function.php');
//html header
echo head($title,$keywords,$description);

 if(isset($_SESSION['member'])) {
 ?>
<h3>Job vacancy announcement form</h3>
  <form action="post.php" method="post">
     <div>
	 <label for="title">Job Title</label>
	 <input type="text" name="title" maxlength="100">
	 </div>
	 <div>
	 <label for="content" >Job Description</label>
	 <textarea name="job_desc" cols="40" rows="5"></textarea>
	 </div>
	 <div>
	 <label for="content" >Job requirements</label>
	 <textarea name="job_req" cols="40" rows="5"></textarea>
	 </div>
	 <div>
	 <label for="location" >Location</label>
	  <? echo location(); ?>
	 </div>
	 <div>
	 <label for="company">Company Name:</label>
	 <input type="text" name="company_name" maxlength="30">
	 </div>
	 <div>
	 <label for="contact details" >Company's Contact Details</label>
	 <textarea name="contact_details" cols="40" rows="5"></textarea>
	 </div>
	 <div>
	 <label for="job category">Job Category</label>
	  <? echo category(); ?>
	 </div>
	 <div>
	 <p><input type="submit" name="paste" value="Post Item"></p>
	 </div>
	</form>  
	<?
 
 if(isset($_POST['paste'])) {
	   $jbtitle = mysqli_escape_string($connect, strip_tags($_REQUEST['title']));
	   $job_desc = mysqli_escape_string($connect, strip_tags($_REQUEST['job_desc']));
	   $job_req = mysqli_escape_string($connect, strip_tags($_REQUEST['job_req']));
       $location = mysqli_escape_string($connect, strip_tags($_REQUEST['location']));
       $company_name = mysqli_escape_string($connect, strip_tags($_REQUEST['company_name']));
       $contact = mysqli_escape_string($connect, strip_tags($_REQUEST['contact_details']));
	   $category = mysqli_escape_string($connect, strip_tags($_REQUEST['category']));
       
	   if(!empty($jbtitle) && !empty($job_desc) && !empty($job_req) && !empty($location) && !empty($category) && !empty($company_name) &&  !empty($contact)) {
	     $query = "INSERT into hiring(id,poster,jbtitle,job_desc,job_req,company_name,location,contact_details,category,posted) VALUES('','".$_SESSION['member']."','$jbtitle','$job_desc','$job_req','$company_name','$location','$contact','$category',NOW())";
		 $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		 $id = mysqli_insert_id($connect);
		 
		 if($result) {
		   die ("<strong>Your job vacancy has been posted. </strong> <a href='display.php?ID=$id'>Click Here</a> to see it.");
		   echo footer();
		   exit;
		   
		  } 
		 }
      else {
         echo ("One or more of the required fields has not been filled in!");
       }
     }
	}
      else {
      echo("<strong>You must be <a href='login.php'>signed in</a> to post!");
	  }	   
	   ?>