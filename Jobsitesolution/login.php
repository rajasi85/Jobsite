<?
 include_once('connect.php');
 //tracks movements across the site
 session_start();
 
$title = "jobsite | LoginPage";
$description = "Jobsite Members login area";
$keywords = "jobsite, login area, members only";

require_once('function.php');
//html header
echo head($title,$keywords,$description);

//if form submitted retrieve data 4m db
if(isset($_POST['login']))
	{
   
	$user     = strip_tags($_POST['user']);
	$password = strip_tags($_POST['password']);
	
	  if(!empty($user) && !empty($password)) 
	  {
	    $query = "SELECT username, password FROM cmembers WHERE username='".$user."' AND password='".$password."'";
	    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
       
	       if($result)
		   {
		     $row = mysqli_fetch_array($result);
			 $usname=$row['username'];
			 $passwd=$row['password'];
			 if($usname==$user && $passwd == $password)
			 {
		      //give session name
		       $_SESSION['member'] = $user;
		     }
			 else { 
			 echo "<h1>Wrong Entry</h1>"; }
		   } 
	  }
	  else {
	   echo "<h1>Enter correct username and password</h1>";
	   }
    }

    if(isset($_SESSION['member'])) 
    {
      die("You are now logged in. <a href='index.php'>Click Here to go to homepage.</a>");
    }
    else
	{ 
	//login form
	 echo loginForm();
	}
	
	
	echo footer();

?>

