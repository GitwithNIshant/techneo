<?php
include '../connection.inc.php';

$universityID = $_POST['university_data'];

$college = "SELECT * FROM tblCollege WHERE universityId = $universityID";
echo $universityId;
$college_qry = mysqli_query($conn, $college);


$output = '<option value="">Select College</option>';
while ($college_row = mysqli_fetch_assoc($college_qry)) {
    $output .= '<option value="' . $college_row['collegeID'] . '">' . $college_row['collegeName'] . '</option>';
}
echo $output;