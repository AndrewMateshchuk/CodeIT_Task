<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма регистрации</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="public/style.css"></link>
    <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
    crossorigin="anonymous"></script>
    <script src="public/registrationValidator.js"></script>
</head>
<body class="row">
<div class="col-3">
    <a href="home" style="margin: 10px">Войти</a>
</div>
<div class="col-6">
    <form action="registration" method="post" id="registration-form">
        <div class="form-group row">
            <label class="col-4" for="email">E-mail </label>
            <div class="col-8">
                <input class="form-control" type="email" name="email" id="email" minlength="8" maxlength="50" placeholder="E-mail" required value="<?= $formData['email'] ?>">
            </div>
            <div class="error-field col-11" id="email-error">
                <?php
                if($_GET['error'] == 'email'){
                    echo $_GET['errorValue'];
                }
                ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="login">Логин </label>
            <div class="col-8">
                <input class="form-control" type="text" name="login" id="login" minlength="5" maxlength="30" placeholder="Логин" required value="<?= $formData['login'] ?>">
            </div>
            <div class="error-field col-11" id="login-error">
                <?php
                if($_GET['error'] == 'login'){
                    echo $_GET['errorValue'];
                }
                ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="name">Имя </label>
            <div class="col-8">
                <input class="form-control" type="text" name="name" id="name" minlength="5" maxlength="30" placeholder="Имя" required value="<?= $formData['name'] ?>">
            </div>
            <div class="error-field col-11" id="name-error">
                <?php
                if($_GET['error'] == 'name'){
                    echo $_GET['errorValue'];
                }
                ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="password">Пароль </label>
            <div class="col-8">
                <input class="form-control" type="password" name="password" id="password" minlength="8" maxlength="30" placeholder="Пароль" required>
            </div>
            <div class="error-field col-11" id="password-error">
                <?php
                if($_GET['error'] == 'password'){
                    echo $_GET['errorValue'];
                }
                ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="repeat-password">Пароль </label>
            <div class="col-8">
                <input class="form-control" type="password" id="repeat-password" minlength="8" maxlength="30" placeholder="Повторите пароль" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="birthDate">Дата рождения </label>
            <div class="col-8">
                <input class="form-control" type="date" name="birthDate" id="birthDate" min="1940-12-12" max="2010-12-12" required value="<?= $formData['birthDate'] ?>">
            </div>
            <div class="error-field col-11" id="birthDate-error">
                <?php
                if($_GET['error'] == 'birthDate'){
                    echo $_GET['errorValue'];
                }
                ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="selectedCountry">Страна </label>
            <div class="col-8">
                <select class="form-control" name="selectedCountry" id="country">
                    <?= $formData['countries'] ?>
                </select>
            </div>
            <div class="error-field col-11" id="country-error">
                <?php
                if($_GET['error'] == 'country'){
                    echo $_GET['errorValue'];
                }
                ?>
            </div>
        </div>
        <div class="form-check">
            <label class="form-check-label" for="agreement">
                <input class="form-check-input" type="checkbox" name="agreement" id="agreement">
                <a href="" target="_blank">Соглашение с условиями</a>
            </label>
            <div class="error-field" id="agreement-error">

            </div>
        </div>
        <input id="registration-btn" class="btn btn-default" type="submit" value="Зарегистрироватся">
    </form>
</div>
<div class="col-3" id="registration-tooltip">
    <div class="rules" id="email-rules">
        Введите корректный email
    </div>

    <div class="rules" id="login-rules">
        Login должен состоять из 5-30 символов
        (английские буквы, цифры, - и _),
        цифры и символы (-, _) не должны стоять
        больше 2 подряд.
    </div>
    <div class="rules" id="name-rules">
        Имя должно состоять из 5-30 символов
        (английские буквы или русские).
    </div>
    <div class="rules" id="password-rules">
        Пароль может состоять из 8-30 символов
        (английские буквы, цифры, - и _),
        символы (-, _) не должны стоять
        больше 1 подряд.
    </div>
    <div class="rules" id="repeat-password-rules">
        Подтвердите пароль
    </div>
    <div class="rules" id="birthDate-rules">
        Выберите дату
    </div>
    <div class="rules" id="country-rules">
    </div>
    <div class="rules" id="agreement-rules">
        Прочитайте и примите условия!
    </div>
    <div style="color: red">
        <?php
            if($_GET['error'] == 'database'){
                echo $_GET['errorValue'];
            }
        ?>
    </div>
</div>
</body>
</html>