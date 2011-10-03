<?
 include_once('connect.php');
 //tracks movements across the site
 session_start();
 
$title = "jobsite | Edit";
$description = "Edit your posts";
$keywords = "edit, posts, jobsite";

require_once('function.php');
//html header
echo head($title,$keywords,$description);

  if(isset($_REQUEST['update'])) {
  $id = intval($_REQUEST['id']);
  $jbtitle      = mysqli_escape_string($connect, strip_tags($_REQUEST['jbtitle']));
  $job_desc     = mysqli_escape_string($connect, strip_tags($_REQUEST['job_desc']));
  $job_req      = mysqli_escape_string($connect, strip_tags($_REQUEST['job_req']));
  $location     = mysqli_escape_string($connect, strip_tags($_REQUEST['location']));
  $category     = mysqli_escape_string($connect, strip_tags($_REQUEST['category']));
  $company_name = mysqli_escape_string($connect, strip_tags($_REQUEST['company_name']));
  $contact      = mysqli_escape_string($connect, strip_tags($_REQUEST['contact_details']));
  
  $query = "UPDATE hiring SET jbtitle='$jbtitle', job_desc='$job_desc', job_req='$job_req', location='$location', category='$category', company_name='$company_name', contact_details='$contact' WHERE id= $id";
  $result= mysqli_query($connect, $query) or die(mysqli_error($connect));
  
        if($result) {
		   echo ("<strong>Your post has been updated.</strong> <a href='display.php?ID=$id'>Click Here</a> to see it.");
		   echo footer();
		   exit;
	     } 
		 else {
         echo ("<strong>Could not update your post. Please try again later!</strong>");
         echo footer();
		 exit;
		 } 
}

$url_id = intval($_REQUEST['ID']);

$query = "SELECT * from hiring WHERE id='$url_id' LIMIT 1";
$result= mysqli_query($connect, $query);

if(mysqli_num_rows($result)==0 )  {
      echo "The post id you are requesting doesn't exist in our records";
      echo footer();
      exit;
    }		 
	
$row = mysqli_fetch_array($result);

if(isset($_SESSION['member']) && ($row['poster'] == $_SESSION['member'])) {
?>
<h3>Job vacancy announcement form</h3>
  <form action="edit.php" method="post">
     <div>
	 <label for="title">Job Title</label>
	 <input type="text" name="jbtitle" maxlength="100" value="<? echo $row['jbtitle']; ?>">
	 </div>
	 <div>
	 <label for="content" >Job Description</label>
	 <textarea name="job_desc" cols="40" rows="5"><?echo $row['job_desc']; ?></textarea>
	 </div>
	 <div>
	 <label for="content" >Job requirements</label>
	 <textarea name="job_req" cols="40" rows="5"><?echo $row['job_req']; ?></textarea>
	 </div>
	 <div>
	 <label for="location" >location</label>
	 <? echo location(); ?>
	 </div>
	 <div>
	 <label for="company">Company Name:</label>
	 <input type="text" name="company_name" maxlength="30" value="<? echo $row['company_name']; ?>">
	 </div>
	 <div>
	 <label for="contact details" >Company's Contact Details</label>
	 <textarea name="contact_details" cols="40" rows="5"><?echo $row['contact_details']; ?></textarea>
	 </div>
	 <div>
	 <label for="job category">Job Category</label>
	 <? echo category(); ?>
	 </div>
	 <div>
	 <p>
	 <input type="hidden" name="id" value="<? echo $row['id']; ?>">
	 <input type="submit" name="update" value="Post Item"></p>
	 </div>
	</form>  
	<?	
	}
      else {
      echo"<h3>Only <a href='login.php'>logged in</a> users and users who posted this content can update this post!";
	  }	   
	  
	echo footer();
 ?>