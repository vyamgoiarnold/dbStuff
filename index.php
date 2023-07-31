<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $age = $_POST['age'];
    $food = $_POST['food']; 
}

//connect to the database
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "kuku";

$conn = mysqli_connect($hostname,$username,$password,$dbName);

if(!$conn){
    die("The connection is not successful".mysqli_connect_error());
}

//query the data to the database
$query = "INSERT INTO food(name,location,age,food) VALUES ('$name','$location','$age','$food')";

//connect the query to the database
$result = mysqli_query($conn,$query);

//testing if the data has been successfully sent to the database
if($result){
    echo "Data sent successfully ";
    echo "<button><a href='web.php'>Click here to display</a></button>";
} else {
    echo "Sending error: ".mysqli_connect_error();
}

//close the database
mysqli_close($conn);
?>