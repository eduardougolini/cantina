
<head>
    <title>Cantina - Login</title>
    <link href="css/login.css" rel="stylesheet" type="text/css"/>
    <script src="js/vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link href="css/mdl/1.3.0/material.cyan-light_blue.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/vendor/mdl/1.3.0/material.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
</head>

<body>
    <form class="login" action="/login/authenticate" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input usermail" name="usermail" type="email" />
            <label class="mdl-textfield__label">Email...</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input password" name="password" type="password" />
            <label class="mdl-textfield__label">Senha...</label>
        </div>
        <input class="mdl-button mdl-js-button mdl-button--primary submit" name="submit" type="submit" value="Login"/>
        <a class="forgotPassword">Esqueci minha senha</a>
    </form>
</body>