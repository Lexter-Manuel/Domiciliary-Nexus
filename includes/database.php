<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'domicilliaryNexus';

try {
    // Establish PDO connection
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $password);
    // Set PDO attributes
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Disable emulation of prepared statements
} catch (PDOException $e) {
    // Handle connection error
    die("Failed to connect to Database Server: " . $e->getMessage());
}

// Function to execute a query and return a single value
function getValue($pdo, $sql_query)
{
    $stmt = $pdo->query($sql_query);
    $row = $stmt->fetch(PDO::FETCH_NUM);
    return $row ? $row[0] : null;
}

// Function to check if a table exists in the database
function isDBTableExist($pdo, $dbname, $table)
{
    $stmt = $pdo->prepare("SELECT COUNT(*)
        FROM information_schema.tables
        WHERE table_schema = :dbname AND table_name = :table");
    $stmt->execute([':dbname' => $dbname, ':table' => $table]);
    $row = $stmt->fetch(PDO::FETCH_NUM);
    return $row[0];
}

if (!isDBTableExist($pdo, $dbname, 'resident')) {
    $pdo->query('create table resident (
    resident_id INT AUTO_INCREMENT PRIMARY KEY,
    fname varchar(255) not null,
    mname varchar(255),
    lname varchar(255) not null,
    sex ENUM (
        "Male",
        "Female"
    ) not null,
    bday DATE not null,
    educ ENUM (
        "Some Elementary",
        "Elementary Graduate",
        "Some High School",
        "High School Graduate",
        "Some College",
        "College Graduate",
        "Vocational",
        "Advanced Degree",
        "N/A"
    ) not null,
    occupation VARCHAR(255) not null,
    citizenship varchar(255) not null default "filipino",
    religion varchar(255) not null,
    contact_no varchar(11) not null,
    civil_status varchar(255) not null,
    
    house_no varchar(20),
    street ENUM (
        "Rizal Avenue",
                                "Bonifacio Street",
                                "Mabini Boulevard",
                                "Quezon Street",
                                "Taft Avenue",
                                "Roxas Lane",
                                "Luna Street",
                                "Marcos Avenue",
                                "Magellan Avenue",
                                "Katipunan Street",
                                "Lapu-Lapu Parkway",
                                "Aguinaldo Drive"
    ) not null
)');
} //resident_status ENUM (
//     "Active",
//     "Deleted"
// ) not null,

if (!isDBTableExist($pdo, $dbname, 'household')) {
    $pdo->query('create table household (
        house_no INT AUTO_INCREMENT PRIMARY KEY,
        street ENUM (
            "Hulio",
            "B. Potencio",
            "Diosdado",
            "Ruby Lane",
            "Auburn",
            "Legend",
            "R. Hooke",
            "Brook"
        ) not null,
        household_status ENUM("Active", "Deleted") not null
    )');
}

if (!isDBTableExist($pdo, $dbname, 'blotter')) {
    $pdo->query('create table blotter (
        blotter_id INT AUTO_INCREMENT PRIMARY KEY,
        date_time_reported datetime not null,
        incedent_date_time datetime not null,
        incedent_place varchar(255) not null,
        blotter_status ENUM (
            "Pending",
            "Settled",
            "Filed to Action"
        ) not null,
        offense_subject varchar(255) not null,
        incident_narrative varchar(5000) not null,
        complained_resident_id int(10) not null,
        guardian_complained_resident_id int(10),
        complainant_resident_id int(10),
        complainant_outsider_id int(10)
    )');
}

if (!isDBTableExist($pdo, $dbname, 'resolution')) {
    $pdo->query('create TABLE resolution (
        resolution_id INT AUTO_INCREMENT PRIMARY KEY
    )');
}
