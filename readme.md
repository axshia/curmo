# CURMO (クルモ)

快適なカーライフを送るためのQ&Aコミュニティサイトです。

## 言語・フレームワーク

- Laravel 5.2
- PHP 7

## インストール

### nodeモジュール群インストール
```
npm install
```

### PHPモジュール郡イcd ..ンストール
```
composer install
```

### Vagrantセットアップ
```
vagrant box add laravel/homestead
git clone https://github.com/laravel/homestead.git Homestead
cd Homestead
sh init.sh
cd ../
php vendor/bin/homestead make
vagrant up
```

### マイグレーション
```
vagrant ssh
cd /vagrant
php artisan migrate
```

### scss/jsコンパイル
```
gulp default
gulp watch
```