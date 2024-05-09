<?php session_start() ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Lab</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Almarai.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav>
        <div class="container top_nav">
            <div class="row navbar">
                <div class="col-md-4 right_header">
                    <small class="px-2">
                        عندك استفسار اتصل بنا
                    </small>
                    <small>
                        01125622252
                    </small>
                </div>
                <div class="col-md-8 left_header">
                    <small class="px-2">
                        او راسلنا عبر البريد الالكتروني
                    </small>
                    <small>
                        info@healthlap.com
                    </small>
                </div>
            </div>
        </div>
    </nav>

    <header>
        <div class="container header">
            <div class="row navbar">
                <div class="col-md-4 right_header">
                    <h1 class="site_title">
                        <img src="img/logo.png">
                        Health Lab
                    </h1>
                </div>
                <div class="col-md-8 left_header">
                    <a class="main_links" href="index.php#intro">الرئيسية</a>
                    <a class="main_links" href="index.php#whyUs">لماذا نحن</a>
                    <a class="main_links" href="index.php#services">قائمة الاختبارات</a>
                    <?php if ($_SESSION["userlevel"] == 1) { ?>
                        <a class="main_links admin_link" href="analysis_typs.php">الاختبارات</a>
                        <a class="main_links admin_link" href="samples.php">العينات</a>
                        <a class="main_links admin_link" href="users.php">المستخدمين</a>
                    <?php } ?>
                    <?php if ($_SESSION["username"] != null || $_SESSION["username"] != '' || $_SESSION["username"]) { ?>
                        <a class="main_links" href="query.php">النتائج</a>
                        <a class="main_links" href="logout.php">خروج [<?php echo $_SESSION["username"]; ?>]</a>
                    <?php } else { ?>
                        <a class="main_links" href="register.php">عضو جديد</a>
                        <a class="main_links" href="login.php">الدخول</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>