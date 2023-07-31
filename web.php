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

$query = "SELECT * FROM food";

//combine the query and the connection
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>User table</title>
    </head>
    <body>
    <table>
    <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Age</th>
        <th>Food</th>
    </tr>";
    while($data = mysqli_fetch_array($result)){
        echo "<tr>
            <td>".$data['fname']."</td>
            <td>".$data['loc']."</td>
            <td>".$data['age']."</td>
            <td>".$data['food']."</td>
        </tr>";
    }
    echo "</table><br><br>
         <button><a href='form.html'>Click here to go Home</a></button>
        </body>
    </html>";
} else{
    echo "No data found!";
}

//close the database
mysqli_close($conn);

?>