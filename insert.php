<?
$servername = "localhost";
$username = "root";
$password = "Jsh1588!";
$dbname = "web_crawling";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error){
	die("connection failed: " . $conn -> connect_error);
}

$sql = "INSERT INTO crawling(date, rank, name)
VALUES ('2018.12.11.', '3', 'padding')";

if($conn->query($sql) == TRUE){
echo " success";
} else{
echo "error: ".$sql."<br>".$conn->error;
}

$conn->close();
?>
