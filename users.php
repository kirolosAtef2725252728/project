<?php
include "header.php";
?>

<?php
$uid = $_GET["uid"];
$did = $_GET["did"];

if ($uid) {
    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "SELECT * FROM `users` WHERE `user_id` = $uid";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
}

if ($did) {
    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "DELETE FROM `users` WHERE `user_id` = $did";
    mysqli_query($conn, $sql);
}
?>
<div class="container">
    <div class="addSection">
        <h3 class="my-3 text-center">المستخدمين</h3>

        <form autocomplete="off" action="users.php" class="smallForm" method="post">
            <input type="hidden" name="user_id" value="<?php echo $result["user_id"] ?>">
            <input value="<?php echo $result["user_name"] ?>" class="form-control mb-2" type="text" name="user_name" placeholder="ادخل اسم المستخدم">
            <input value="<?php echo $result["user_password"] ?>" class="form-control mb-2" type="password" name="user_password" placeholder="ادخل كلمة المرور">
            <button name="<?php if ($uid) { echo 'update'; } else {  echo 'add'; } ?>" class="btn btn-primary"><?php if ($uid) { echo 'تحديث'; } else { echo 'حفظ'; } ?></button>
        </form>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">اسم المستخدم</th>
                <th scope="col">كلمة المرور</th>
                <th scope="col">خيارات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
            $sql = "SELECT * FROM `users`";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach ($result as $users) {
            ?>
                <tr>
                    <td><?php echo $users["user_name"] ?></td>
                    <td><?php echo $users["user_password"] ?></td>
                    <td>
                        <a class="badge bg-success" style="text-decoration: none;" href="users.php?uid=<?php echo $users["user_id"] ?>">تعديل</a>
                        <a class="badge bg-danger" style="text-decoration: none;" href="users.php?did=<?php echo $users["user_id"] ?>">حذف</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>

<?php
include "footer.php";
?>
<?php
if (isset($_POST["add"])) {
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];

    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "INSERT INTO `users`(`user_name`, `user_password`) VALUES ('$user_name', '$user_password')";
    mysqli_query($conn, $sql);
    echo "<script>window.location.href='users.php';</script>";
    exit;
}

if (isset($_POST["update"])) {
    $user_id = $_POST["user_id"];
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];

    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "UPDATE `users` SET `user_name`= '$user_name' ,`user_password`= '$user_password' WHERE `user_id` = $user_id";
    mysqli_query($conn, $sql);
    echo "<script>window.location.href='users.php';</script>";
    exit;
}
