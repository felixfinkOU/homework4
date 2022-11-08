<?php include 'header.php';?>

    <h1>Managers</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>CoachID</th>
      <th>FirstName</th>
      <th>LastName</th>
      <th>Club</th>

    </tr>
  </thead>
  <tbody>
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

$sql = "SELECT * from SoccerManagers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["CoachID"]?></td>
    <td><?=$row["FirstName"]?></td>
    <td><?=$row["LastName"]?></td>
    <td><?=$row["Club"]?></td>
    <!-- <td>
      <form method="post" action="soccer_managers-edit.php">
        <input type="hidden" name="iCoachID" value="<?=$row["CoachID"]?>" />
        <input type="hidden" name="iFirstName" value="<?=$row["FirstName"]?>" />
        <input type="hidden" name="iLastName" value="<?=$row["LastName"]?>" />
        <input type="hidden" name="iClub" value="<?=$row["Club"]?>" />
        <input type="submit" value="Edit" class="btn" />
      </form>
    </td> -->
    <td>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editManager<?=$row["CoachID"]?>">
        Edit
      </button>
      <div class="modal fade" id="editManager<?=$row["CoachID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editManager<?=$row["CoachID"]?>Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editManager<?=$row["CoachID"]?>Label">Edit Manager</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="soccer_managers-edit-save.php">
                <div class="mb-3">
                  <label for="editManager<?=$row["CoachID"]?>FirstName" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="editManager<?=$row["CoachID"]?>FirstName" aria-describedby="editManager<?=$row["CoachID"]?>Help" name="iFirstName" value="<?=$row['FirstName']?>">
                  <div id="editManager<?=$row["CoachID"]?>Help" class="form-text">Enter the Managers's First Name.</div>
                </div>
                <div class="mb-3">
                  <label for="editManager<?=$row["CoachID"]?>LastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="editManager<?=$row["CoachID"]?>LastName" aria-describedby="editManager<?=$row["CoachID"]?>Help" name="iLastName" value="<?=$row['LastName']?>">
                  <div id="editManager<?=$row["CoachID"]?>Help" class="form-text">Enter the Managers's Last Name.</div>
                </div>
                <div class="mb-3">
                  <label for="editManager<?=$row["CoachID"]?>Club" class="form-label">Club</label>
                  <input type="text" class="form-control" id="editManager<?=$row["CoachID"]?>Club" aria-describedby="editManager<?=$row["CoachID"]?>Help" name="iClub" value="<?=$row['Club']?>">
                  <div id="editManager<?=$row["CoachID"]?>Help" class="form-text">Enter the Managers's Club.</div>
                </div>
                <input type="hidden" name="iManager" value="<?=$row['CoachID']?>">
                <input type="hidden" name="saveType" value="Edit">
                <input type="submit" class="btn btn-primary" value="Submit">
              </form>
            </div>
          </div>
        </div>
      </div>
    </td>
    <td>
      <form method="post" action="soccer_managers-delete-save.php">
        <input type="hidden" name="iCoachID" value="<?=$row["CoachID"]?>" />
        <input type="submit" value="Delete" class="btn" />
      </form>
    </td>
  </tr>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  </tbody>
    </table>

<a class="btn btn-primary" type="button" href="index.php">Go Back</a>
<a href="soccer_managers-add.php" class="btn btn-primary">Add New</a>

<?php include 'footer.php';?>