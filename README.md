# sumiqulo
# アプリ名

SUMIQULO

## アプリの概要

ブランド「SUMIQULO」の商品をオンラインで購入できるECサイトです。

・ユーザー登録機能
・ログイン機能
・管理者用の機能
	・商品登録
・カート登録機能
・商品購入機能
・購入履歴機能

## DB関連スクリプト

データベース作成

```sql
  CREATE DATABASE sumiqulo_db;
  CREATE USER sumiqulo_user IDENTIFIED BY '1234';
  GRANT ALL ON sumiqulo_db.* TO sumiqulo_user;
  ```

  テーブル作成(6)

  1.users(ユーザー情報を保存するテーブル)
  2.items(商品情報を保存するテーブル)
  3.categories(商品のカテゴリーを保存するテーブル)
  4.sizes(服、靴のサイズのテーブル)
  5.carts(カート内情報を保存するテーブル)
  6.purchase_informations(購入情報を保存するテーブル)
  7.purchase_information_details(購入明細を保存するテーブル)

  ```sql
CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nick_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(25) NOT NULL,
  first_name VARCHAR(25) NOT NULL,
  postal_code CHAR(7) NOT NULL,
  address VARCHAR(100) NOT NULL,
  telephon_number VARCHAR(11) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE KEY,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE items (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  category_id INT NOT NULL,
  size_id INT NOT NULL,
  unit_price INT NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_items_category_id
    FOREIGN KEY (category_id) 
    REFERENCES  categories (id)
    ON DELETE CASCADE ON UPDATE CASCADE
  CONSTRAINT fk_items_size_id
    FOREIGN KEY (size_id) 
    REFERENCES  sizes (id)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE categories (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE sizes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  genre TINYINT NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE carts (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  item_id INT NOT NULL,
  quantity INT NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_carts_user_id
    FOREIGN KEY (user_id) 
    REFERENCES  users (id)
    ON DELETE CASCADE ON UPDATE CASCADE
  CONSTRAINT fk_carts_item_id
    FOREIGN KEY (item_id) 
    REFERENCES  items (id)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE purchase_informations (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  purchase_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_purchase_informations_user_id
    FOREIGN KEY (user_id) 
    REFERENCES  users (id)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE purchase_informations_details (
  id INT PRIMARY KEY AUTO_INCREMENT,
  purchase_id INT NOT NULL,
  item_id INT NOT NULL,
  quantity INT NOT NULL,
  unit_price INT NOT NULL,
  money INT NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_purchase_informations_details_purchase_id
    FOREIGN KEY (purchase_id) 
    REFERENCES  purchase_informations (id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_purchase_informations_details_item_id
    FOREIGN KEY (item_id) 
    REFERENCES  items (id)
    ON DELETE CASCADE ON UPDATE CASCADE
);
