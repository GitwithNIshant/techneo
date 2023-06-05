<?php
include '../connection.inc.php';

$universityId =  $_POST['university_data'];

$college = "SELECT * FROM tblCollege WHERE universityId = $universityId";
echo $universityId;
$college_qry = mysqli_query($conn, $college);


$output = '<option value="">Select College</option>';
while ($college_row = mysqli_fetch_assoc($college_qry)) {
    $output .= '<option value="' . $college_row['collegeId'] . '">' . $college_row['collegeName'] . '</option>';
}
echo $output;