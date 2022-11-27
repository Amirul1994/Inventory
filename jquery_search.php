<?php
 $connect = mysqli_connect("localhost", "root", "", "inventorydb");
 $query ="SELECT * FROM `inventory` ORDER BY ID DESC";
 $result = mysqli_query($connect, $query);
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title></title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
           <style media="screen">
             table {
               border-collapse: collapse;
               width: 100%;
               color: #588c7e;
               font-family: monospace;
               font-size: 18px;
               text-align: left;
             }
             th {
               background-color: #588c7e;
               color: green;
               }

               tr:nth-child(even) {background-color: #f2f2f2}
           </style>
      </head>
      <body>
           <br /><br />
           <div class="container">
                <br />
                <div class="table-responsive">
                     <table id="employee_data" class="table table-striped table-bordered">
                          <thead>
                               <tr>
                                    <td>Name</td>
                                    <td>EID</td>
                                    <td>Department</td>
                                    <td>Designation</td>
                                    <td>Quantity</td>
                                    <td>Remarks</td>
                               </tr>
                          </thead>
                          <?php
                          while($row = mysqli_fetch_array($result))
                          {
                               echo '
                               <tr>
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["eid"].'</td>
                                    <td>'.$row["department"].'</td>
                                    <td>'.$row["designation"].'</td>
                                    <td>'.$row["quantity"].'</td>
                                    <td>'.$row["remarks"].'</td>
                               </tr>
                               ';
                          }
                          ?>
                     </table>
                </div>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){
          
    // Activate an inline edit on click of a table cell
    $('#employee_data').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    } );


      $('#employee_data').DataTable( );
 });
 </script>