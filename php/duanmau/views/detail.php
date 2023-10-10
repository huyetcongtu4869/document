<?php include_once "views/client/header.php" ?>
<?php
$idUser = "";
if (isset($_SESSION["userName"])) {
    $idUser = $_SESSION['Id'];
} else {
    $idUser = "chưa đăng nhập";
};
?>
<div class="product">
    <div class="main">
        <div class="image"><img src="public/img/img-product/<?= $products['productImage'] ?>" alt=""></div>
        <div class="info">
            <div class="name">
                <h1><?= $products['productName'] ?></h1>
            </div>
            <div class="price-prt">
                <p>Price: <?= $products['productPrice'] ?></p>
            </div>
            <div class="desc">
                <span><?= $products['productDesc'] ?></span>
            </div>
            <div class="desc">
                <span>Sản phẩm liên quan:
                    <?php foreach (product_category($products['categoryId']) as  $value) : ?>
                        <a href="?ctr=detail&Id=<?= $value['Id'] ?>">
                            <?php
                            if ($products['productName'] != $value['productName']) {
                                echo $value['productName'];
                            }
                            ?> </a>
                    <?php endforeach ?>

                </span>
            </div>
        </div>
    </div>

    <div class="comment">
        <h2 style="margin-bottom: 20px;">Comment about product1</h2>
        <div class="form-comment">
            <form action="?ctr=save-comment" method="post" enctype="multipart/form-data">
                <input type="text" hidden name="idProduct" value="<?= $products['Id'] ?>">
                <input type="text" hidden name="idUser" value="<?= $idUser ?>">
                <textarea name="content" id="" cols="30" rows="10"></textarea><br>
                <button type="submit" name="send" id="send">Send comment</button>
            </form>
        </div>
        <div class="list-comment">
            <?php foreach ($comment as $value) : ?>
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
            <?php endforeach ?>
            
        </div>
    </div>
</div>
<?php include_once "views/client/footer.php" ?>
