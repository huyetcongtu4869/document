<?php include_once "views/client/header.php" ?>
<div class="slideshow-container">
    <div class="mySlides fade"><img src="public/img/client/banner.jfif" alt=""></div>
    <div class="mySlides fade"><img src="public/img/client/banner.jfif" alt=""></div>
    <div class="mySlides fade"><img src="public/img/client/banner.jfif" alt=""></div>
</div>
<br>
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>
<div class="products">
    <div class="title">
        <h2>Our Products</h2>
    </div>
    <div class="slider">
        <?php foreach (hang_hoa_all() as $value) : ?>
            <div class="item">
                <a href="?ctr=detail&Id=<?= $value['Id'] ?>"><img src="public/img/img-product/<?= $value['productImage'] ?>" alt=""></a>
                <div class="title-product"><a href="">
                        <h4><?= $value['productName'] ?></h4>
                    </a></div>
                <div class="price">
                    <p>$ <?= $value['productPrice'] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<div class="products">
    <div class="title">
        <h2>Top 10 Products</h2>
    </div>
    <div class="slider">
        <?php foreach (top10() as $value) : ?>
            <div class="item">
                <a href="?ctr=detail&Id=<?= $value['Id'] ?>"><img src="public/img/img-product/<?= $value['productImage'] ?>" alt=""></a>
                <div class="title-product"><a href="">
                        <h4><?= $value['productName'] ?></h4>
                    </a></div>
                <div class="price">
                    <p>$<?= $value['productPrice'] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php include_once "views/client/footer.php" ?>