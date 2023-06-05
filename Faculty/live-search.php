<?php
$search_term = $_POST["search"];

$conn = mysqli_connect("localhost", "root", "Nishant@12345", "dbtechneo") or die("Connection Failed");

$sql = "SELECT facultyId, facultyName, facultyMobileNo, facultyEmail, collegeName 
        FROM tblFaculty, tblCollege 
        WHERE tblFaculty.collegeId = tblCollege.collegeId 
        AND (facultyName LIKE '%{$search_term}%' OR 
             facultyMobileNo LIKE '%{$search_term}%' OR 
             facultyEmail LIKE '%{$search_term}%' OR 
             collegeName LIKE '%{$search_term}%')";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";

if (mysqli_num_rows($result) > 0) {
     $output = '<style>table {
    counter-reset: tableCount;     
}
.counterCell:before {              
    content: counter(tableCount); 
    counter-increment: tableCount; 
}</style><table id="datatableid" border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
                <th width="60px">Id</th>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>College Name</th>
                <th width="90px">View</th>
                <th width="90px">Edit</th>
                <th width="90px">Delete</th>
              </tr>';

     while ($row = mysqli_fetch_assoc($result)) {
          $output .= "<tr><td class='counterCell'></td><td>{$row["facultyName"]}</td><td>{$row["facultyMobileNo"]}</td><td>{$row["facultyEmail"]}</td><td>{$row["collegeName"]}</td><td><button type='button' class='btn btn-info viewbtn'> VIEW </button></td><td><a class='btn btn-success' name='editdata' href='edit.php?editid={$row["facultyId"]}'>Edit</a></td><td><a class='btn btn-danger' name='deletedata' href='delete.php?deleteid={$row["facultyId"]}'>Delete</a></td></tr>";
     }

     $output .= "</table>";

     mysqli_close($conn);

     echo $output;
} else {
     echo "<h2>No Record Found.</h2>";
}
?>


<script>
    $(document).ready(function(){
        $('.viewbtn').click(function(){
            var facultyName = $(this).closest('tr').find('td:eq(1)').text();
            var facultyMobileNo = $(this).closest('tr').find('td:eq(2)').text();
            var facultyEmail = $(this).closest('tr').find('td:eq(3)').text();
            var collegeName = $(this).closest('tr').find('td:eq(4)').text();
            
            var message = "Faculty Name: " + facultyName + "\n" +
                          "Mobile No: " + facultyMobileNo + "\n" +
                          "Email: " + facultyEmail + "\n" +
                          "College Name: " + collegeName;
            
            alert(message);
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

<script>
    function generatePDF() {
        const doc = new jsPDF();
        const table = document.getElementById('datatableid');
        const tableRows = table.rows;

        for(let i = 0; i < tableRows.length; i++) {
            const rowData = [];
            const tableCells = tableRows[i].cells;

            for(let j = 0; j < tableCells.length; j++) {
                rowData.push(tableCells[j].textContent);
            }

            doc.autoTable({
                body: [rowData]
            })
        }

        doc.save('table.pdf');
    }
</script>

<button onclick="generatePDF()">Generate PDF</button>
