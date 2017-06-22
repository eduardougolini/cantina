## ![#1589F0](https://placehold.it/15/1589F0/000000?text=+) Instalação

### Laravel
  - Para instalar o projeto, faça um git clone para sua máquina.
  - Remova o composer.lock para poder atualizar as dependências do projeto
  - Rode o comando ```composer install``` para instalar as dependências do projeto
  
### MySQL
  - Para criar o banco da aplicação, basta executar o conteúdo do arquivo ```databaseGenerator.sql```
  - Para configurar suas configurações de usuário e senha do bando de dados na aplicação, modifique o arquivo ```config/database.php```
  
### Configuração do apache
  **Para distribuições linux baseadas em Debian, siga os seguintes passos:**
  - Crie o arquivo /etc/apache2/sites-available/cantina.conf
  - Insira o seguinte código no arquivo:
  ```
  <VirtualHost *:80>
        ServerName cantina.com
        DocumentRoot {{path-aplicacao}}/public
        ServerAlias *.cantina.com
        DirectoryIndex index.php

        <Directory {{path-aplicacao}}/public>
                Options +Indexes +FollowSymLinks +MultiViews
                AllowOverride All
                Allow from All
                Require all granted
        </Directory>
</VirtualHost>

<VirtualHost *:443>
    ServerName cantina.com
    ServerAlias *.cantina.com
    DocumentRoot "{{path-aplicacao}}/public"
    DirectoryIndex app.php index.php index.htm index.html app_dev.php

    SSLEngine on
    SSLCertificateFile {{path-aplicacao}}/certificado/cantina.crt
    SSLCertificateKeyFile {{path-aplicacao}}/certificado/cantina.key
    <Directory "{{path-aplicacao}}/public">
        Options +Indexes +FollowSymLinks +MultiViews
        AllowOverride All
        Allow from All
    </Directory>

</VirtualHost>
```
*Atualize os campos sinalizados com ```{{path-aplicacao}}``` para o local onde o projeto foi clonado*
- Rode o comando ```a2ensite cantina``` 
- Reinicie o serviço do apache com ```sudo systemctl restart apache2```
- Insira a linha ```127.0.0.1       cantina.com``` no arquivo ```/etc/hosts```
- Caso a máquina tenha o pacote dnsmasq instalado, execute o comando ```sudo systemctl restart dnsmasqd```

### Rotas principais
  - [login](http://cantina.com/login) -> Reponsável pela tela de login de um usuário
  - [cadastro](http://cantina.com/cadastro) -> Responsável pela tela de cadastro de um usuário
  
### Criação de usuário 'Manager'
  - Crie um usuário comum na tela de [cadastro](http://cantina.com/cadastro)
  - Insira diretamente no banco de dados uma regra na tabela ```users_has_role``` responsável por linkar o novo usuário com a role `Manager`
  
## ![#f03c15](https://placehold.it/15/f03c15/000000?text=+) Diferenciais do nosso sistema:
  - Nosso sistema tem uma feature apelidada de *Wallet*, ela possibilita que um usuário possa gerar boletos para ter um crédito em uma carteira online, podendo assim, utilizar o saldo de sua carteira para realizar compras na cantina.
  - Nosso sistema utiliza algumas das mais novas tendências de desenvolvimento front-end web da atualidade(2017), como o [Material Design](https://getmdl.io/) e o [Polymer](https://www.polymer-project.org/)
  - Para o back-end, integramos o framework de Mapeamento Objeto-Relacional(ORM) [Doctrine ORM](http://www.doctrine-project.org/) para cuidar do nosso acesso ao banco de dados e da nossa lista de controle de acesso(ACL).
