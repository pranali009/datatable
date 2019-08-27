<?php
include 'config.php';

if (isset($_POST["id"])) {
    $query = "DELETE FROM base_concept  WHERE id = '" . $_POST["id"] . "'";
    if (mysqli_query($con, $query)) {
        echo 'Data Deleted';
    }
}

?>