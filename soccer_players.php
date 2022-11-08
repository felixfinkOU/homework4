<?php include 'header.php';?>

    <h1>Players</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>PlayerID</th>
      <th>FirstName</th>
      <th>LastName</th>
      <th>Club</th>
      <th>Position</th>
      <th>Nationality</th>
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

if (isset($_POST['position'])) {
    $var = $_POST['position'];
    $sql = "SELECT * from SoccerPlayer where Position='$var' order by PlayerID";
}
else {
    $sql = "SELECT * from SoccerPlayer order by PlayerID";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["PlayerID"]?></td>
    <td><?=$row["FirstName"]?></td>
    <td><?=$row["LastName"]?></td>
    <td><?=$row["Club"]?></td>
    <td><?=$row["Position"]?></td>
    <td><?=$row["Nationality"]?></td>
    <!-- <td>
      <form method="post" action="soccer_players-edit.php">
        <input type="hidden" name="iPlayerID" value="<?=$row["PlayerID"]?>" />
        <input type="hidden" name="iFirstName" value="<?=$row["FirstName"]?>" />
        <input type="hidden" name="iLastName" value="<?=$row["LastName"]?>" />
        <input type="hidden" name="iClub" value="<?=$row["Club"]?>" />
        <input type="hidden" name="iPosition" value="<?=$row["Position"]?>" />
        <input type="hidden" name="iNationality" value="<?=$row["Nationality"]?>" />
        <input type="submit" value="Edit" class="btn" />
      </form>
    </td> -->
    <td>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editPlayer<?=$row["PlayerID"]?>">
        Edit
      </button>
      <div class="modal fade" id="editPlayer<?=$row["PlayerID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editManager<?=$row["PlayerID"]?>Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editPlayer<?=$row["PlayerID"]?>Label">Edit Player</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="soccer_players-edit-save.php">
                <div class="mb-3">
                  <label for="editPlayer<?=$row["PlayerID"]?>FirstName" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="editPlayer<?=$row["PlayerID"]?>FirstName" aria-describedby="editPlayer<?=$row["PlayerID"]?>Help" name="iFirstName" value="<?=$row['FirstName']?>">
                  <div id="editPlayer<?=$row["PlayerID"]?>Help" class="form-text">Enter the Player's First Name.</div>
                </div>
                <div class="mb-3">
                  <label for="editPlayer<?=$row["PlayerID"]?>LastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="editPlayer<?=$row["PlayerID"]?>LastName" aria-describedby="editPlayer<?=$row["PlayerID"]?>Help" name="iLastName" value="<?=$row['LastName']?>">
                  <div id="editPlayer<?=$row["PlayerID"]?>Help" class="form-text">Enter the Player's Last Name.</div>
                </div>
                <div class="mb-3">
                  <label for="editPlayer<?=$row["PlayerID"]?>Club" class="form-label">Club</label>
                  <select class="form-select" id="editPlayer<?=$row["PlayerID"]?>Club" aria-label="Select Club" name="iClub" value="<?=$row['Club']?>">
                  <?php
                      $clubSql = "select * from Teams order by Club";
                      $clubResult = $conn->query($clubSql);
                      while($clubRow = $clubResult->fetch_assoc()) {
                        if ($clubRow['Club'] == $row['Club']) {
                          $selText = " selected";
                        } else {
                          $selText = "";
                        }
                  ?>
                    <option value="<?=$clubRow['Club']?>"<?=$selText?>><?=$clubRow['Club']?></option>
                  <?php
                      }
                  ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="editPlayer<?=$row["PlayerID"]?>Position" class="form-label">Position</label>
                  <select class="form-select" id="editPlayer<?=$row["PlayerID"]?>Position" aria-label="Select Position" name="iPosition" value="<?=$row['Position']?>">
                    <option value="Keeper">Keeper</option>
                    <option value="Defender">Defender</option>
                    <option value="Midfielder">Midfielder</option>
                    <option value="Striker">Striker</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="editPlayer<?=$row["PlayerID"]?>Nationality" class="form-label">Nationality</label>
                  <input type="text" class="form-control" id="editPlayer<?=$row["PlayerID"]?>Nationality" aria-describedby="editPlayer<?=$row["PlayerID"]?>Help" name="iNationality" value="<?=$row['Nationality']?>">
                  <div id="editPlayer<?=$row["PlayerID"]?>Help" class="form-text">Enter the Player's Nationality.</div>
                </div>
                <input type="hidden" name="iPlayerID" value="<?=$row['PlayerID']?>">
                <input type="hidden" name="saveType" value="Edit">
                <input type="submit" class="btn btn-primary" value="Submit">
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </td>
    <td>
    <td>
      <form method="post" action="soccer_players-delete-save.php">
        <input type="hidden" name="iPlayerID" value="<?=$row["PlayerID"]?>" />
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
<a href="soccer_players-add.php" class="btn btn-primary">Add New</a>

<?php include 'footer.php';?>