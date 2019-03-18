<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog Maker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Blog Maker</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo ROOT_URL; ?>">Home</a></li>
            <li><a href="<?php echo ROOT_URL; ?>shares">Blog</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
            <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['user_data']['name'];?></a></li>
            <li><a href="<?php echo ROOT_URL; ?>users/profile">Profile</a></li>
                <li><a href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
            <?php else : ?>
            <li><a href="<?php echo ROOT_URL; ?>users/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="<?php echo ROOT_URL; ?>users/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php endif; ?>

        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <?php Messages::display(); ?>
        <?php require($view); ?>
    </div>
</div><!-- /.container -->
</body>
</html>



