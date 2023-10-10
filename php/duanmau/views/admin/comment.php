<?php include_once "views/admin/layout/header.php" ?>
<h1>Bình luận về sản phẩm
</h1>
</div>
<div class="list-comment">
    <?php foreach ($comment as $key => $value) : ?>
        <div class="user">
            <div class="avartar"><img src="public/img/img-user/<?= user_one($value['idUser'])['avartar'] ?>" alt=""></div>
            <div class="content">
                <div class="user-name">
                    <p><?= user_one($value['idUser'])['userName'] ?></p>
                    <p class="date" style="color: black;"><?= $value['date'] ?></p>
                </div>
                <div class="user-comment">
                    <span><?= $value['content'] ?></span>
                </div>
            </div>
        </div> 
        <button class="delete-comment"><a href="?ctr=del-comment&Id=<?= $value['Id'] ?>" onclick="return confirm('Bạn có xác nhận xóa không?')">Xóa</a></button>

    <?php endforeach ?>
</div>
</article>