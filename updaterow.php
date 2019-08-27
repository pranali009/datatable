<?php
include 'config.php';
if (isset($_POST["id"])) {
    $concept_id   = mysqli_real_escape_string($con, $_POST["concept_id"]);
    $concept_name = mysqli_real_escape_string($con, $_POST["concept_name"]);
    $concept_type = mysqli_real_escape_string($con, $_POST["concept_type"]);
    $period_type  = mysqli_real_escape_string($con, $_POST["period_type"]);
    
    $query = "UPDATE base_concept SET concept_id='" . $concept_id . "', concept_name='" . $concept_name . "', concept_type='" . $concept_type . "', period_type='" . $period_type . "'WHERE id = '" . $_POST["id"] . "'";
    if (mysqli_query($con, $query)) {
        echo 'Data Updated';
    }
}
?>