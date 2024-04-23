

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
    $resident_id = $_POST['resident_id'];
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
    $query = "UPDATE resident set
                fname = :fname,
                mname = :mname,
                lname = :lname, 
                sex = :sex, 
                bday = :bday, 
                educ = :educ, 
                occupation = :occupation, 
                citizenship = :citizenship, 
                religion = :religion, 
                contact_no = :contact_no, 
                civil_status = :civil_status, 
                house_no = :house_no, 
                street = :street
                WHERE resident_id = :resident_id";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);

    // Bind parameters
    $stmt->bindParam(':resident_id', $resident_id);
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
        echo json_encode(array("success" => true, "message" => "Resident Updated successfully."));
    } else {
        // Error message
        echo json_encode(array("success" => false, "message" => "Error: Unable to Update resident."));
    }
    exit; // Stop further execution
}
?>