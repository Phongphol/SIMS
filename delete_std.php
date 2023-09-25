<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "students";

// ตรวจสอบว่ามีรหัสนักเรียนที่ส่งมาในพารามิเตอร์ id
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
        // สร้างการเชื่อมต่อกับฐานข้อมูล
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed " . mysqli_connect_error());
        }

        // สร้างคำสั่ง SQL สำหรับลบข้อมูล
        $sql = "DELETE FROM `std_info` WHERE `id` = $id";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Record with ID $id has been deleted successfully!<br>";
            echo '<a href="student.php">Back</a>';
        } else {
            echo "Error deleting record: " . mysqli_error($conn) . "<br>";
            echo '<a href="student.php">Back</a>';
        }

        mysqli_close($conn);
    } else {
        // แสดงกล่องข้อความยืนยัน
        echo "Are you sure you want to delete this record?<br>";
        echo '<form method="post" action=""><input type="submit" name="confirm" value="Confirm Delete"> ';
        echo '<a href="student.php">Cancel</a></form>';
    }
} else {
    echo "Invalid request.";
}
?>
