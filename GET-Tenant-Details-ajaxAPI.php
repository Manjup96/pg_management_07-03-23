<?php

 header('Access-Control-Allow-Origin:*');  
    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
     header('Content-Type: application/json');


## Database configuration
include('config.php');

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($conn,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (tenant_name like '%".$searchValue."%' or 
        tenant_email like '%".$searchValue."%' or 
        tenant_mobile like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from tenant_registration_without_image");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from tenant_registration_without_image WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from tenant_registration_without_image WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

$d = '<button>DElete</button>';

$e = '<Button style="margin-right:10px;border-color:white" onclick="edit_row(${r.id})">
                <i class="fa fa-edit btn-outline-primary"></i></Button>';
                
 $d= '<Button style="margin-right:10px;border-color:white" onclick="delete_row(${r.id})">
             <i class="fa fa-trash btn-outline-danger"></i></Button>';
             
while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
      "tenant_name"=>$row['tenant_name'],
      "tenant_email"=>$row['tenant_email'],
      "tenant_mobile"=>$row['tenant_mobile'],
      "joining_date"=>$row['joining_date'],
      "comments"=>$row['comments'],
      "action" =>  $d . $e,
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);


?>
<?php
// include("config.php");

       
//     header('Access-Control-Allow-Origin:*');  
//     header('Access-Control-Allow-Headers:*');
//     header('Access-Control-Allow-Credentials: true');
//     header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE');
//      header('Content-Type: application/json');
     

// if (isset($_POST['action']) && !empty($_POST['action'])) {
//     $action = $_POST['action'];
//     switch ($action) {
//         case 'getEMP' :
//             getEMP($conn);
//             break;
//         case 'getProd' :
//             getProducts($conn);
//             break;
//         // ...etc...
//     }
// }



// function getEMP($conn)
// {
// // storing  request (ie, get/post) global array to a variable
//     $requestData = $_REQUEST;
//     $columns = array(
// // datatable column index  => database column name
//         0 => 'tenant_name',
//         1 => 'tenant_email',
//         2 => 'tenant_mobile',
//         4 => 'joining_date',
//         5 => 'comments'
        
        
//     );
// // getting total number records without any search
//     $sql = "SELECT tenant_name, tenant_email, tenant_mobile, joining_date, comments ";
//     $sql .= " FROM tenant_registration_without_image orderby joining_date" ;
//     $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");
//     $totalData = mysqli_num_rows($query);
//     $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
//     $sql = "SELECT tenant_name, tenant_email, tenant_mobile, joining_date, comments  ";
//     $sql .= " FROM tenant_registration_without_image WHERE 1=1";
//     if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
//         $sql .= " AND ( tenant_name LIKE '" . $requestData['search']['value'] . "%' ";
//         $sql .= " OR tenant_email LIKE '" . $requestData['search']['value'] . "%' ";
//         $sql .= " OR tenant_mobile LIKE '" . $requestData['search']['value'] . "%' )";
//          $sql .= " OR joining_date LIKE '" . $requestData['search']['value'] . "%' )";
//     }
//     $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");
//     $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
//     $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
//     /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length. */
//     $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");
//     $data = array();
//     while ($row = mysqli_fetch_array($query)) {  // preparing an array
//         $nestedData = array();
//         $nestedData[] = $row["tenant_name"];
//         $nestedData[] = $row["tenant_email"];
//         $nestedData[] = $row["tenant_mobile"];
//          $nestedData[] = $row["joining_date"];
//           $nestedData[] = $row["comments"];
//         $data[] = $nestedData;
//     }
//     $json_data = array(
//         "draw" => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
//         "recordsTotal" => intval($totalData),  // total number of records
//         "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
//         "data" => $data   // total data array
//     );
//     echo $json_data;
//     echo json_encode($json_data);  // send data as json format
// }
?>


