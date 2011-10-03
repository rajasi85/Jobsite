<?
 include_once('connect.php');
 //tracks movements across the site
 session_start();
 
$title = "Home Page";
$description = "Common Page For All";
$keywords = "main, home, posts";

require_once('function.php');
//html header
echo head($title,$keywords,$description);

if(isset($_SESSION['member'])) {
	   echo '<div id="menu">
	         <ul>
	         <li><a href="index.php" name="link">Home</a></li>
	         <li><a href="post.php" name="link">Post An Item</a></li>
			 <li><a href="myposts.php" name="link">My Posts</a></li>
	         <li><a href="reset.php" name="link">Reset Password</a></li>
             </ul></div>';
       }

$query = "SELECT id,jbtitle,poster, UNIX_TIMESTAMP(posted) AS posted FROM hiring";
	    $result= mysqli_query($connect, $query) or die(mysqli_error($connect));
	    if(mysqli_num_rows($result) == 0) {
	      echo "You haven\'t posted anything yet.";
          echo footer();
          exit;
		  }
		 echo "<strong><h1>Job vacancies</h1></strong>";  
		 echo "<table>";
         echo "<thead>";
         echo "<tr><th>ID</th><th>Job Title</th><th>Posted by</th><th>Posted On</th></tr></thead>";

 		 while($row = mysqli_fetch_array($result)) {
		  echo '<tr><td>'.$row['id'].'</td>';
          echo "<td><a href='display.php?ID=$row[0]'>".$row['jbtitle']."</a></td>";
          echo "<td>".$row['poster']."</td>";
          echo "<td>". date("F dS Y, h:ia", $row["posted"])."</td></tr>";
         }		  
		echo "</table>";
		
		//show this message if user is not logged in
		if(isset($_SESSION['member'])==false) {
		    echo '<p>To update or delete an item you need to be <a href="login.php">Logged In</a></p>';
		   }
   	   echo footer();
 ?>
 
 