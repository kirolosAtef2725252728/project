<?php
session_start();
if ($_SESSION["username"] != null || $_SESSION["username"] != '' || $_SESSION["username"]) {
    echo "<script>window.location.href='index.php';</script>";
    exit();
}
include "header.php";
?>

<div class="smallForm">
    <h3 class="formTitle mb-3">الدخول للموقع</h3>

    <div class="msg">
        <?php
        if (isset($_POST["login"])) {
            $conn = mysqli_connect("localhost", "root", "rootroot", "healthlab");
            $username = $_POST["username"];
            $password = $_POST["userpass"];

            $sql_select_users = "SELECT * FROM `users` WHERE `user_name` = '$username' AND `user_password` = '$password'";
            $query = mysqli_query($conn, $sql_select_users);
            $login_result = mysqli_fetch_assoc($query);
            if (!$login_result) {
                echo "اسم المستخدم او كلمة المرور خطأ !";
            } else {
                session_start();
                $_SESSION["userid"] = $login_result["user_id"];
                $_SESSION["username"] = $login_result["user_name"];
                $_SESSION["useraddress"] = $login_result["user_address"];
                $_SESSION["userphone"] = $login_result["user_phone"];
                $_SESSION["userlevel"] = $login_result["user_level"];
                echo "<script>window.location.href='index.php';</script>";
            }
        }
        ?>
    </div>
    <form action="login.php" method="post">
        <input type="text" class="form-control mb-2" name="username" placeholder="ادخل اسم المستخدم">
        <input type="password" class="form-control mb-2" name="userpass" placeholder="ادخل كلمة المرور">
        <button type="submit" name="login" class="btn btn-dark">دخول</button>
    </form>
</div>


<?php
include "footer.php";
?>