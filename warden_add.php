<?php
include('db_connect.php');

// When form submitted
if (isset($_POST['save'])) {

    $name = $_POST['warden_name'];
    $mykad = $_POST['mykad_no'];
    $address = $_POST['address'];
    $contact = $_POST['contact_no'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $registration_date = $_POST['registration_date'];
    $created_date = date("Y-m-d");

    $sql = "INSERT INTO warden 
            (warden_name, mykad_no, address, contact_no, gender, age, registration_date, created_date)
            VALUES 
            ('$name', '$mykad', '$address', '$contact', '$gender', '$age', '$registration_date', '$created_date')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('New warden added successfully!');
            window.location.href='warden_list.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Warden</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Add New Warden</h2>

    <form method="POST">

        <label>Name:</label>
        <input type="text" name="warden_name" required>

        <label>MyKad No:</label>
        <input type="text" name="mykad_no" required>

        <label>Address:</label>
        <textarea name="address" required></textarea>

        <label>Contact No:</label>
        <input type="text" name="contact_no" required>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="">-- Select --</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>


        <label>Age:</label>
        <input type="number" name="age" required>

        <label>Registration Date:</label>
        <input type="date" name="registration_date" required>

        <button type="submit" name="save" class="btn btn-save">Save</button>
        <a href="warden_list.php" class="btn btn-back">Cancel</a>

    </form>
</div>

</body>
</html>