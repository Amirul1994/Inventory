<?php

//fetch.php

include('connection.php');

$column = array("id", "name", "e_id", "department", "designation", "laptop_model", "laptop_s_n", "laptop_spec", "laptop_issue_date",
"desktop_model", "desktop_s_n", "desktop_spec", "desktop_issue_date", "ip_phone_model", "ip_phone_s_n", "ip_phone_spec", "ip_phone_issue_date", 
"ups_model", "ups_s_n", "ups_spec", "ups_issue_date", "photocopier_model", "photocopier_s_n", "photocopier_spec", "photocopier_issue_date", 
"printer_model", "printer_s_n", "printer_spec", "printer_issue_date", "remarks"); # $column will return number for sort and based on that number
#we will get table column name  

$query = "SELECT * FROM inventory ";


$result = mysqli_query($con, $query);


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    echo json_encode($row) ;
  }
} else {
  echo "0 results";
}

mysqli_close($con);

// exit();


// if(isset($_POST["search"]["value"]))
// { 
//     # LIKE query is used to search exact value from a table
//  $query .= '
//  WHERE name LIKE "%'.$_POST["search"]["value"].'%" 
//  OR e_id LIKE "%'.$_POST["search"]["value"].'%" 
//  OR department LIKE "%'.$_POST["search"]["value"].'%" 
//  OR designation LIKE "%'.$_POST["search"]["value"].'%" 
//  OR laptop_model LIKE "%'.$_POST["search"]["value"].'%" 
//  OR laptop_s_n LIKE "%'.$_POST["search"]["value"].'%" 
//  OR laptop_spec LIKE "%'.$_POST["search"]["value"].'%" 
//  OR laptop_issue_date LIKE "%'.$_POST["search"]["value"].'%" 
//  OR desktop_model LIKE "%'.$_POST["search"]["value"].'%" 
//  OR desktop_s_n LIKE "%'.$_POST["search"]["value"].'%" 
//  OR desktop_spec LIKE "%'.$_POST["search"]["value"].'%"
//  OR desktop_issue_date LIKE "%'.$_POST["search"]["value"].'%"
//  OR ip_phone_model LIKE "%'.$_POST["search"]["value"].'%" 
//  OR ip_phone_s_n LIKE "%'.$_POST["search"]["value"].'%" 
//  OR ip_phone_spec LIKE "%'.$_POST["search"]["value"].'%" 
//  OR ip_phone_issue_date LIKE "%'.$_POST["search"]["value"].'%"
//  OR ups_model LIKE "%'.$_POST["search"]["value"].'%" 
//  OR ups_s_n LIKE "%'.$_POST["search"]["value"].'%" 
//  OR ups_spec LIKE "%'.$_POST["search"]["value"].'%" 
//  OR ups_issue_date "%'.$_POST["search"]["value"].'%" 
//  OR photocopier_model "%'.$_POST["search"]["value"].'%" 
//  OR photocopier_s_n "%'.$_POST["search"]["value"].'%" 
//  OR photocopier_spec "%'.$_POST["search"]["value"].'%" 
//  OR photocopier_issue_date "%'.$_POST["search"]["value"].'%" 
//  OR printer_model "%'.$_POST["search"]["value"].'%"
//  OR printer_s_n "%'.$_POST["search"]["value"].'%" 
//  OR printer_spec "%'.$_POST["search"]["value"].'%" 
//  OR printer_issue_date "%'.$_POST["search"]["value"].'%" 
//  OR remarks "%'.$_POST["saerch"]["value"].'%"
//  ';
// }

// if(isset($_POST["order"]))
// {
//     # The ORDER BY keyword is used to sort the result-set in ascending or descending order.
//  $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
// }
// else
// {
//  $query .= 'ORDER BY id DESC ';
// }
// $query1 = '';

// // if($_POST["length"] != -1)
// // {
// //      # here  $_POST['start'] and $_POST['length'] has been post by data tables
// //  $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
// // } 

// # Here query is stored in two different variables 
// # from $query variable I will get number of filter data 
// # and from combination of both  query I will make complete query for fetch data from sample table 

// # $query is executed to get number of filter records. For this here I have $statement 

// # https://www.youtube.com/watch?v=O9lvXlZWVSk


// $statement = $con->prepare($query);

// $statement->execute();

// // $number_filter_row = $statement->rowCount();

// // $statement = $con->prepare($query . $query1);

// // $statement->execute();
// $result = $statement->fetchAll();


// var_dump($statement);
// exit();

// $result = $statement->fetchAll();

// $data = array();

// foreach($result as $row)
// {
//  $sub_array = array();
//  $sub_array[] = $row['id'];
//  $sub_array[] = $row['name'];
//  $sub_array[] = $row['e_id'];
//  $sub_array[] = $row['department']; 
//  $sub_array[] = $row['designation'];
//  $sub_array[] = $row['laptop_model']; 
//  $sub_array[] = $row['laptop_s_n'];
//  $sub_array[] = $row['laptop_spec']; 
//  $sub_array[] = $row['laptop_issue_date'];
//  $sub_array[] = $row['desktop_model']; 
//  $sub_array[] = $row['desktop_s_n']; 
//  $sub_array[] = $row['desktop_spec']; 
//  $sub_array[] = $row['desktop_issue_date']; 
//  $sub_array[] = $row['ip_phone_model'];
//  $sub_array[] = $row['ip_phone_s_n']; 
//  $sub_array[] = $row['ip_phone_spec'];
//  $sub_array[] = $row['ip_phone_issue_date']; 
//  $sub_array[] = $row['ups_model']; 
//  $sub_array[] = $row['ups_s_n']; 
//  $sub_array[] = $row['ups_spec']; 
//  $sub_array[] = $row['ups_issue_date']; 
//  $sub_array[] = $row['photocopier_model']; 
//  $sub_array[] = $row['photocopier_s_n'];
//  $sub_array[] = $row['photocopier_spec'];
//  $sub_array[] = $row['photocopier_issue_date']; 
//  $sub_array[] = $row['printer_model'];
//  $sub_array[] = $row['printer_s_n'];
//  $sub_array[] = $row['printer_spec'];
//  $sub_array[] = $row['printer_issue_date']; 
//  $sub_array[] = $row['remarks'];
//  $data[] = $sub_array;
// }

// function count_all_data($con)
// {
//  $query = "SELECT * FROM inventory";
//  $statement = $con->prepare($query);
//  $statement->execute();
//  return $statement->rowCount();
// }

// $output = array( 
//     //associative array
//  'draw'   => intval($_POST['draw']),
//  'recordsTotal' => count_all_data($con),
//  'recordsFiltered' => 10,
//  'data'   => $data
// );

// # Send $output = .... data to Ajax request in JSON format 
// # I have to write JSON encode function
// echo json_encode($output);

// ?>