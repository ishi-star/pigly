# PiGLy

## 環境構築
### Dockerをビルド
- git clone git@github.com:estra-inc/confirmation-test-contact-form.git
- DockerDesktopアプリを立ち上げる
- docker-compose up -d --build
### Laravel環境構築
-　docker-compose exec php bash
- composer install
- .env.exampleをコピーし.envファイルを作る
- .envを変更

- php artisan migrate
- php artisan db:seed

## 使用技術実行環境）
- laravel 8.83.8
- php 8.3.6
- MySQL 8.0.42
- 
## URL
- 開発環境：http://localhost/
- phpMyAdmin:：http://localhost:8080/
