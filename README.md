【開発環境設定】

◯開発環境のクローン
```bash
cd ~/coachtech/laravel
```
```bash
git clone git@github.com:Estra-Coachtech/laravel-docker-template.git
```
```bash
mv laravel-docker-template contact-form
```

◯リモートURLを変更
```bash
cd contact-form
```
```bash
git remote set-url origin 作成したリポジトリのURL
```
```bash
git remote -v
```

◯ローカルリポジトリのデータをリモートに反映
```bash
git add .
```
```bash
git commit -m "リモートリポジトリの変更"
```
```bash
git push -u origin main
```

◯コンテナの作成・起動
```bash
docker compose up -d --build
```

◯Laravelパッケージのインストール
```bash
docker compose exec php bash
```
```bash
composer install
```

◯.envファイルの作成(.env.exampleからのコピー)
```bash
cp .env.example .env
```

◯.envファイルの編集
(変更前)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

(変更後)
```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

◯APP_KEYの作成
```bash
php artisan key:generate
```
◯マイグレーションの実行
```bash
php artisan migrate
```