<html>
 <head>
  <title>How to use Tabledit plugin with jQuery Datatable in PHP Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
 </head>
 <body>
  <div class="container">
   <h3 align="center">How to use Tabledit plugin with jQuery Datatable in PHP Ajax</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">Employee Data</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table id="employee_data" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>ID</th>
         <th>Name</th>
         <th>E-ID</th>
         <th>Department</th>
         <th>Designation</th>
         <th>Laptop Model</th> 
         <th>Laptop S/N</th> 
         <th>Laptop Spec</th> 
         <th>Laptop Issue Date</th> 
         <th>Desktop Model</th> 
         <th>Desktop S/N</th>
         <th>Desktop Spec</th> 
         <th>Desktop Issue Date</th> 
         <th>IP Phone Model</th> 
         <th>IP Phone S/N</th> 
         <th>IP Phone Spec</th> 
         <th>IP Phone Issue Date</th> 
         <th>UPS Model</th> 
         <th>UPS S/N</th> 
         <th>UPS Spec</th> 
         <th>UPS Issue Date</th> 
         <th>Photocopier Model</th> 
         <th>Photocopier S/N </th> 
         <th>Photocopier Spec</th> 
         <th>Photocopier Issue Date</th> 
         <th>Printer Model</th> 
         <th>Printer S/N </th> 
         <th>Printer Spec</th> 
         <th>Printer Issue Date</th> 
         <th>Remarks</th> 
       </tr>
       </thead>
       <tbody></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
  <br />
  <br />
 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

 var dataTable = $('#employee_data').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   "url":"fetch.php",
   "type":"POST",
   "datatype": "json"
  }
 });

//  $('#employee_data').on('draw.dt', function(){
//   $('#employee_data').Tabledit({
//    url:'action.php',
//    dataType:'json',
//    columns:{
//     identifier : [0, 'id'],
//     editable:[[1, 'name'], [2, 'e_id'], [3, 'department'], [4, 'designation'], [5, 'laptop_model'], [6, 'laptop_s_n'], [7, 'laptop_spec'], 
//   [8, 'laptop_issue_date'], [9, 'desktop_model'], [10, 'desktop_s_n'], [11, 'desktop_spec'], [12, 'desktop_issue_date'], 
// [13, 'ip_phone_model'], [14, 'ip_phone_s_n'], [15, 'ip_phone_spec'], [16, 'ip_phone_issue_date'], [17, 'ups_model'], [18, 'ups_s_n'], 
// [19, 'ups_spec'], [20, 'ups_issue_date'], [21, 'photocopier_model'], [22, 'photocopier_s_n'], [23, 'photocopier_spec'], 
// [24, 'photocopier_issue_date'], [25, 'printer_model'], [26, 'printer_s_n'], [27, 'printer_spec'], [28, 'printer_issue_date'], [29, 'remarks']]
//    },
//    restoreButton:false,
//    onSuccess:function(data, textStatus, jqXHR)
//    {
//     if(data.action == 'delete')
//     {
//      $('#' + data.id).remove();
//      $('#employee_data').DataTable().ajax.reload();
//     }
//    }
//   });
//  });
  
}); 
</script>