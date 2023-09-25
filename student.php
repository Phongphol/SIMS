<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            color: #0056b3;
        }
        .insert-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .insert-button:hover {
            background-color: #218838;
        }
        .insert-button {
            display: inline-block;
            padding: 15px 30px; 
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .insert-button:hover {
            background-color: #218838;
        }
        .center {
            text-align: center;
            margin-top: 20px;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "students";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<h1>Student Information</h1>";

$sql = "SELECT * FROM `std_info`";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Surname</th>";
    echo "<th>ชื่อ</th><th>นามสกุล</th>";
    echo "<th>Major</th><th>Email</th><th>Action</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["id"] . "</td>";
        echo "<td>" . $row["en_name"] . "</td>";
        echo "<td>" . $row["en_surname"] . "</td>";
        echo "<td>" . $row["th_name"] . "</td>";
        echo "<td>" . $row["th_surname"] . "</td>";
        echo "<td>" . $row["major_code"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";

        echo "<td><a href='delete_std.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "<td><a href='update_std_form.php?id=" . $row["id"] . "'>Update</a></td></tr>";
    }
    echo "</table>";
}

echo "<div class='center'>";
echo "<a href='insert_std_form.html' class='insert-button'>Insert new record</a>";
echo "</div>";

mysqli_close($conn);
?>
</body>
</html>
