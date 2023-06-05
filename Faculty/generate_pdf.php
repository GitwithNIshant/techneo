<?php
ob_start(); // start output buffering
// your code here

require('fpdf185/fpdf.php');

// Connect to database and execute search query
$search_term = $_POST["search"];
$conn = mysqli_connect("localhost", "root", "Nishant@12345", "dbtechneo") or die("Connection Failed");

// Check if a row number was provided in the query string
if (isset($_GET['row'])) {
     $row_num = $_GET['row'];
     $sql     = "SELECT facultyId, facultyName, facultyMobileNo, facultyEmail, collegeName 
          FROM tblFaculty, tblCollege 
          WHERE tblFaculty.collegeId = tblCollege.collegeId 
          AND facultyId = {$row_num}";
} else {
     $sql = "SELECT facultyId, facultyName, facultyMobileNo, facultyEmail, collegeName 
          FROM tblFaculty, tblCollege 
          WHERE tblFaculty.collegeId = tblCollege.collegeId 
          AND (facultyName LIKE '%{$search_term}%' OR 
               facultyMobileNo LIKE '%{$search_term}%' OR 
               facultyEmail LIKE '%{$search_term}%' OR 
               collegeName LIKE '%{$search_term}%')";
}

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

// Initialize FPDF object
$pdf = new FPDF();
$pdf->AddPage();

// Set up table header
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 7, 'No.', 1);
$pdf->Cell(40, 7, 'Name', 1);
$pdf->Cell(30, 7, 'Mobile Number', 1);
$pdf->Cell(60, 7, 'Email', 1);
$pdf->Cell(50, 7, 'College Name', 1);
$pdf->Ln();

// Add data rows to table
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
     $i++;
     $pdf->SetFont('Arial', '', 12);
     $pdf->Cell(10, 7, $i, 1);
     $pdf->Cell(40, 7, $row["facultyName"], 1);
     $pdf->Cell(30, 7, $row["facultyMobileNo"], 1);
     $pdf->Cell(60, 7, $row["facultyEmail"], 1);
     $pdf->Cell(50, 7, $row["collegeName"], 1);
     $pdf->Ln();
}

// Output PDF to browser
$pdf->Output();
mysqli_close($conn);
ob_clean(); // clear output buffer

?>