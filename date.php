<?php

$connect = mysqli_connect("localhost", "root", "", "smart_health");
$columns = array('user', 'Room', 'Department','participants','date','timeslot','title','choice','top');


$query = "SELECT * FROM bookings WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))	
{
 $query .= '
 
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR user LIKE "%'.$_POST["search"]["value"].'%" 
  OR Room LIKE "%'.$_POST["search"]["value"].'%" 
  OR Department LIKE "%'.$_POST["search"]["value"].'%"
    OR participants LIKE "%'.$_POST["search"]["value"].'%" 
	  OR date LIKE "%'.$_POST["search"]["value"].'%" 
	    OR timeslot LIKE "%'.$_POST["search"]["value"].'%" 
		  OR title LIKE "%'.$_POST["search"]["value"].'%" 
		    OR choice LIKE "%'.$_POST["search"]["value"].'%" 
			  OR top LIKE "%'.$_POST["search"]["value"].'%" )';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["id"];
 $sub_array[] = $row["user"];
 $sub_array[] = $row["Room"];
 $sub_array[] = $row["Department"];
 $sub_array[] = $row["participants"];
  $sub_array[] = $row["date"];
   $sub_array[] = $row["timeslot"];
    $sub_array[] = $row["title"];
	 $sub_array[] = $row["choice"];
	  $sub_array[] = $row["top"];
	
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM bookings";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
