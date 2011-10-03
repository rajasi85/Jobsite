<?
 include_once('connect.php');
 //tracks movements across the site
 session_start();
 
$title = "jobsite | Log Out";
$description = "Log out page";
$keywords = "Logout,Jobsite,employement oppurtunities, Looking for a job";

require_once('function.php');
//html header
echo head($title,$keywords,$description);

//destroy session if it exists
if(isset($_SESSION['member'])) {
	    unset($_SESSION['member']);
		$destroy = session_destroy();
		
		if($destroy) {
		  echo "<p>You have been successfully logged out.</p>";
		 }
      }	
    else {
      echo "You are not logged in. <a href='login.php'>Click Here</a> to login";
      }
	  
	  	
	echo footer();

?>