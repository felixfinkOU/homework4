<?php include 'header.php';?>

    <h1>Add Manager</h1>

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

<form method="post" action="soccer_managers-add-save.php">
  <div class="mb-3">
    <label for="FirstName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="FirstName" aria-describedby="firstNameHelp" name="iFirstName">
    <div id="firstNameHelp" class="form-text">Enter the first name of the manager.</div>
  </div>
  <div class="mb-3">
    <label for="LastName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="LastName" aria-describedby="lastNameHelp" name="iLastName">
    <div id="lastNameHelp" class="form-text">Enter the last name of the manager.</div>
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
    <div id="lastNameHelp" class="form-text">Enter the club of the manager.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include 'footer.php';?>