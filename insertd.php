<?php
$conn = mysqli_connect("localhost", "root", "", "school");

if (!$conn) {
    die("Connection failed");
}

// Insert data
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    mysqli_query($conn, "INSERT INTO student (fname, lname) VALUES ('$fname', '$lname')");
}

// Select data
$result = mysqli_query($conn, "SELECT * FROM student");
?>

<form method="POST">
    fname: <input type="text" name="fname"><br><br>
    lname: <input type="text" name="lname"><br><br>
    <input type="submit" name="submit" value="Save">
</form>

<h2>Student List</h2>
<table border="1">
    <tr>
        <th>FName</th>
        <th>Lname</th>
    </tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['fname']."</td>";
    echo "<td>".$row['lname']."</td>";
    echo "</tr>";
}
?>
</table>
