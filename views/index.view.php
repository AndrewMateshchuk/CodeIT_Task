<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
            crossorigin="anonymous"></script>
    <script src="public/loginValidator.js"></script>
    <link rel="stylesheet" href="public/style.css"></link>
    <style>
        #error {
            color: red;
            font-size: medium;
            text-align: left;
            margin-top: 5vh;
        }
    </style>
</head>
<body>
<div class="row">
    <?php
        if(isset($_SESSION['email']) && isset($_SESSION['name'])) :
    ?>
        <div class="col-4" style="margin: 15px;">
        <h5>
            <?= "Ваш Email - ".$_SESSION['email']; ?>
        </h5>
        </div>
        <div class="col-4">
            <h2>
                <?= "Привет ".$_SESSION['name'] ?>
            </h2>
        </div>
        <div class="col-3" style="text-align: right; margin: 15px;">
            <h5>
                <a href='home?session=destroy';>Выйти</a>
            </h5>
        </div>
    <?php
        else :
    ?>
    <div class="col-4">
    </div>
    <div class="col-4">
        <form action="signIn" method="post" id="login-form">
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label">E-mail или Логин</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" minlength="5" maxlength="50" placeholder="Email или Логин" value="<?= isset($_COOKIE['login_email']) ? $_COOKIE['login_email'] : ""; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" minlength="8" maxlength="30" placeholder="Пароль" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6" style="text-align: right">
                    <a href="registration">Регистрация</a>
                </div>
                <div class="col-6">
                    <input id="login-btn" class="btn" type="submit" value=" Войти ">
                </div>
            </div>
        </form>
    </div>
    <div class="col-4" id="error">
            <?php
            if($_GET['error'] != ''){
                echo $_GET['error'];
            }
            ?>
    </div>
</div>
</body>
</html>
<?php endif;