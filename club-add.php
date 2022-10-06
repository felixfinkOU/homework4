<?php include 'header.php';?>

    <h1>Add Club</h1>
<form method="post" action="club-add-save.php">
  <div class="mb-3">
    <label for="Club" class="form-label">Club Name</label>
    <input type="text" class="form-control" id="Club" aria-describedby="clubHelp" name="iClub">
    <div id="clubHelp" class="form-text">Enter the Club's name.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include 'footers.php';?>