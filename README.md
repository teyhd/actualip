# PHP IP updater
## Функция
Обновление DNS записи cloudflare для динамического IP
## Алгоритм
>  1. Получает внешний IP адрес сервера с [Яндекса](https://yandex.ru/internet/)
>  1. Сравнивает текущий IP домена с DNS записью в Cloudflare.
>  1. Если адреса разные изменяет А запись.

### Установка

```sh
$ apt-get install apache2 php mysql
$ git clone https://github.com/teyhd/actualip.git
```
- Заполнить config.php
