<?php include 'header.php';?>
    
<?php
$servername = "localhost";
$username = "projecto_homework3";
$password = "0w_zeP}]OVy0";
$dbname = "projecto_homework3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$iName = $_POST['iName'];

$sql = "insert into Teams (Club) value (?)";
//echo $sql;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $iClub);
    $stmt->execute();
?>
    
    <h1>Add Club</h1>
<div class="alert alert-success" role="alert">
  New club added.
</div>
    <a href="index.php" class="btn btn-primary">Go back</a>
    
<?php include 'footers.php';?>