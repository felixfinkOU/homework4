<?php include 'header.php';?>
    
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

$iCoachID = $_POST['iCoachID'];

if (isset($_POST['iFirstName'])) {
    $iFirstName = $_POST['iFirstName'];
    $sql = "UPDATE SoccerPlayer set FirstName=? where PlayerID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iFirstName, $iCoachID);
    $stmt->execute();
}
elseif (isset($_POST['iLastName'])){
    $iLastName = $_POST['iLastName'];
    $sql = "update SoccerPlayer set LastName=? where PlayerID=?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iLastName, $iCoachID);
    $stmt->execute();   
}
elseif (isset($_POST['iClub'])){
    $iClub = $_POST['iClub'];
    $sql = "update SoccerPlayer set Club=? where PlayerID=?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $iClub, $iCoachID);
    $stmt->execute();   
}
?>
    
    <h1>Edit Manager</h1>
<div class="alert alert-success" role="alert">
  Manager edited.
</div>

<a href="soccer_managers.php" class="btn btn-primary">Go back</a>
    
<?php include 'footer.php';?>