<?php
include 'config.php';
$sql    = "SELECT * FROM base_concept";
$result = mysqli_query($con, $sql);
require 'add.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
    <title>Concepts page</title>
</head>
<body>
    <section>
        <div class="container">
            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal" id="add-concept">Add Concept</button>
            <div class="table-responsive padd-top">
                <div id="example_wrapper" class="dataTables_wrapper">
                    <table id="example" class="display dataTable" style="width:100%" role="grid" aria-describedby="example_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 130.4px;">
                                Concept ID
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 216.8px;" id="concept_name">
                                Concept Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 96.8px;">
                                Concept Type
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 39.2px;">
                                Period Type
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>                        
                </tbody>
            </table>
        </div>
    </div>
</div>    
</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
            </div>
        
            <div class="modal-body">
                <p>Are you sure you want to delete this concept?</p>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="cancel-delete">Cancel</button>
                <a class="btn btn-danger btn-ok" id="yes-delete">Delete</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</body>
</html>