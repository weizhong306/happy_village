# happy-village(快樂農村系統)

## 環境
* PHP 8.2 
* MySQL 8.2
* test24

## 初始化設定

### 安裝
```bash
composer install
```

### 設定.env
1. 生成.env檔案

    ```bash
    cp .env.example .env
    ```

2. 生成APP_KEY

    ```bash
    php artisan key:generate
    ```
3. .env資料庫設定並初始化
4. 產生一組製作token的金鑰
    ```bash
    php artisan passport:keys

    php artisan passport:client --personal
    ```
    會出現詢問，直接Enter即可，之後會出現
    ```
    Personal access client created successfully
    Client ID: XX
    Client secret: XXXXXXXX
    ```
5. .env 需要設定參數
    * APP_DEBUG: 有放到線上機器，都要設定成false。本地的話，可以設定成true
    * PASSPORT_PERSONAL_ACCESS_CLIENT_ID 請填入第3步驟出現的Client ID
    * PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET請填入第3步驟出現的Client secret
    * BACKEND_URL後端網址，請使用對外ip，不要用localhost，主要是設定寄信的圖片URL
    * FRONTEND_RESET_URL 前端忘記密碼的URL
    ``` .env
    APP_NAME=人資系統
    APP_ENV=local
    APP_DEBUG=false
    APP_URL=http://localhost:8080

    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=

    BACKEND_URL=
    FRONTEND_RESET_URL=

    PASSPORT_PERSONAL_ACCESS_CLIENT_ID=
    PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET=
    ```

## 資料庫異動的操作

### 初始化資料，只有專案剛建立時
```
php artisan migrate:refresh --seed
```
### 資料庫異動
```
php artisan migrate
```

### 需要預先填入某些資料時
            
```
php artisan db:seed --class=XXXX
```