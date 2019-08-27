<?php
include 'config.php'; 
$sql = "SELECT id,concept_id,concept_name,concept_type,period_type FROM base_concept";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row    
    	$res['draw'] = 1;
		$res['recordsTotal'] = mysqli_num_rows($result);
		$res['recordsFiltered'] = mysqli_num_rows($result);
	    while($row = mysqli_fetch_assoc($result)) {
	    	$res['data'][] = $row;
	    }
	} else {
	    $res['data'][] = 0;
}
echo json_encode($res);
?>