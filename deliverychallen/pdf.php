<?php


require_once('vendor/autoload.php');
require_once('fpdf185/fpdf.php');

use setasign\Fpdi\Fpdi;

$date = date('Ymd_His');
$pdf  = new Fpdi();
$pdf->setSourceFile('TechNeoPublisher.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->addPage();
$pdf->useTemplate($tplIdx, 0, 0, 210);
// Set the font and size for the header
$pdf->SetFont('Arial', 'B', 25);
// Connect to MySQL database
$mysqli = new mysqli('localhost', 'root', 'Nishant@12345', 'dbtechneo');

// Retrieve the ID value from the URL parameter
// $MAX_ID = $_GET['maxpid'];

// Use the ID to retrieve data from the database or perform other actions
// echo 'The ID value is: ' . $MAX_ID;


if ($_SERVER["REQUEST_METHOD"] == 'GET') {
     if (!isset($_GET['id'])) {
          header("location:index.php");
          exit;
     }
     $id        = $_GET['id'];
     $dcidquery = "select max(Dcid) as maxpid from tbldeliverychallan;";
     $Dcid_qry  = mysqli_query($mysqli, $dcidquery);
     while ($row = mysqli_fetch_assoc($Dcid_qry)):
          $maxDcid = $row['maxpid'];
     endwhile;



     // Retrieve data from the database
     $result = $mysqli->query("SELECT 
                tbldeliveryitem.Dcid,
                tbldeliverychallan.collegeID,
                tblcollege.collegeName,
                Dcdate,
                tbldeliveryitem.facultyID, 
                tblfaculty.facultyName, 
                tbldeliveryitem.bookID, 
                tblbook.bookName, 
                deliveryquentity 
                FROM 
                tbldeliveryitem, 
                tbldeliverychallan,  
                tblcollege, 
                tblbook, 
                tblfaculty 
                WHERE 
                tbldeliveryitem.Dcid = tbldeliverychallan.Dcid 
                AND tbldeliveryitem.bookID = tblbook.bookID   
                AND tbldeliveryitem.facultyID = tblfaculty.facultyID 
                AND tbldeliverychallan.collegeID = tblcollege.collegeID 
                AND tbldeliveryitem.Dcid = $maxDcid;");

     $challan_data = $result->fetch_assoc();

     // Create a new PDF document



     // Add the header text
// $pdf->Cell(0, 10, 'TechNeo Publisher', 0, 1, 'C');
     $pdf->Ln();
     $pdf->SetFont('Arial', '', 13);
     $pdf->SetXY(53, 65);
     $pdf->Cell(50, 10, '' . $challan_data['Dcid'], 0, 0, 'C');
     $pdf->SetFont('Arial', '', 13);
     $pdf->SetXY(80, 65);
     $pdf->Cell(210, 10, '' . $challan_data['Dcdate'], 0, 1, 'C');
     $pdf->SetFont('Arial', '', 13);
     $pdf->SetXY(50, 75);
     $pdf->Cell(80, 10, '' . $challan_data['collegeName'], 0, 0, 'C');

     // Add a line break
     $pdf->Ln();
     $pdf->Ln();

     // Set the font and size for the table headers
// $pdf->SetFont('Arial', 'B', 12);
// $pdf->Cell(20, 10, 'Sr. No.', 1, 0,'C');
// $pdf->Cell(85, 10, 'Book Name', 1, 0, 'C');
// $pdf->Cell(30, 10, 'Quantity', 1, 0, 'C');
// $pdf->Ln();

     // Set the font and size for the table data
     $pdf->SetFont('Arial', '', 12);

     // Retrieve the delivery data from the database
     $result = $mysqli->query("SELECT 
                tbldeliveryitem.Dcid,
                tbldeliverychallan.collegeID,
                tblcollege.collegeName,
                Dcdate,
                tbldeliveryitem.facultyID, 
                tblfaculty.facultyName, 
                tbldeliveryitem.bookID, 
                tblbook.bookName, 
                deliveryquentity 
                FROM 
                tbldeliveryitem, 
                tbldeliverychallan,  
                tblcollege, 
                tblbook, 
                tblfaculty 
                WHERE 
                tbldeliveryitem.Dcid = tbldeliverychallan.Dcid 
                AND 
                tbldeliveryitem.bookID = tblbook.bookID 
                AND 
                tbldeliveryitem.facultyID = tblfaculty.facultyID 
                AND tbldeliverychallan.collegeID = tblcollege.collegeID 
                AND 
                tbldeliveryitem.Dcid = $id;");
     $i      = 1;
     $y      = 95;
     while ($row = $result->fetch_assoc()) {
          $pdf->SetFont('Arial', '', 13);
          $pdf->SetXY(22, $y);
          $pdf->Cell(20, 10, $i, 0, 0, 'C');
          $pdf->SetFont('Arial', '', 13);
          $pdf->SetXY(38, $y);
          $pdf->Cell(85, 10, $row['bookName'], 0, 0, 'C');
          $pdf->SetFont('Arial', '', 13);
          $pdf->SetXY(135, $y);
          $pdf->Cell(30, 10, $row['deliveryquentity'], 0, 0, 'C');
          $pdf->Ln();
          $i++;
          $y = $y + 7;
     }
     // ob_end_clean();
// Output the PDF document
//$pdf->AutoPrint();

     // $pdf->Output('techneo_' . $date . '.pdf', 'I');

     // Output the PDF to the browser
     $pdf->Output('I');

     // Add JavaScript to pop up the print dialog
     echo '<script type="text/javascript">';
     echo 'window.addEventListener("load", function() {';
     echo 'window.print();';
     echo '});';
     echo '</script>';

     // for save file indatetime format
// 'techneo_'.$date.'.pdf','I'
}

// Add new content to the PDF
// $pdf->SetFont('Arial', '', 13);
// $pdf->SetXY(75, 64);
// $pdf->Cell(210, 12 , 'Hello World!', 0);

// $pdf->Output();
?>