<?php
use Mpdf\Tag\H3;

require('vendor/autoload.php');
$con = mysqli_connect('localhost', 'root', 'Nishant@12345', 'dbtechneo');
$res = mysqli_query($con, "select * from tblUniversity");
if (mysqli_num_rows($res) > 0) {
     $html = '<style>
table, th, td {
  border:1px solid black;
  border-collapse: collapse;
   border: 1px solid;
}
.th{
background color: greay;   
.img{
     position: absosute;   
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.h3{
     display: block;
}
</style>
<img src="../img/techneo.jpeg" alt="techneo" width="10%" height="-10%" class="center" style="display: block;"/>
<h1>Techneo Publisher</h1>
<h3>University Table Informaion</h3>
<table class="table">';
     $html .= '<b><tr><td bgcolor="grey">ID</td><td bgcolor="grey">University Name</td><td bgcolor="grey">University ShortCode</td></tr></th></b>';
     while ($row = mysqli_fetch_assoc($res)) {
          $html .= '<tr><td>' . $row['universityID'] . '</td><td>' . $row['universityName'] . '</td><td>' . $row['universityShortCode'] . '</td></tr>';
     }
     $html .= '</table>';
} else {
     $html = "Data not found";
}
$html .= '<h3>Thank You...</h3>';
// $html .= '<a href="https://scms.techneoapp.in/">techneo</a>';
// $html .= '<a href="tel:919824306093">9284306093</a>';
// $html .= '<a href="tel:123-456-7890">CLICK TO CALL</a>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = 'media/' . time() . '.pdf';
$mpdf->output($file, 'I');
//D
//I
//F
//S
?>