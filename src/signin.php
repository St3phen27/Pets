<?php
    session_start();
    if(isset($_SESSION["id_user"])){
        //header("Location:home.php");
        header("refresh:0;url=home.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets | New user</title>
    <link rel="icon" type="imagenes/png" href="../src/iconos/logo22.jpg">
</head>
<body>
    <center>
        <img src="imagenes/3456426.png"width="100">
    </center>
    <form name="signin-form" action="backend/signin.php" method="post">
        <table border="0" align="center">
            <tr><td><input type="email" name="email" placeholder="EJEMPLO@gmail.com"  required></td></tr>
            <tr><td><input type="password" name="passwd" placeholder="*******"  required></td></tr>
            <tr><td align="center"><button>LOGIN</button>
            <tr><td align="center"><a href= "signup.html">Create an account</a> 
        </table>
    </form>
</body>
</html>