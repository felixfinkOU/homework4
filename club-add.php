<?php include 'header.php';?>

    <h1>Add Club</h1>
<form method="post" action="instructor-add-save.php">
  <div class="mb-3">
    <label for="Club" class="form-label">Club Name</label>
    <input type="text" class="form-control" id="Club" aria-describedby="clubHelp" name="iClub">
    <div id="clubHelp" class="form-text">Enter the Club's name.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>