<?php

// Include database file
include 'customers.php';
$customerObj = new Customers();
// Edit customer record
if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $customer = $customerObj->displyaRecordById($editId);
}
// Update Record in customer table
if (isset($_POST['update'])) {
    $customerObj->updateRecord($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP: CRUD (Add, Edit, Delete, View) Application using OOP (Object Oriented Programming) and MYSQL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>
    <div class="card text-center" style="padding:15px;">
        <h4>PHP: CRUD (Add, Edit, Delete, View) Application using OOP (Object Oriented Programming) and MYSQL</h4>
    </div><br>
    <div class="container">
        <form action="edit.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="uname" value="<?php echo $customer['name']; ?>" required="">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="uemail" value="<?php echo $customer['email']; ?>" required="">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="upname" value="<?php echo $customer['username']; ?>" required="">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
if (file_exists('includes/database.php')) {
    include_once('includes/database.php');
}
if (file_exists('../includes/database.php')) {
    include_once('../includes/database.php');
}

require_once "convert-to-long-date.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fname = $_POST['fname'];
    $mname = $_POST['mname']; // Assuming 'mname' is the name of the field for middle name
    $lname = $_POST['lname'];
    $sex = $_POST['sex'];
    $bday = $_POST['bday'];
    $educ = $_POST['educ'];
    $occupation = $_POST['occupation'];
    $citizenship = $_POST['citizenship'];
    $religion = $_POST['religion'];
    $contact_no = $_POST['contact_no'];
    $civil_status = $_POST['civil_status'];
    $house_no = $_POST['house_no'];
    $street = $_POST['street'];

    // SQL query to insert resident information into the database
    $query = "INSERT INTO resident (fname, mname, lname, sex, bday, educ, occupation, citizenship, religion, contact_no, civil_status, house_no, street) 
              VALUES (:fname, :mname, :lname, :sex, :bday, :educ, :occupation, :citizenship, :religion, :contact_no, :civil_status, :house_no, :street)";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);

    // Bind parameters
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':mname', $mname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':bday', $bday);
    $stmt->bindParam(':educ', $educ);
    $stmt->bindParam(':occupation', $occupation);
    $stmt->bindParam(':citizenship', $citizenship);
    $stmt->bindParam(':religion', $religion);
    $stmt->bindParam(':contact_no', $contact_no);
    $stmt->bindParam(':civil_status', $civil_status);
    $stmt->bindParam(':house_no', $house_no);
    $stmt->bindParam(':street', $street);

    // Execute the query
    if ($stmt->execute()) {
        // Success message
        echo json_encode(array("success" => true, "message" => "Resident added successfully."));
    } else {
        // Error message
        echo json_encode(array("success" => false, "message" => "Error: Unable to add resident."));
    }
    exit; // Stop further execution
}
?>