<?php
if (isset($_POST["submit"])) {
    
    $concept_id   = mysqli_real_escape_string($con, $_POST["concept_id"]);
    $concept_name = mysqli_real_escape_string($con, $_POST["concept_name"]);
    $concept_type = mysqli_real_escape_string($con, $_POST["concept_type"]);
    $period_type  = mysqli_real_escape_string($con, $_POST["period_type"]);
    
    $sql = "INSERT INTO `base_concept`(`concept_id`, `concept_name`, `concept_type`, `period_type`) VALUES ('" . $concept_id . "','" . $concept_name . "', '" . $concept_type . "', '" . "$period_type')";
    
    if (mysqli_query($con, $sql)) {
        echo "<div class='container alert alert-success'>New Concept added successfully</div>";
    } else {
        echo "<div class='container alert alert-info'>There was a problem while adding concept.Please try again.</div>";
    }
}
?>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Concept</h4>
      </div>
      <div class="modal-body">
        <form class="" id="concept-form" method="post">
            <div class="form-group">
                <label for="concept_id">Concept ID</label>
                <input type="text" class="form-control" id="concept_id" name="concept_id">
            </div>
            <div class="form-group">
                <label for="concept_name">Concept Name</label>
                <input type="text" class="form-control" id="concept_name" name="concept_name">
            </div>
            <div class="form-group">
              <label for="concept_type">Concept Type</label>
              <select class="form-control" id="concept_type" name="concept_type">
                <option>xbrli:stringItemType</option>
                <option>nonnum:domainItemType</option>
                <option>num:percentItemType</option>
                <option>xbrli:stringItemType</option>
              </select>
            </div>
            <div class="form-group">
              <label for="period_type">Period Type</label>
              <select class="form-control" id="period_type" name="period_type">
                <option>duration</option>
                <option>instant</option>
              </select>
            </div>

            <input type="submit" id="submit-form" name="submit" value="Save" class="btn-submit">
            <input type="submit" id="cancel" name="cancel" value="Cancel" class="btn-submit">

          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>
<div class="modal fade" id="labelbox" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Labels</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>