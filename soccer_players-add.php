<?php include 'header.php';?>

    <h1>Add Player</h1>
<form method="post" action="soccer_players-add-save.php">
  <div class="mb-3">
    <label for="FirstName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="FirstName" aria-describedby="firstNameHelp" name="iFirstName">
    <div id="firstNameHelp" class="form-text">Enter the first name of the player.</div>
  </div>
  <div class="mb-3">
    <label for="LastName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="LastName" aria-describedby="lastNameHelp" name="iLastName">
    <div id="lastNameHelp" class="form-text">Enter the last name of the player.</div>
  </div>
  <div class="mb-3">
    <label for="Club" class="form-label">Club</label>
    <input type="text" class="form-control" id="Club" aria-describedby="clubHelp" name="iClub">
    <div id="clubHelp" class="form-text">Enter the club of the player.</div>
  </div>
  <div class="mb-3">
    <label for="Position" class="form-label">Position</label>
    <input type="text" class="form-control" id="Position" aria-describedby="positionHelp" name="iPosition">
    <div id="positionHelp" class="form-text">Enter the position of the player.</div>
  </div>
  <div class="mb-3">
    <label for="Nationality" class="form-label">Nationality</label>
    <input type="text" class="form-control" id="Nationality" aria-describedby="nationalityHelp" name="iNationality">
    <div id="nationalityHelp" class="form-text">Enter the nationality of the player.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include 'footer.php';?>