<?php
if (file_exists('includes/database.php')) {
    include_once('includes/database.php');
}
if (file_exists('../includes/database.php')) {
    include_once('../includes/database.php');
}

?>

<div align="center">
    <h2 style="font-size: 3rem; font-weight:600">
        OFFICERS
    </h2>
    <form action="">
        <table width="50%" border="1">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                $query = "select * FROM curr_officers ORDER BY officer_position";

                try {
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                            echo <<<ROW
				<tr>
					<td>$row->officer_id</td>
					<td>$row->name</td>
					<td>$row->officer_position</td>
					<td><a class="fas fa-user-slash"></a></td>
				</tr>
ROW;
                        }
                    }
                } catch (PDOException $e) {
                    // require "../commons/src/inc/terminate-template.php";
                } finally {
                    $pdo = NULL;
                }
                ?>
            </tbody>
        </table>
        <button style="font-size: 0.8rem; padding: 0.2rem 0.4rem; margin: 0.5rem 0; border: 1px solid black; border-radius: 3px">NEW OFFICERS</button>
    </form>
</div>