<?php
class SearchClass{

  private $classTable = 'classes';	
	private $connect;

public function get_total_row(){
  $query = "SELECT * FROM classes";
  $statement = $connect->prepare($query);
  $statement->execute();
  return $statement->rowCount();
  $total_record = get_total_row($connect);  
}   
public function __construct($db){
  $this->connect = $db;
}

public function getClasses() {	
$limit = '5';
$page = 1;
if($_POST['page'] >= 1){
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else{
  $start = 0;
}

$query = "SELECT * FROM ".$this->classTable;


if($_POST['query'] != ''){
  $query .= ' WHERE name_class LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
              OR spec_class LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
              OR role_class LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" ';
}


$query .= ' ORDER BY id_class ASC ';
$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $this->connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $this->connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '<label class="my-2">Total Records - '.$total_data.'</label>
<table class="table table-striped mt-4 text-center align-middle">
  <tr class="table-color">
  <th>Icon</th>
  <th>Classes</th>
  <th>Specializations</th>
  <th>Roles</th>
  </tr>';
if($total_data > 0){
  foreach($result as $row){
    $output .= '
    <tr>
      <td><img src=assets/img/class_specs/'.$row["img_class"].'></td>
      <td>'.$row["name_class"].'</td>
      <td>'.$row["spec_class"].'</td>
      <td>'.$row["role_class"].'</td>
    </tr>';
  }
}
else{
  $output .= '
  <tr>
    <td colspan="4" align="center">No Data Found</td>
  </tr>';
}

$output .= '
</table>
<br />
<div align="center" class=" d-flex justify-content-center">
  <ul class="pagination">';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4){
  if($page < 5){
    for($count = 1; $count <= 5; $count++){
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else{
    $end_limit = $total_links - 5;
    if($page > $end_limit){
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++){
        $page_array[] = $count;
      }
    }
    else{
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++){
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else{
  for($count = 1; $count <= $total_links; $count++){
    $page_array[] = $count;
  }
}
if(!empty($page_array)){
for($count = 0; $count < count($page_array); $count++){
  if($page == $page_array[$count]){
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="">'.$page_array[$count].' <span class="sr-only"></span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0){
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else{
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links){
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="">Next</a>
      </li>
        ';
    }
    else{
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else{
    if($page_array[$count] == '...'){
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="">...</a>
      </li>
      ';
    }
    else{
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}
} 
else{
  error_reporting(0);
}
$output .= $previous_link . $page_link . $next_link;
$output .= '</ul></div>';
echo $output;
}
}
?>