<?php
if (file_exists('includes/database.php')) {
    include_once('includes/database.php');
}
if (file_exists('../includes/database.php')) {
    include_once('../includes/database.php');
}

if (file_exists('/includes/addResident.php')) {
    require_once('/includes/addResident.php');
}
if (file_exists('../includes/addResident.php')) {
    require_once('../includes/addResident.php');
}

if (file_exists('/includes/editArchiveResident.php')) {
    require_once('/includes/editArchiveResident.php');
}
if (file_exists('../includes/editArchiveResident.php')) {
    require_once('../includes/editArchiveResident.php');
}

require_once "../includes/convert-to-long-date.php";

?>

<div align="center">
    <h2 style="font-size: 3rem; font-weight:600">
        Residents
    </h2>
    <div>
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#resident-add-modal">
            add
        </button>
    </div>
    <table id="resident-tbl" class="display cell-border" width="80%" border="1" class="table_pagination">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Sex</th>
                <th>Birthday</th>
                <th>Age</th>
                <th>Highest Educ. Attainment</th>
                <th>Occupation</th>
                <th>Citzenship</th>
                <th>Religion</th>
                <th>Contact No.</th>
                <th>Civil Status</th>
                <th>House No.</th>
                <th>Street</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            // error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING);
            $query = "SELECT resident_id, fname, mname, lname, sex, bday, educ, occupation, citizenship, religion, contact_no, civil_status, house_no, street FROM resident";

            $stmt = $pdo->prepare($query);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $i = 0;
                define("BDAY_POS", 5);
                define("AGE_POS", 6);
                define("N_DB_FIELDS", 14);
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    echo "<tr>";
                    for ($i = 0; $i < N_DB_FIELDS; $i++) {
                        if ($i == BDAY_POS) {
                            $bday = $row[$i];
                            $col = convert_to_long_date($row[$i], null);
                            echo "<td>$col</td>";
                        } else if ($i == AGE_POS) {
                            $inner_query = "CALL calculate_age(?, @age)";
                            $inner_stmt = $pdo->prepare($inner_query);
                            $inner_stmt->execute([$bday]);

                            $inner_query = "SELECT @age";
                            $inner_stmt = $pdo->prepare($inner_query);
                            $inner_stmt->execute();
                            $col = $inner_stmt->fetchColumn();
                            echo "<td>$col</td>";
                            echo "<td>$row[$i]</td>";
                        } else {
                            echo "<td>$row[$i]</td>";
                        }
                    }
                    echo '<td><button type="button" class="btn btn-primary edit-resident" id="edit-resident-' . $row[0] . '">Edit</button></td>';
                    echo '<td><button type="button" class="btn btn-danger">Delete</button></td>';
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <div class="modal fade" id="resident-add-modal" tabindex="-1" aria-labelledby="resident-add-modal-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="resident-add-modal-Label">ADD RESIDENT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-body" method="POST" id="resident_form">
                    <table>
                        <?Php
                        echo '<tr>
                        <td>First Name: </td>
                        <td><input type="text" id="fname" name="fname" required></td>
                    </tr>
                    <tr>
                        <td>Middle Name(Not Required): </td>
                        <td><input type="text" id="mname" name="mname"></td>
                    </tr>
                    <tr>
                        <td>Last Name: </td>
                        <td><input type="text" id="lname" name="lname" required></td>
                    </tr>
                    <tr>
                        <td>Sex: </td>
                        <td><input type="radio" style="margin-right: 0.5rem;" name="sex" id="male" value="Male"><label for="male" required>Male</label></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="radio" style="margin-right: 0.5rem;" name="sex" id="female" value="Female><label for="female">Female</label></td>
                    </tr>
                    <tr>
                        <td>Birthday: </td>
                        <td><input type="date" id="bday" max="" name="bday" required></td>
                    </tr>
                    <tr>
                        <td>Highest Education Attinment: </td>
                        <td><select name="educ" id="educ" style="width:100%" name="educ" required>
                                <option disabled selected>Select an option</option>
                                <option value="Some Elementary">Some Elementary</option>
                                <option value="Elementary Graduate">Elementary Graduate</option>
                                <option value="Some Highschool">Some Highschool</option>
                                <option value="Highschool">Highschool</option>
                                <option value="Some College">Some College</option>
                                <option value="College Graduate">College Graduate</option>
                                <option value="Vocational">Vocational</option>
                                <option value="Advanced Degree">Advanced Degree</option>
                                <option value="N/A">N/A</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Occupation: </td>
                        <td><input type="text" id="occupation" name="occupation" required></td>
                    </tr>
                    <tr>
                        <td>Citizenship: </td>
                        <td><input type="text" id="citizenship" placeholder="Filipino" name="citizenship" required></td>
                    </tr>
                    <tr>
                        <td>Religion: </td>
                        <td><input type="text" id="religion" name="religion" required></td>
                    </tr>
                    <tr>
                        <td>Contact No.: </td>
                        <td><input type="text" id="contact_no" name="contact_no" required></td>
                    </tr>
                    <tr>
                        <td>Civil Status: </td>
                        <td><input type="text" id="civil_status" name="civil_status" required></td>
                    </tr>
                    <tr>
                        <td>House No.: </td>
                        <td><input type="text" id="house_no" name="house_no" required></td>
                    </tr>
                    <tr>
                        <td>Street: </td>
                        <td><select name="street" id="street" name="street" required>
                                <option disabled selected>Select your street</option>
                                <option value="Rizal Avenue">Rizal Avenue</option>
                                <option value="Bonifacio Street">Bonifacio Street</option>
                                <option value="Mabini Boulevard">Mabini Boulevard</option>
                                <option value="Quezon Street">Quezon Street</option>
                                <option value="Taft Avenue">Taft Avenue</option>
                                <option value="Roxas Lane">Roxas Lane</option>
                                <option value="Luna Street">Luna Street</option>
                                <option value="Marcos Avenue">Marcos Avenue</option>
                                <option value="Magellan Avenue">Magellan Avenue</option>
                                <option value="Katipunan Street">Katipunan Street</option>
                                <option value="Lapu-Lapu Parkway">Lapu-Lapu Parkway</option>
                                <option value="Aguinaldo Drive">Aguinaldo Drive</option>
                            </select></td>
                    </tr> ';

                        ?>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="resident-edit-modal" tabindex="-1" aria-labelledby="resident-edit-modal-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="resident-edit-modal-Label">EDIT RESIDENT</h1> <!-- Update title here -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-body" method="POST" id="resident_form">

                    <table>
                        <?Php
                        echo '
                        <tr>
                        <td>Resident ID</td>
                        <td><input id="resident_id" name="resident_id" readonly></td>
                        </tr>
                        <tr>
                        <td>First Name: </td>
                        <td><input type="text" id="fname" name="fname" required></td>
                    </tr>
                    <tr>
                        <td>Middle Name(Not Required): </td>
                        <td><input type="text" id="mname" name="mname"></td>
                    </tr>
                    <tr>
                        <td>Last Name: </td>
                        <td><input type="text" id="lname" name="lname" required></td>
                    </tr>
                    <tr>
                        <td>Sex: </td>
                        <td><input type="radio" style="margin-right: 0.5rem;" name="sex" id="male" value="Male"><label for="male" required>Male</label></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="radio" style="margin-right: 0.5rem;" name="sex" id="female" value="Female><label for="female">Female</label></td>
                    </tr>
                    <tr>
                        <td>Birthday: </td>
                        <td><input type="date" id="bday" max="" name="bday" required></td>
                    </tr>
                    <tr>
                        <td>Highest Education Attinment: </td>
                        <td><select name="educ" id="educ" style="width:100%" name="educ" required>
                                <option disabled selected>Select an option</option>
                                <option value="Some Elementary">Some Elementary</option>
                                <option value="Elementary Graduate">Elementary Graduate</option>
                                <option value="Some Highschool">Some Highschool</option>
                                <option value="Highschool">Highschool</option>
                                <option value="Some College">Some College</option>
                                <option value="College Graduate">College Graduate</option>
                                <option value="Vocational">Vocational</option>
                                <option value="Advanced Degree">Advanced Degree</option>
                                <option value="N/A">N/A</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Occupation: </td>
                        <td><input type="text" id="occupation" name="occupation" required></td>
                    </tr>
                    <tr>
                        <td>Citizenship: </td>
                        <td><input type="text" id="citizenship" placeholder="Filipino" name="citizenship" required></td>
                    </tr>
                    <tr>
                        <td>Religion: </td>
                        <td><input type="text" id="religion" name="religion" required></td>
                    </tr>
                    <tr>
                        <td>Contact No.: </td>
                        <td><input type="text" id="contact_no" name="contact_no" required></td>
                    </tr>
                    <tr>
                        <td>Civil Status: </td>
                        <td><input type="text" id="civil_status" name="civil_status" required></td>
                    </tr>
                    <tr>
                        <td>House No.: </td>
                        <td><input type="text" id="house_no" name="house_no" required></td>
                    </tr>
                    <tr>
                        <td>Street: </td>
                        <td><select name="street" id="street" name="street" required>
                                <option disabled selected>Select your street</option>
                                <option value="Rizal Avenue">Rizal Avenue</option>
                                <option value="Bonifacio Street">Bonifacio Street</option>
                                <option value="Mabini Boulevard">Mabini Boulevard</option>
                                <option value="Quezon Street">Quezon Street</option>
                                <option value="Taft Avenue">Taft Avenue</option>
                                <option value="Roxas Lane">Roxas Lane</option>
                                <option value="Luna Street">Luna Street</option>
                                <option value="Marcos Avenue">Marcos Avenue</option>
                                <option value="Magellan Avenue">Magellan Avenue</option>
                                <option value="Katipunan Street">Katipunan Street</option>
                                <option value="Lapu-Lapu Parkway">Lapu-Lapu Parkway</option>
                                <option value="Aguinaldo Drive">Aguinaldo Drive</option>
                            </select></td>
                    </tr> ';

                        ?>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="resident-edit-btn">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var bday = document.getElementById("bday");

    bday.max = new Date().toISOString().split("T")[0];
</script>