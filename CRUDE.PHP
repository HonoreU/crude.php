<?php
$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) die("Connection failed");

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE ID=$ID");
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['ID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    mysqli_query($conn,
        "UPDATE users SET fname='$fname', lname='$lname' WHERE ID=$ID"
    );
}

// INSERT
if (isset($_POST['save'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    mysqli_query($conn,
        "INSERT INTO stutentes (fname, lname) VALUES ('$fname','$lname')"
    );
}

// READ FOR EDIT
$edit = false;
if (isset($_GET['edit'])) {
    $edit = true;
    $id = $_GET['edit'];
    $result = mysqli_query($conn, "SELECT * FROM stutentes WHERE ID=$ID");
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Simple CRUD</h2>

<form method="POST">
    <input type="hidden" name="ID" value="<?= $edit ? $row['ID'] : '' ?>">

    First Name:
    <input type="text" name="fname"
        value="<?= $edit ? $row['fname'] : '' ?>" required><br><br>

    Last Name:
    <input type="text" name="lname"
        value="<?= $edit ? $row['lname'] : '' ?>" required><br><br>

    <?php if ($edit) { ?>
        <button type="submit" name="update">Update</button>
    <?php } else { ?>
        <button type="submit" name="save">Save</button>
    <?php } ?>
</form>

<br>

<table border="1">
<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Action</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM stutentes");
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $row['ID'] ?></td>
    <td><?= $row['fname'] ?></td>
    <td><?= $row['lname'] ?></td>
    <td>
        <a href="?edit=<?= $row['ID'] ?>">Edit</a> |
        <a href="?delete=<?= $row['ID'] ?>"
           onclick="return confirm('Delete this record?')">Delete</a>
    </td>
</tr>
<?php } ?>
</table>

</body>
</html>
