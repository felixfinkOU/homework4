<?php include 'header.php';?>

    <h1>Add Player</h1>

<?php
$servername = "localhost";
$username = "felixfin_user2";
$password = "O-,GXdw4e3QG";
$dbname = "felixfin_homework3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

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
    <select class="form-select" aria-label="Select Club" id="Club" name="iClub">
    <?php
        $homeTeamSql = "select * from Teams order by Club";
        $homeTeamResult = $conn->query($homeTeamSql);
        while($homeTeamRow = $homeTeamResult->fetch_assoc()) {
          if ($homeTeamRow['Club'] == $row['Club']) {
            $selText = " selected";
          } else {
            $selText = "";
          }
    ?>
      <option value="<?=$homeTeamRow['Club']?>"<?=$selText?>><?=$homeTeamRow['Club']?></option>
    <?php
        }
    ?>
    </select>
    <div id="lastNameHelp" class="form-text">Enter the club of the player.</div>
  </div>
  <!-- <div class="mb-3">
    <label for="Position" class="form-label">Position</label>
    <input type="text" class="form-control" id="Position" aria-describedby="positionHelp" name="iPosition">
    <div id="positionHelp" class="form-text">Enter the position of the player.</div>
  </div> -->
  <div class="mb-3">
    <label for="Position" class="form-label">Position</label>
    <select class="form-select" aria-label="Select Position" id="Postion" name="iPosition">
    <?php
        $positionSql = "select distinct * from SoccerPlayer";
        $positionResult = $conn->query($positionSql);
        while($positionRow = $positionResult->fetch_assoc()) {
          if ($positionRow['Position'] == $row['Position']) {
            $selText = " selected";
          } else {
            $selText = "";
          }
    ?>
      <option value="<?=$positionRow['Position']?>"<?=$selText?>><?=$positionRow['Position']?></option>
    <?php
        }
    ?>
    </select>
    <div id="lastNameHelp" class="form-text">Enter the position of the player.</div>
  </div>
  <div class="mb-3">
    <label for="Nationality" class="form-label">Nationality</label>
    <input type="text" class="form-control" id="Nationality" aria-describedby="nationalityHelp" name="iNationality">
    <div id="nationalityHelp" class="form-text">Enter the nationality of the player.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include 'footer.php';?>