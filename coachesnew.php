<?php
// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Profile</title>
        </head>
        <body>
            <h2>User Profile</h2>
            <table border='1'>
                <tr><th>ID</th><th>Username</th><th>Password</th><th>Phone</th><th>NIC</th><th>Email</th></tr>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['nic']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
            </table>
        </body>
        </html>
<?php
    } else {
        echo "User not found";
    }
}

$conn->close();
?>
