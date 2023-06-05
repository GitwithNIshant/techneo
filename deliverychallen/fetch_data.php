

<script>
     // Create a new PDF document
var doc = new jsPDF();

// Add content to the PDF document
doc.text('datatableid_index:', 10, 10);
doc.text('datatableid:', 10, 50);
// Add data from table 1
// ...
// Add data from table 2
// ...

// Save the PDF document
doc.save('mydocument.pdf');
</script>