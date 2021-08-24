# Site Contro de Estoque
Olá, tudo bem? Bom, para rodar está aplicação em *localhost* você deverá seguir os passos abaixo.

### Dependências
Na sua máquina você terá que ter:
 - [PHP] (>= 7.4)
 - [MySQL] (>=5.7)

### Instalando
```sh
git clone https://github.com/jooaos/controle_estoque.git
cd controle_estoque
composer install
npm install
cp env.example .env
php artisan key:generate
```

Crie em seu localhost um banco de dados MySql com o padrão **utf8_general_ci**. Com o banco de dados criado, edite as linhas 12, 13 e 14 do arquivo .env com os dados do banco criado, e em seguida faça:

```sh
php artisan migrate:fresh --seed
php artisan serve 
```
Para logar na página, utilize as credenciais:
Login   | Senha
------- | ------
usuario@exemplo.com | password

[//]: #
   [PHP]: <https://www.php.net/>
   [MySQL]: <https://www.mysql.com/>
