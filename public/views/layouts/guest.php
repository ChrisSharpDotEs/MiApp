<?php
if(isset($_SESSION) && array_key_exists('usuario', $_SESSION)) {
    header("Location: /");
    exit();
};

$error_message = "";
if (isset($_SESSION) && array_key_exists('error_message', $_SESSION)) {
    $error_message = "<div class=\"alert alert-danger\">" . $_SESSION['error_message'] . "</div>";
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? '' ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/app.css">
    <script src="./public/js/app.js" type="module"></script>
</head>

<body>
    <main class="d-flex flex-column align-items-center justify-content-center min-h-screen">
        <?= $error_message ?>
        <div class="border rounded">
            <?php include("./public/views/pages/$page.php"); ?>
        </div>
    </main>
    <script src="./public/js/app.js" type="module"></script>
</body>

</html>