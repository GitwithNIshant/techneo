<!DOCTYPE html>
<html>
<head>
  <!-- Include necessary CSS and JavaScript files -->
  <!-- Include necessary CSS and JavaScript files -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      min-width: 160px;
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg text-white navbar-light hover-zoom" style="background-color: #415ABE;">
     <div class="container-fluid">
          <a class="navbar-brand hover-zoom">Publication</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse text-white hover-zoom" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                         <a class="nav-link active text-white hover-zoom" href="/techneo/University/index.php">University</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active text-white" href="/techneo/College/index.php">College</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active text-white" href="/techneo/Faculty/index.php">Faculty</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active text-white" href="/techneo/Course/index.php">Course</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active text-white" href="/techneo/Book/index.php">Book</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active text-white" href="/techneo/purchaseorder/index.php">Purchase Order</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active text-white" href="/techneo/deliverychallen/index.php">Delivery Challan</a>
                    </li>
                    <ul class="nav">
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle active text-white" href="#" id="reportsDropdown" role="button"
                         aria-haspopup="true" aria-expanded="false">Reports</a>
                         <div class="dropdown-content">
                         <a class="dropdown-item" href="/techneo/facultywisereport/index.php">Faculty Wise Report</a>
                         <!-- <a class="dropdown-item" href="/techneo/coursewisereport/index.php">Course Wise Report</a> -->
                         </div>
                    </li>
                    </ul>


                    
               </ul>
               <ul class="navbar-nav topnav-right">
                    <li class="nav-item">
                         <a class="nav-link text-danger" href="logout.php?logout"><b>Logout</b></a>
                    </li>
               </ul>
          </div>
     </div>
</nav>
</body>
</html>