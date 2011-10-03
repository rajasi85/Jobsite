<?
 include_once('connect.php');
 //tracks movements across the site
 session_start();
 
$title = "jobsite | Post a Job vacancy";
$description = "job vacancies editor";
$keywords = "We are hiring, we have this and this job,blah blah";

require_once('function.php');
//html header
echo head($title,$keywords,$description);
      

       $id = intval($_REQUEST['ID']);
	   $query = "SELECT id,company_name, jbtitle, job_desc, poster, job_req, location, contact_details, category, UNIX_TIMESTAMP(posted) AS posted FROM hiring WHERE id = $id";
	   $result= mysqli_query($connect, $query) or die(mysqli_error($connect));
	   
	   if(mysqli_num_rows($result)==0) {
	     die('No record of the data you requested exists in our database');
		}
        $row = mysqli_fetch_array($result);
        echo "<h1>".$row["jbtitle"]."</h1>";
        echo "<p><u><b>Posted by</b>       </u>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>".$row["poster"]."</strong> on ". date("F dS Y, h:ia", $row["posted"])."</p>";
		echo "<p><u><b>Job description</b> </u>:&nbsp;&nbsp;&nbsp;".$row["job_desc"]."</p>";
		echo "<p><u><b>Requirements</b>    </u>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["job_req"]."</p>";
        echo "<p><u><b>Company Name</b>    </u>:&nbsp;&nbsp;<strong>".$row["company_name"]."</strong></p>";
        echo "<p><u><b>Contact</b>         </u>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["contact_details"]."</p>";
		echo "<p><u><b>Job Category</b>    </u>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["category"]."</p>";
		echo "<p><u><b>Location</b>        </u>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>".$row["location"]."</strong></p>";
		
		
		//footer
	echo footer();

?>	