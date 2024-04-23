<!-- 
if (file_exists('includes/database.php')) {
    include_once('includes/database.php');
}
if (file_exists('../includes/database.php')) {
    include_once('../includes/database.php');
} ?>

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fname'])) {

    $data = json_decode(file_get_contents('php://input'), true);


    include_once('../includes/database.php');

    $query = "INSERT INTO resident (fname, lname, sex, bday, educ, occupation, citizenship, religion, contact_no, civil_status, house_no, street) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$data['fname'], $data['lname'], $data['sex'], $data['bday'], $data['educ'], $data['occupation'], $data['citizenship'], $data['religion'], $data['contact_no'], $data['civil_status'], $data['house_no'], $data['street']]);


    echo "<script>console.log('Resident added successfully!')</script>";
    $response = array("success" => true, "message" => "Resident added successfully!");
} else {

    $response = array("success" => false, "message" => "No valid form submission received.");
    echo "<script>console.log('No valid form submission received.')</script>";
} -->

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