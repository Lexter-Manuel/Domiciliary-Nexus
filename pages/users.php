<?php
if (file_exists('includes/database.php')) {
    include_once('includes/database.php');
}
if (file_exists('../includes/database.php')) {
    include_once('../includes/database.php');
}

$userid = $_GET['userid'];

if (isset($_GET['userid']) && isset($_GET['userAccount'])) {
    if ($_GET['userid'] == 0) {
        // Assuming you've updated the GetValue function to accept PDO
        $stmt = $pdo->prepare('INSERT INTO tblUsers (userAccount) VALUES (:userAccount)');
        $stmt->execute([':userAccount' => $_GET['userAccount']]);
    } else {
        $stmt = $pdo->prepare('UPDATE tblUsers SET userAccount = :userAccount WHERE userId = :userId');
        $stmt->execute([':userAccount' => $_GET['userAccount'], ':userId' => $userid]);
    }
}

$userAccount = GetValue($pdo, 'SELECT userAccount FROM tblusers WHERE userid=' . $userid);

?>

<div align="center">
    <h2>Users</h2>

    <div>
        <table width="50%" border="1">
            <?php
            echo '<tr>
                <td>User ID: </td>
                <td>' . $userid . '</td>
            </tr>
            <tr>
                <td>User Account: </td>
                <td>
                    <input type="text" style="width: 250px;" id="user" value="' . $userAccount . '">
                    <button onclick="addEditUser(' . $userid . ')">';
            if ($userid) {
                echo 'Update';
            } else {
                echo 'Add';
            }

            echo '</button>
                </td>
            </tr>';
            ?>
        </table>
        &nbsp;
        <table width="50%" border="1">
            <tr>
                <td>User ID</td>
                <td>User Account</td>
                <td></td>
            <tr>
                <?php
                $rs = $pdo->query('SELECT * FROM tblUsers');
                if ($rs) {
                    while ($rw = $rs->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>
                            <td>' . $rw['userId'] . '</td>
                            <td>' . $rw['userAccount'] . '</td>
                            <td><button style="border-radius:5px; border: black 1px solid"><a href="javascript:void()" style="color: black; font-size: 0.8rem" onclick="loadPage(\'pages/users.php?userid=' . $rw['userId'] . '\',\'content\');">EDIT</a></button></td>
                        </tr>';
                    }
                } else {
                    // Handle query execution failure
                    echo 'Error: ' . $pdo->errorInfo()[2];
                }

                ?>


        </table>


    </div>

</div>