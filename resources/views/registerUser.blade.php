<head>
    <title>Cantina - Registro de usuário</title>
    <link href="css/registerUser.css" rel="stylesheet" type="text/css"/>
    <script src="js/vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link href="css/mdl/1.3.0/material.cyan-light_blue.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/vendor/mdl/1.3.0/material.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="import" href="Polymer/bower_components/app-datepicker/app-datepicker.html">
    <script src="js/registerUser.js" type="text/javascript"></script>
</head>

<body>
    <form class="register" action="{{ URL::route('registerNewUser') }}" method="POST">
        <div class="left">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input username" name="username" type="text" />
                <label class="mdl-textfield__label">Nome completo...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input responsibleName" name="responsibleName" type="text" />
                <label class="mdl-textfield__label">Nome do responsável...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input usermail" name="usermail" type="email" />
                <label class="mdl-textfield__label">Email...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input password" name="password" type="password" />
                <label class="mdl-textfield__label">Senha...</label>
            </div>
        </div>
        <div class="middle">
            <span>Data de nascimento...</span>
            <dom-bind>
                <template is="dom-bind" id="datepicker">
                    <app-datepicker  class="birthDate" auto-update-date="true" on-date-changed="_onSelectedDateChanged" view="horizontal"></app-datepicker>
                </template>
            </dom-bind>
        </div>
        <div class="right">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input cpf" type="text" name="cpf" pattern="-?[0-9]*(\.[0-9]+)?" />
                <label class="mdl-textfield__label">CPF...</label>
                <span class="mdl-textfield__error">Apenas números são aceitos!</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input rg" name="rg" type="text">
                <label class="mdl-textfield__label">RG...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input registration" name="registration" type="text" />
                <label class="mdl-textfield__label">Matrícula...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input phone" name="phone" pattern="-?[0-9]*" type="text" />
                <label class="mdl-textfield__label">Telefone...</label>
            </div>
        </div>
        <input class="mdl-button mdl-js-button mdl-button--primary submit" name="submit" type="submit" value="Cadastrar"/>
    </form>
</body>