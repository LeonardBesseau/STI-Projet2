<?php
include '../logic/session.php';
include '../db_connect.php';
include 'navigation.php';

?>

<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
</head>
<body>
<div class="container">
    <h2 class="title">Change password</h2>

    <form action="../logic/new_password.php" method="post">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">
        <div class="form_container">
            <label for="email"><b>Email</b></label>
            <input type="text" name="email" readonly class="form-control" value="<?= $_SESSION['email'] ?>" " >

            <label for="psw"><b>New password</b></label>
            <input type="password" placeholder="Enter new password" name="pswd" required>
            <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error'];
                    $_SESSION['error'] = '';
                    ?>
                </div>
            <?php endif; ?>
            <button type="submit">Change</button>
        </div>
    </form>
</div>
</body>
</html>