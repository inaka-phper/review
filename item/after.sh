cd /home/vagrant/item
cp .env.example .env
composer self-update
php artisan migrate
php artisan db:seed
mysql -uhomestead -psecret -e "create database testing";
