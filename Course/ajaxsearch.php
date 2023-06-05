<?php

$search_value = $_POST["search"];

$conn = mysqli_connect("localhost", "root", "Nishant@12345", "dbtechneo") or die("Connection Failed");

$sql = "SELECT  courseId, courseName, courseShortCode FROM tblcourse WHERE courseName LIKE '%{$search_value}%' OR courseShortCode LIKE '%{$search_value}%' ";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if (mysqli_num_rows($result) > 0) {
     $output = '<style>table {
    counter-reset: tableCount;     
}
.counterCell:before {              
    content: counter(tableCount); 
    counter-increment: tableCount; 
}</style>
     <table table="jspdf" border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
                <th width="60px">Sr.No</th>
                <th>Course Name</th>
                <th>Course Shortcode</th>
                <th width="90px">VIEW</th>
                <th width="90px">EDIT</th>
                <th width="90px">DELETE</th>
              </tr>';

     while ($row = mysqli_fetch_assoc($result))
       
          {
          $output .= "<tr><td class='counterCell'></td><td>{$row["courseName"]}</td><td>{$row["courseShortCode"]}</td><td align='center'><button class='btn btn-info viewbtn' ='{$row["courseId"]}'>View</button></td><td align='center'><button class='btn btn-success' href='edit.php?editid='{$row["courseId"]}'>Edit</button></td><td align='center'><button Class='btn btn-danger deletebtn' data-id='{$row["courseId"]}'>Delete</button></td></tr>";
     }

     $output .= "</table>";

     mysqli_close($conn);

     echo $output;

} else {
     echo "<h2>No Record Found.</h2>";
}

?>