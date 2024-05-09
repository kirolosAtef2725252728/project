<?php
include "header.php";
?>

<?php
$uid = $_GET["uid"];
$did = $_GET["did"];

if ($uid) {
    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "SELECT * FROM `analysis_users` WHERE `analysis_users_id` = $uid";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
}

if ($did) {
    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "DELETE FROM `analysis_users` WHERE `analysis_users_id` = $did";
    mysqli_query($conn, $sql);
}
?>
<div class="container">
    <div class="addSection">
        <h3 class="my-3 text-center">العينات</h3>

        <form autocomplete="off" action="samples.php" class="smallForm" method="post">
            <input type="hidden" name="analysis_users_id" value="<?php echo $result["analysis_users_id"] ?>">
            <input value="<?php echo $result["analysis_id"] ?>" class="form-control mb-2" type="text" name="analysis_id" placeholder="ادخل كود الاختبار">
            <input value="<?php echo $result["user_id"] ?>" class="form-control mb-2" type="text" name="user_id" placeholder="ادخل كود المستخدم">
            <input value="<?php echo $result["analysis_result"] ?>" class="form-control mb-2" type="text" name="analysis_result" placeholder="ادخل نتيجة الاختبار">
            <button name="<?php if ($uid) { echo 'update'; } else {  echo 'add'; } ?>" class="btn btn-primary"><?php if ($uid) { echo 'تحديث'; } else { echo 'حفظ'; } ?></button>
        </form>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">كود الاختبار</th>
                <th scope="col">كود المستخدم</th>
                <th scope="col">نتيجة الاختبار</th>
                <th scope="col">خيارات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
            $sql = "SELECT * FROM `analysis_users`";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach ($result as $users) {
            ?>
                <tr>
                    <td><?php echo $users["analysis_id"] ?></td>
                    <td><?php echo $users["user_id"] ?></td>
                    <td><?php echo $users["analysis_result"] ?></td>
                    <td>
                        <a class="badge bg-success" style="text-decoration: none;" href="samples.php?uid=<?php echo $users["analysis_users_id"] ?>">تعديل</a>
                        <a class="badge bg-danger" style="text-decoration: none;" href="samples.php?did=<?php echo $users["analysis_users_id"] ?>">حذف</a>
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
    $analysis_id = $_POST["analysis_id"];
    $user_id = $_POST["user_id"];
    $analysis_result = $_POST["analysis_result"];

    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "INSERT INTO `analysis_users`(`analysis_id`, `user_id`, `analysis_result`) VALUES ('$analysis_id', '$user_id', '$analysis_result')";
    mysqli_query($conn, $sql);
    echo "<script>window.location.href='samples.php';</script>";
    exit;
}

if (isset($_POST["update"])) {
    $analysis_users_id = $_POST["analysis_users_id"];
    $analysis_id = $_POST["analysis_id"];
    $user_id = $_POST["user_id"];
    $analysis_result = $_POST["analysis_result"];

    $conn = mysqli_connect('localhost', 'root', 'rootroot', 'healthlab');
    $sql = "UPDATE `analysis_users` SET `analysis_id`= '$analysis_id' ,`user_id`= '$user_id', `analysis_result`= '$analysis_result' WHERE `analysis_users_id` = $analysis_users_id";
    mysqli_query($conn, $sql);
    echo "<script>window.location.href='samples.php';</script>";
    exit;
}