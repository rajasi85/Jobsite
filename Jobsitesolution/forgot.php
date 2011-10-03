<?
 include_once('connect.php');
 //tracks movements across the site
 session_start();
 
$title = "Forgot Password Page";
$description = "Creating a new password";
$keywords = "password, forgot";

require_once('function.php');

echo head($title,$keywords,$description);

	   ?>
	   <h3>Forgot Password</h3>
       <p><b>Enter your Email. Your password will be sent there</b></p>
       <form action="forgot.php" method="post">
       <div>
	   <label for="email">Email</label>
	   <input type="text" name="email" maxlength="100">
	   </div>
	   <div>
	   <label for="location">Location</label>
	   <input type="location" name="location" maxlength="100">
	   </div>
	   <div>
	   <p><input type="submit" name="submit" value="Give Password"></p>
	   </div>
       </form>
       <?

if(isset($_POST['submit']))
{ 
           
   $location=strip_tags($_POST['location']);
   $email_to=strip_tags($_POST['email']);
   
   if(!empty($email_to) && !empty($location)) {
   
         $query="SELECT * FROM cmembers WHERE email='$email_to' AND location='$location'";
         $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
   
           if($result)
		   {
		     $row = mysqli_fetch_array($result);
			 $locatn=$row['location'];
			 $emailto=$row['email'];
			 $passwd=$row['password'];
			 if($locatn==$location && $emailto==$email_to)
			 {
                echo "Your password is ".$passwd;
             } 

           }
          else {
             die ("Could not find your email in our database");
           }
	}	
	else {
	   echo "All fields not entered";
	   }
	   
	   

}

 echo footer();
?>
		