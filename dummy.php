<?php 

// Clear output buffer to prevent any unwanted output
ob_end_clean();


// Include the TCPDF library
require_once('vendor/autoload.php');

// Instantiate and use the TCPDF class 
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Go Liberty');
$pdf->SetSubject('HTML to PDF Conversion');

// Add a page
$pdf->AddPage();

// Set the font for the content
$pdf->SetFont('helvetica', '', 12);

// Your HTML content
$html = '
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>go liberty</title>

    <style>
/* General Styles */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Ensure images scale properly */
img {
  max-width: 100%;
  height: auto;
}

/* Table Styling */
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

thead th {
  text-align: left;
  background-color: #007bff;
  color: white;
  padding: 8px;
}

tbody td {
  padding: 8px;
  border: 1px solid #ddd;
}

tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

tbody tr td:last-child {
  text-align: right;
}

/* Row with Images */
.row {
  display: flex;
  flex-wrap: wrap;
  margin-left: -10px;
  margin-right: -10px;
}

.row > [class^="col-"] {
  padding-left: 10px;
  padding-right: 10px;
  flex: 1;
  max-width: 33.333%;
  box-sizing: border-box;
}

/* Adjust image container */
.row img {
  display: block;
  margin: 0 auto;
  max-height: 100px;
}

/* Center align date */
.row p {
  text-align: center;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
  .row {
    flex-direction: column;
    margin-left: 0;
    margin-right: 0;
  }

  .col-4, .col-6, .col-10, .col-1, .col-7 {
    flex: 1 0 100%;
    max-width: 100%;
    padding: 0 10px;
  }

  h3, h4, h5, p {
    text-align: center;
  }

  .table {
    font-size: 0.9rem;
  }
}

@media (max-width: 576px) {
  .table {
    font-size: 0.8rem;
  }

  .row {
    margin: 0;
  }
}

    </style>

  </head>
  <body>
  
    <br>
    <br>

    <div class="row" style="margin-left: 10px; margin-right: 10px;">
        <div class="col-4">
            <img src="world-map.png"  class="img-fluid" style="max-height:100px;">
        </div>
        <div class="col-4">
            <img src="liberty.png"  class="img-fluid" style="max-height:100px;">
        </div>
        <div class="col-4">
            <br>
            <p>
                Date
            </p>
        </div>
    </div>
  
    <br>
    <br>

    <div class="row">
        <div class="col-4"></div>
        <div class="col-6">
                <h3>Quote Invoice</h3>
                <br>
                <h5>Document To: </h5> 
                <h5>Bill To: </h5>
                <h5>Address: </h5>
        </div>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-1"></div>
    <div class="col-4">
        <h4>RECIPIENT: </h4>
    </div>
    <div class="col-7"></div>
    </div>

    <br>
    <br>


    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">

            <table class="table">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">go-liberty Boarding School software access</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                    
                  <tr>
                    <td>FULL Access - all features package (13 months)</td>
                    <td>X 1</td>
                    <td>US$ 4800</td>
                    <td>US$ 4800</td>
                  </tr>

                  <tr>
                    <td style="color: rgb(233, 102, 124);">
                      Thank you for your time & consideration
                    </td>
                    <td></td>
                    <td>
                      <b>TOTAL</b>
                    </td>
                    <td>
                      <b>US$ 4800</b>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
            

        </div>
        <div class="col-1"></div>
    </div>


   </body>
</html>
';

// Convert the HTML to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// set headers
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="example.pdf"');
header('Cache-Control: no-cache, no-store, must-revalidate'); // Prevent caching of the PDF
header('Pragma: no-cache'); // For HTTP/1.0 compatibility
header('Expires: 0'); // Set expiration time

// Output PDF directly to browser (this will trigger the download)
$pdf->Output('php://output.pdf', 'D');  // 'D' forces download

?>
