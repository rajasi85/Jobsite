<?
 include_once('connect.php');
 //tracks movements across the site
 session_start();
 
$title = "jobsite | All my posts";
$description = "Posts I have made on this website";
$keywords = "my posts";

require_once('function.php');
//html header
echo head($title,$keywords,$description);


   $query = "SELECT id,jbtitle,poster, UNIX_TIMESTAMP(posted) AS posted FROM hiring WHERE poster ='".$_SESSION['member']."'";
   $result = mysqli_query($connect, $query);
   
  if(mysqli_num_rows($result)==0 )  {
      echo "You haven\'t posted anything yet.";
      echo footer();
      exit;
    }
 echo "<table>";
 echo "<thead>";
 echo "<tr><th>ID</th><th>Job Title</th><th>Posted On</th><th>Edit</th><th>Delete</th></tr></thead>"; 
 
 while($row = mysqli_fetch_array($result))  {
     echo '<tr><td>'.$row['id'].'</td>';
     echo "<td><a href='display.php?ID=$row[0]'>".$row['jbtitle']."</a></td>";
     echo "<td>".date("F dS Y, h:ia", $row["posted"])."</td>";
	 echo "<td><a href='edit.php?ID=$row[0]'>Update</td>";
	 echo "<td><a href='delete.php?ID=$row[0]'>Delete</td></tr>";
    }
	echo "</table>";
	                     
	echo footer();
 ?>                         
 