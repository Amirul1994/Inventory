<?php 
   

   if (isset($_POST['submit'])) {
    # code...
   


   $name = $_POST['name']; 
   $e_id  = $_POST['e_id']; 
   $department = $_POST['department']; 
   $designation = $_POST['designation'];  
   $laptop_model = $_POST['laptop_model'];  
   $laptop_s_n = $_POST['laptop_s_n']; 
   $laptop_spec = $_POST['laptop_spec'];
   $laptop_issue_date = $_POST['laptop_issue_date'];
   $desktop_model = $_POST['desktop_model']; 
   $desktop_s_n = $_POST['desktop_s_n']; 
   $desktop_spec = $_POST['desktop_spec']; 
   $desktop_issue_date = $_POST['desktop_issue_date']; 
   $ip_phone_model = $_POST['ip_phone_model']; 
   $ip_phone_s_n = $_POST['ip_phone_s_n']; 
   $ip_phone_spec = $_POST['ip_phone_spec']; 
   $ip_phone_issue_date = $_POST['ip_phone_issue_date']; 
   $ups_model = $_POST['ups_model']; 
   $ups_s_n = $_POST['ups_s_n']; 
   $ups_spec = $_POST['ups_spec']; 
   $ups_issue_date = $_POST['ups_issue_date']; 
   $photocopier_model = $_POST['photocopier_model'];
   $photocopier_s_n = $_POST['photocopier_s_n']; 
   $photocopier_spec = $_POST['photocopier_spec']; 
   $photocopier_issue_date = $_POST['photocopier_issue_date']; 
   $printer_model =$_POST['printer_model']; 
   $printer_s_n = $_POST['printer_s_n']; 
   $printer_spec =$_POST['printer_spec']; 
   $printer_issue_date = $_POST['printer_issue_date'];
   $remarks = $_POST['remarks'];


// var_dump($name, $eid, $department, $designation,  $laptop_model, $laptop_s_n, $laptop_model, $laptop_issue_date, $desktop_model, $desktop_s_n, $desktop_spec, $desktop_issue_date,
//     $ip_phone_model, $ip_phone_model, $ip_phone_s_n, $ip_phone_issue_date, $ups_model, $ups_s_n, $ups_spec, $ups_issue_date, 
//     $photocopier_model, $photocopier_s_n, $photocopier_spec, $photocopier_issue_date, $printer_model, $printer_s_n, $printer_spec, $printer_issue_date, $remarks);
// exit();


   $con = mysqli_connect('localhost','root','','inventorydb');

  //  echo gettype($printer_issue_date);

  //  exit();

  
    $insert_data = "insert into inventory (name, e_id, department, designation, laptop_model,
    laptop_s_n, laptop_spec, laptop_issue_date, desktop_model, desktop_s_n, desktop_spec, desktop_issue_date,  
    ip_phone_model, ip_phone_s_n, ip_phone_spec, ip_phone_issue_date, ups_model, ups_s_n, ups_spec, ups_issue_date,
    photocopier_model,photocopier_s_n,photocopier_spec, photocopier_issue_date, printer_model, printer_s_n, printer_spec,
    printer_issue_date, remarks) 
    VALUES('$name', '$e_id', '$department', '$designation',  '$laptop_model', '$laptop_s_n', '$laptop_spec', '$laptop_issue_date', '$desktop_model', '$desktop_s_n', '$desktop_spec', '$desktop_issue_date',
    '$ip_phone_model',  '$ip_phone_s_n', '$ip_phone_spec', '$ip_phone_issue_date', '$ups_model', '$ups_s_n', '$ups_spec', '$ups_issue_date', 
    '$photocopier_model', '$photocopier_s_n', '$photocopier_spec', '$photocopier_issue_date', '$printer_model', '$printer_s_n', '$printer_spec', '$printer_issue_date', '$remarks'
    )";   
   
$run = mysqli_query($con, $insert_data);  

// var_dump($run);
// exit();

// mysqli_error - to collect the error. As the $con is working fine
// it has the information about what happening with $insert_data
// so it is mysqli_error($con)

if(!$run){
   echo 'somerer' . mysqli_error($con);
  exit();
}

// echo $run;

// var_dump($run);
// exit();

// if ($run == TRUE)
// {
//   echo "User data is successfully stored";
// }else{
//   echo "Error";
// }
   }


?>

<!DOCTYPE html> 
<html lang="en"> 
   
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>   
<form action="insert_data_2.php" method="post">
  <h1> <center>Inventory</center></h1>
  <section style="padding: UI20px;">
      <div class="container">
          <div class="row">
            <div class="row"> 
                  <div class="col-md-1 mb-3">
                  <p style="padding-top:.5rem;display:block">Name</p>
                  </div>
                  <div class="col-md-5 mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="" required>                  
                  </div>               
                </div>   
      
                <div class="row">
                  <div class="col-md-1 mb-3">
                  <p style="padding-top:.5rem;display:block"> E-ID </p>
                  </div>
              
                  <div class="col-md-5 mb-3">
                    <input type="text" class="form-control" id="e_id" name="e_id" placeholder="e_id" value="" required>                  
                  </div>               
                </div>   

                <div class="row">
                  <div class="col-md-1 mb-3">
                  <p style="padding-top:.5rem;display:block"> Department </p>
                  </div>
              
                  <div class="col-md-5 mb-3">
                    <input type="text" class="form-control" id="department" name="department" placeholder="department" value="" required>                  
                  </div>               
                </div>  

                <div class="row">
                  <div class="col-md-1 mb-2">
                  <p style="padding-top:.5rem;display:block"> Designation </p>
                  </div>
              
                  <div class="col-md-5 mb-2">
                    <input type="text" class="form-control" id="designation" name="designation" placeholder="designation" value="" required>                  
                  </div>               
                </div>
                  
                <div class="col-md-1 mb-2">
                  <p style="text-align:center; margin-top:1.5rem;font-weight: 500;text-align: left;">Device </h2>
                </div>
                  
                <div class="row">
                    <div class="col-md-1 mb-2">
                      <p style="text-align:center; margin-top:1.5rem;font-weight: 500;text-align: left;">Laptop </h2>
                    </div>
                    
                    <div class="col-md-2 mb-3"> 
                      <p style="text-align:center">
                      <label for="validationCustom01">Model</label> 
                      <input type="text" class="form-control" id="laptop_model" name="laptop_model" placeholder="laptop_model" value="" required>
                    </div>
                    
                    <div class="col-md-2 mb-3">
                      <p style="text-align:center">
                      <label for="validationCustom02">S/N</label>
                      <input type="text" class="form-control" id="laptop_s_n" name="laptop_s_n" placeholder="laptop_s_n" value="" required>
                    </div> 
                    
                    <div class="col-md-2 mb-3">
                      <p style="text-align:center">
                      <label for="validationCustom03">Spec</label>
                      <input type="text" class="form-control" id="laptop_spec" name="laptop_spec" placeholder="laptop_spec" value="" required>
                    </div>
                    
                    <div class="col-md-2 mb-3"> 
                      <p style="text-align:center">
                      <label for="validationCustom04">Issue Date</label>
                      <input type="date" class="form-control" id="laptop_issue_date" name="laptop_issue_date" placeholder="laptop_issue_date" value="" required>                    
                    </div> 
                  
                  </div> 
                  
                  <div class="row">
                    <div class="col-md-1 mb-4">
                      <p style="text-align:center; margin-top:.5rem;font-weight: 500;text-align: left;">Desktop</h2>
                    </div>
                    
                    <div class="col-md-2 mb-3"> 
                    <input type="text" class="form-control" id="desktop_model" name="desktop_model" placeholder="desktop_model" value="" required>
                    </div>
                    
                    <div class="col-md-2 mb-3"> 
                      <input type="text" class="form-control" id="desktop_s_n" name="desktop_s_n" placeholder="desktop_s_n" value="" required>
                    </div>  

                    <div class="col-md-2 mb-3"> 
                      <input type="text" class="form-control" id="desktop_spec" name="desktop_spec" placeholder="desktop_spec" value="" required>
                    </div> 

                    <div class="col-md-2 mb-3"> 
                      <input type="date" class="form-control" id="desktop_issue_date" name="desktop_issue_date" placeholder="desktop_issue_date" value="" required>
                    </div> 
                  </div> 

                  <div class="row">
                      <div class="col-md-1 mb-3">
                        <p style="text-align:center; margin-top: .6rem; font-weight: 500;text-align: left;">IP Phone</h2>
                      </div>
                    
                      <div class="col-md-2 mb-2"> 
                        <input type="text" class="form-control" id="ip_phone_model" name="ip_phone_model" placeholder="ip_phone_model" value="" required>
                      </div>
                      
                      <div class="col-md-2 mb-1"> 
                        <input type="text" class="form-control" id="ip_phone_s_n" name="ip_phone_s_n" placeholder="ip_phone_s_n" value="" required>
                      </div>  
    
                      <div class="col-md-2 mb-1"> 
                        <input type="text" class="form-control" id="ip_phone_spec" name="ip_phone_spec" placeholder="ip_phone_spec" value="" required>
                      </div> 
    
                      <div class="col-md-2 mb-1"> 
                        <input type="date" class="form-control" id="ip_phone_issue_date" name="ip_phone_issue_date" placeholder="ip_phone_issue_date" value="" required>
                      </div> 
                    
                  </div> 

                  <div class="row">
                    <div class="col-md-1 mb-3">
                      <p style="text-align:center; margin-top: .6rem; font-weight: 500;text-align: left;"> UPS </h2>
                    </div>
                  
                    <div class="col-md-2 mb-2"> 
                      <input type="text" class="form-control" id="ups_model" name="ups_model" placeholder="ups_model" value="" required>
                    </div>
                    
                    <div class="col-md-2 mb-1"> 
                      <input type="text" class="form-control" id="ups_s_n" name="ups_s_n" placeholder="ups_s_n" value="" required>
                    </div>  
  
                    <div class="col-md-2 mb-1"> 
                      <input type="text" class="form-control" id="ups_spec" name="ups_spec" placeholder="ups_spec" value="" required>
                    </div> 
  
                    <div class="col-md-2 mb-1"> 
                      <input type="date" class="form-control" id="ups_issue_date" name="ups_issue_date" placeholder="ups_issue_date" value="" required>
                    </div> 
                  
                </div>       

                <div class="row">
                  <div class="col-md-1 mb-3">
                    <p style="text-align:center; margin-top: .6rem; font-weight: 500;text-align: left;"> Photocopier </h2>
                  </div>
                
                  <div class="col-md-2 mb-2"> 
                    <input type="text" class="form-control" id="photocopier_model" name="photocopier_model" placeholder="photocopier_model" value="" required>
                  </div>
                  
                  <div class="col-md-2 mb-1"> 
                    <input type="text" class="form-control" id="photocopier_s_n" name="photocopier_s_n" placeholder="photocopier_s_n" value="" required>
                  </div>  

                  <div class="col-md-2 mb-1"> 
                    <input type="text" class="form-control" id="photocopier_spec" name="photocopier_spec" placeholder="photocopier_spec" value="" required>
                  </div> 

                  <div class="col-md-2 mb-1"> 
                    <input type="date" class="form-control" id="photocopier_issue_date" name="photocopier_issue_date" placeholder="photocopier_issue_date" value="" required>
                  </div> 
                
              </div>   

              <div class="row">
                <div class="col-md-1 mb-3">
                  <p style="text-align:center; margin-top: .6rem; font-weight: 500;text-align: left;"> Printer </h2>
                </div>
              
                <div class="col-md-2 mb-2"> 
                  <input type="text" class="form-control" id="printer_model" name="printer_model" placeholder="printer_model" value="" required>
                </div>
                
                <div class="col-md-2 mb-1"> 
                  <input type="text" class="form-control" id="printer_s_n" name="printer_s_n" placeholder="printer_s_n" value="" required>
                </div>  

                <div class="col-md-2 mb-1"> 
                  <input type="text" class="form-control" id="printer_spec" name="printer_spec" placeholder="printer_spec" value="" required>
                </div> 

                <div class="col-md-2 mb-1"> 
                  <input type="date" class="form-control" id="printer_issue_date" name="printer_issue_date" placeholder="printer_issue_date" value="" required>
                </div> 
              
            </div>
                  
                  <!-- <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                      <label class="form-check-label" for="invalidCheck" style="color:darkred">
                        Agree to terms and conditions
                      </label>
                      <div class="invalid-feedback">
                        You must agree before submitting.
                      </div>
                    </div>
                  </div> --> 

                  <div class="row">
                    <div class="col-md-1 mb-3">
                    <p style="padding-top:.5rem;display:block"> Remarks </p>
                    </div>
                
                    <div class="col-md-8 mb-3">
                      <input type="text" class="form-control" id="remarks" name="remarks" placeholder="remarks" value="" required>                  
                    </div>               
                  </div>
                
                  <div class="row text-center">
                      <div class="col">
                          <button class="btn btn-primary" style="width: 100%;" id="submit" name="submit" type="submit">Submit form</button>
                      </div>
                      <!-- <div class="col"> 
                          <button class="btn btn-danger" style="width: 100%;" type="cancel">Cancel</button>
                      </div> -->
                  </div>
                  
                <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                  'use strict';
                  window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                      form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                          event.preventDefault();
                          event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                      }, false);
                    });
                  }, false);
                })();
                </script>
          </div>
      </div>
  </section> 
</form>



    
</body>
</html>