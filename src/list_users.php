<?php
require '../config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <center>
        <h1>
           LIST USERS 
        </h1>
    </center>
    <div class="container mt-3">
    <table border="1" align="center" class="table table-hover">
        <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Status</th>
            <th>Foto</th>
            <th>...</th>
        </tr>
        <?php 

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
                $user_id = $_POST['user_id'];
                $query_delete_user = "DELETE FROM users WHERE id = $user_id";
                $result_delete = pg_query($conn, $query_delete_user);
                if ($result_delete) {
                    echo "<div class='alert alert-success' role='alert'>Usuario eliminado satisfactoriamente.</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error al eliminar el usuario.</div>";
                }
            }

            $query_users = "SELECT ID, FULLNAME, EMAIL, CASE WHEN STATUS = TRUE THEN 'ACTIVO' ELSE 'INACTIVO' END AS STATUS FROM USERS";
            $result = pg_query($conn, $query_users);
            while($row = pg_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['fullname']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['status']."</td>";
                echo "<td><img src='photos/photo_default.png' width='32'></td>";
                echo "<td> <a href='#'><img src='iconos/edit.png' width='32'></a> 
                <form method='POST' onsubmit='return confirmDelete()'>
                <input type='hidden' name='user_id' value='". $row['id'] ."'>
                <button type='submit' name='delete_user' class='btn btn-danger btn-sm'><img src='iconos/delete.png' width='20'></button>
                </form> 
                </td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>
<script>
    function confirmDelete() {
        return confirm("Estas seguro de eliminar el usuario?");
    }
</script>
</body>
</html>