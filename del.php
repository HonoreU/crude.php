<?php
$conn = mysqli_connect("localhost", "root", "", "school");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM student WHERE lname = $lname";
    mysqli_query($conn, $sql);

    header("Location: students.php");
}
?>
