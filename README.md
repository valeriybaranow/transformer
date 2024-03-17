# Запуск проекта
````
php composer.phar install
````

# Запуск текстов
````
./vendor/bin/phpunit
````

# Install PHP 7.2 phpunit 6.0.0 on Ubuntu 22.04
````
sudo apt update
sudo apt install lsb-release ca-certificates apt-transport-https software-properties-common -y
sudo add-apt-repository ppa:ondrej/php
php7.2-zip
sudo apt install php7.2 php7.2-common php7.2-cli php7.2-fpm
# переключиться на версию php
sudo update-alternatives --set php /usr/bin/php7.2
# пакеты
sudo apt-get install php7.2-mbstring php7.2-xml php7.2-zip

php composer.phar require --dev -W phpunit/phpunit 6.0.0
````
# Добавить файл конфигурации phpUnit
https://github.com/drmonkeyninja/phpunit-simple-example/blob/master/phpunit.xml