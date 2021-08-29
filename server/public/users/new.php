
<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include_once __DIR__ . '/../common/_head.php' ?>
</head>

<body>
    <?php include_once __DIR__ . '/../common/_header.php' ?>

        <div class="wrapper user-wrapper">
        <div class="form-main">
            <h2 class="title">アカウント登録</h2>
            <form action="create.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">メールアドレス<span class="required">必須</span></label>
                    <input type="email" id="email" name="user[email]" placeholder="メールアドレスを入力してください" required>
                </div>
                <div class="form-group">
                    <label for="nick_name">ニックネーム<span class="required">必須</span></label>
                    <input type="text" id="nick_name" name="user[nick_name]" placeholder="ユーザー名を入力してください" required>
                </div>
                <div class="form-group">
                    <label for="last_name">姓<span class="required">必須</span></label>
                    <input type="text" id="last_name" name="user[last_name]" placeholder="名字を入力してください" required>
                </div>
                <div class="form-group">
                    <label for="first_name">姓<span class="required">必須</span></label>
                    <input type="text" id="first_name" name="user[first_name]" placeholder="名前を入力してください" required>
                </div>
                <div class="form-group">
                    <label for="postal_code">郵便番号<span class="required">必須</span></label>
                    <input type="text" id="postal_code" name="user[postal_code]" placeholder="郵便番号を入力してください" required>
                </div>
                <div class="form-group">
                    <label for="address">住所<span class="required">必須</span></label>
                    <input type="text" id="address" name="user[address]" placeholder="住所を入力してください" required>
                </div>
                <div class="form-group">
                    <label for="telephon_number">電話番号<span class="required">必須</span></label>
                    <input type="text" id="telephon_number" name="user[telephon_number]" placeholder="電話番号を入力してください" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" value="登録">
                </div>
            </form>
        </div>
    </div>


    <?php include_once __DIR__ . '/../common/_footer.php' ?></body>
</html>
