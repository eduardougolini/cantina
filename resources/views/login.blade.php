
<head>
    <title>Cantina - Login</title>
    <link href="css/login.css" rel="stylesheet" type="text/css"/>
    <script src="js/vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
</head>

<body>
    <form class="login" action="/login/authenticate" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="userImage">
            <img src="css/images/user.png" width="150px"/>
        </div>
        <input class="usermail" name="usermail" type="email" placeholder="Email" />
        <input class="password" name="password" type="password" placeholder="Senha"/>
        <input class="submit" name="submit" type="submit" value="Login"/>
        <a class="forgotPassword">Esqueci minha senha</a>
    </form>
</body>