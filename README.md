PHP Http Logs Analyzer
==================

Описание
-----
Данная программа для анализа acess log файлов.

Необходимые компоненты
-----
- PHP 7.4
- Composer

Установка
-----
```shell
composer install
```

Запуск
-----
```shell
php parser.php ./acess_log
```

Вывод
-----
```shell
{
    "views": 16,
    "lines": 24,
    "urls": 5,
    "traffic": 187990,
    "crawlers": {
        "google": 2,
        "bing": 0,
        "baidu": 0,
        "yandex": 0
    },
    "statusCodes": {
        "200": 14,
        "301": 2
    }
}
```