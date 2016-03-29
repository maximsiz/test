Тестовое задание
====================


Установка
------

```
git clone https://github.com/maximsiz/test.git test
cd test
composer global require "fxp/composer-asset-plugin:~1.1.0"
composer install
```

Измените файл с настройками для базы данных `config/db.php`:

```php
<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Выполните миграции:

```
php yii migrate
```

