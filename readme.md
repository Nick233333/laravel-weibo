框架版本：laravel5.5

运行环境

```
php7+
nginx1.10+
mysql5.7+
redis4.0+
node10+
composer
```

部署执行以下命令

```    
sudo chmod -R 777 bootstrap/cache
sudo chmod -R 777 storage
sudo cp .env.example .env
sudo composer install
sudo cnpm install
sudo npm run dev
sudo php artisan key:generate
php artisan migrate
 ```   