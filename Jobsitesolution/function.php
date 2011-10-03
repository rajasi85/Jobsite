<?
 function head($title,$keywords,$description) 
 {
  echo '
     <!DOCTYPE html>
         <html>

         <head>
         <meta content ="text/html; charset=utf-8" http-eqiv="Content-Type">
         <meta name="keywords" contents='.$keywords.'">
		 <meta name="description" contents='.$description.'">
		 <link rel="stylesheet" href="stylesheet.css" type"text/css">
         <title>'.$title.'</title>
         </head>

         <body>

         <div id="wrapper">
		 <div id="header">
         <h1><a href="index.php">Job Listing Website</a></h1>';
         echo '<div id="acc">';
          if(isset($_SESSION['member'])) {
	        echo "<div id='logout'>Hello <span class='user'>".$_SESSION['member']."</span>&nbsp;&nbsp; <a href='logout.php'>Log Out</a></div>";
	         }
	      else {
	        echo "<div id='login1'><a href='login.php' name='logsig'>Login</a> &nbsp;&nbsp; <a href='signup.php' name='logsig'>SignUp</a></div>"; 
	         }
    
		}
 	function footer()
	{
	 echo' </div></div></div></body></html> ';
    }	
	function signUpForm()
	{
	 echo ' <div id="signup">
      <h1>Sign Up</h1>
      <p><b>Enter your details to become a member</b></p>
       <form action="signup.php" method="post">
        <div>
        <label for="username">Username:</label>
        <input type="text" name="username" maxlength="12">
        </div>
        <div>
        <label for="password">Password:</label>
        <input type="password" name="password" maxlength="15">
        </div>	
        <div>
        <label for="cpassword">Confirm Password:</label>
        <input type="password" name="cpassword" maxlength="15">
        </div>		
	    <div>
        <label for="email">Email:</label>
        <input type="text" name="email" maxlength="80">
        </div>
		<div>
	    <label for="location" >location</label>
		<select id="location" name="location">
		 <option value="Mumbai">Mumbai</option>
		 <option value="Chennai">Chennai</option>
		 <option value="Bangalore">Bangalore</option>
		 <option value="Mysore">Mysore</option>
		 <option value="Delhi">Delhi</option>
		 <option value="Punjab">Punjab</option>
		 <option value="Gujarat">Gujarat</option>
		 <option value="Pune">Pune</option>
		 <option value="Other">Other</option>
		 </select>
	    </div>
		<label for="join_date">Join_Date:</label>
        <input type="datetime" name="join_date" maxlength="30">
        </div>	
	    <div>
	    <input type="submit" name="signup" value="Join Now">
        </div>		
	   </form>
  </div> ';
  
	}
	function loginForm() 
	{
     echo '	
	  <div id="login">
       <h3>Members Login Area</h3>
       <p>Not a member yet? <a href="signup.php">Sign Up here</a></p>
       <form action="login.php" method="post">
         <div>
           <label for="user">Username:</label>
           <input type="text" name="user" maxlength="12">
         </div>
	     <div>
           <label for="password">Password:</label>
           <input type="password" name="password" maxlength="15">
         </div>
	     <div>
           <input type="submit" name="login" value="Login">
         </div>
       </form>  
	  </div>
     <p><a href ="forgot.php">I forgot my password</a></p>';
	  }
	  
	  function location()
	  {
	    echo '
		  <select id="location" name="location">
		 <option value="Mumbai">Mumbai</option>
		 <option value="Chennai">Chennai</option>
		 <option value="Bangalore">Bangalore</option>
		 <option value="Mysore">Mysore</option>
		 <option value="Delhi">Delhi</option>
		 <option value="Punjab">Punjab</option>
		 <option value="Gujarat">Gujarat</option>
		 <option value="Pune">Pune</option>
		 <option value="Other">Other</option>
		 </select>';
		 }
		 
		 function category()
		 {
		   echo '
		    <select id="category" name="category">
		 <option value="Accounts">Accounts</option>
		 <option value="Architecture">Architecture</option>
		 <option value="Web design">Web design</option>
		 <option value="Hotels/Restaurants">Hotels/Restaurants</option>
		 <option value="Journalism">Journalism</option>
		 <option value="Banking/Insurance">Banking/Insurance</option>
		 <option value="BPO">BPO</option>
		 <option value="HR">HR</option>
		 <option value="Secretary">Secretary</option>
		 <option value="Healthcare">Healthcare</option>
		 <option value="Marketing">Marketing</option>
		 <option value="Production">Production</option>
		 <option value="Teaching">Teaching</option>
		 <option value="IT-Software-System programming">IT-Software-System programming</option>
		 <option value="IT-Software-DBA">IT-Software-DBA</option>
         <option value="Others">Others</option> 
  		 </select>';
		 }
	  
?>
	