<!DOCTYPE html>
<html>
<head>
    <title>Insert Data</title>
</head>
<body>

<form method="POST" action="">
    fname: <input type="text" name="fname" required><br><br>
    lname: <input type="text" name="lname" required><br><br>
    <input type="submit" name="submit" value="Save">
</form>

</body>
</html>


<?php
$conn = mysqli_connect("localhost", "root", "", "school");

if (!$conn) {
    die("Connection failed");
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $sql = "INSERT INTO student (fname, lname) VALUES ('$fname', '$fname')";

    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
