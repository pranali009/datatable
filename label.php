<?php
include 'config.php';
if (isset($_POST["id"])) {
    $resultArr = array();
    $query     = "SELECT * FROM base_label WHERE concept_id = '" . $_POST["concept_id"] . "'";
    $result    = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $resultArr[] = $row;
        }
        echo json_encode($resultArr);
    } else {
        echo "norows";
    }
}
?>