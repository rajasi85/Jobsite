<?
 include_once('connect.php');
 //tracks movements across the site
 session_start();
 
$title = "jobsite | ResetPasswordPage";
$description = "Reseting password";
$keywords = "reser,password";

require_once('function.php');
//html header
echo head($title,$keywords,$description);

if(isset($_POST['reset'])) { 
   
	      $newpass   = strip_tags($_POST['newpass']);
	      $cnewpass  = strip_tags($_POST['cnewpass']);
		  if(!empty($newpass) && !empty($cnewpass)) 
		  {
		  //check that the new password and confirmation of new password match
		  
		  if($newpass != $cnewpass) {
		    die("<strong>The passwords do not match!</strong>");
	   	   }
        	
          $query = "UPDATE cmembers SET password = '$newpass' WHERE username='".$_SESSION['member']."'";
          $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
		
          if($result) {
            die("<strong>Password has been successfully reset</strong>");
           }
          else {
            die("<strong>We could not reset your password! Please try again later.</strong>");
           }
          } 
          else {
            echo "Enter a new password!";
          }			
	   }
	    ?>
  <div id="login">
    <h1>Reset Password</h1>
    <form action="reset.php" method="post">
    <div>
      <label for="newpassword">New Password:</label>
      <input type="password" name="newpass">
    </div>
	<div>
      <label for="cnewpassword">Confirm Password:</label>
      <input type="password" name="cnewpass">
    </div>
    <div>
      <input type="submit" name="reset" value="Reset My Password">
    </div>
	</form>
  </div>
  <?
   echo footer();
   ?>