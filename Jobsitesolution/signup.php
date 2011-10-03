<?
 include_once('connect.php');
 
$title = "jobsite | SignUp";
$description = "Sign Up to become a member.Only members can post content";
$keywords = "sign up page, jobsite";

require_once('function.php');

echo head($title,$keywords,$description);


echo signUpForm();
    	
//to check if signup form is submitted 
if(isset($_POST['signup'])) {
   
    $email        = strip_tags($_POST['email']);
	$location     = strip_tags($_POST['location']);
	$user         = strip_tags($_POST['username']);
	$password     = strip_tags($_POST['password']);
	$cpassword    = strip_tags($_POST['cpassword']);
	
	$query = "SELECT username FROM cmembers WHERE username='".$user."'";
	$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    if($result)
     {
       die("<strong>Username already exists. select another</strong>");
     }	   
	//check if the email address is valid or not
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  die("<strong> The email address you entered is not valid!</strong>");
	 }

     //check if passwords match
     if($password!=$cpassword) {
        die("<strong> Passwords entered do not match!");
     }
     //I will wish users of my app to have passwords that's atleast 4 characters long
     if(strlen($password)<4) {
       die("<strong>Your password is too short. Passwords must be atleast 4 characters long!</strong>");
     }
	 //To check if country is entered 
     if(empty($location)) {
       die("<strong>Enter your location</strong>");
     }
     //now check that the username is atleast 2 characters long
     if(strlen($user)<2) {
       die("<strong>Your username must be atleast 2 characters long!</strong>");
     }
	 
      //at this point everything should be fine so go ahead and insert data into your database
      $query = "INSERT into cmembers VALUES('','$user','$password','$email','location',NOW())";
      $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
     
     if($result) {
	   
       die ("<p>Sign Up sucessful. <a href='login.php'>Click Here</a> to login</p>");
	   } 
     else {
       echo "<p>We were not able to register you as a menber. Please try again later.</p>";
      }
	 } 
	 
//footer sectn
echo footer();

?>