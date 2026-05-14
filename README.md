【開発環境設定】
◯開発環境のクローン
\\cd ~coachtech/laravel\\
\\git clone [git@github.com](mailto:git@github.com):Estra-Coachtech/laravel-docker-template.git\\
\\mv laravel-docker-template contact-form\\

◯リモートURLを変更
\\cd contact-form\\
\\git remote set-url origin 作成したリポジトリのurl\\
\\git remote -v\\

◯ローカルリポジトリのデータをリモートに反映
\\git add .\\
\\git commit -m "リモートリポジトリの変更"\\
\\git push -u origin main\\

◯コンテナの作成・起動
\\docker-compose up -d --build\\

◯Laravelパッケージのインストール
\\docker-compose exec php bash\\
\\composer install\\

◯.envファイルの作成(.env.exampleからのコピー)
\\cp .env.example .env\\
\\exit\\

◯.envファイルの編集
(変更前)
\\DB_CONNECTION=mysql
DB_HOST=127.0.01
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=\\

(変更後)
\\DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass\\