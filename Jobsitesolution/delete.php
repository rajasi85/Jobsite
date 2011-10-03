<?
 include_once('connect.php');
 //tracks movements across the site
 session_start();
 
$title = "Delete Your Posts";
$description = "Delete old Posts";
$keywords = "delete, your, old, posts";

require_once('function.php');
//html header
echo head($title,$keywords,$description);

if(isset($_SESSION['member'])) {
  if(isset($_REQUEST['ID'])) {
    $id = intval($_REQUEST['ID']);
	$check = "SELECT poster FROM hiring WHERE id='$id'";
	$chkq = mysqli_query($connect, $check);
	
	$row = mysqli_fetch_array($chkq);
	
	if(isset($_SESSION['member']) && ($_SESSION['member'] ==$row['poster'])) {
	   
	    $query = "DELETE from hiring WHERE id='$id' LIMIT 1";
		$result = mysqli_query($connect, $query);
		
		if($result) {
		echo "<strong>Your Post Has Been Deleted</strong>";
		echo footer();
		exit;
		}
		else {
		 echo "<strong>Could not delete your post.</strong>";
		 echo footer();
		 exit;
		 }
		}
		else {
		  echo "<strong> You cannot delete a post you did not author!</strong>";
		  echo footer();
		 exit;
		 }
	}
}	