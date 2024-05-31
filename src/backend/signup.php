<?php
include('../../config/database.php');

    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $enc_pass = md5($passwd);

    /*echo "Your fullname: ". $fullname;
    echo "Your email: ". $email;
    echo "Your password: ". $passwd;
    echo "Your password enc: ". $enc_pass;*/

    $sql_validate_email = "SELECT * FROM users WHERE email = '$email'";
    $result = pg_query($conn, $sql_validate_email);
    $total = pg_num_rows($result);

    if($total > 0){
        echo"<script>alert('Email already exis')</scrpt>";
        header("refresh:0;url=../signup.html");
    }else{
        $sql = "
        INSERT INTO users (fullname, email, password) 
            values('$fullname', '$email', '$enc_pass')
    ";

    $ans = pg_query($conn,$sql);
    if ($ans){
        echo "<script>alert('users has been registers')</script>";
        header("refresh:0;url=../signin.php");
    }else{
        echo "Error". pg_last_error();
    }
    }

    //close connection
    pg_close($conn)

?>