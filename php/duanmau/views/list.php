<?php include_once "views/client/header.php" ?>
<div class="banner">
    <img src="public/img/client/banner.jfif" alt="">
</div>
<div class="content-list">
    <nav>
        <h3>Category</h3>
        <ul>
            <?php foreach (category_all() as $value) : ?>
                <?php
                if ($value['categoryId'] != 22) {
                    echo "<li><a href='?ctr=list&categoryId=" . $value['categoryId'];
                    echo "'>" . $value['categoryName'];
                    echo "</a></li>";
                } ?>
            <?php endforeach ?>
        </ul>
    </nav>
    <main>
        <div class="title">
            <h2>Our Products</h2>
        </div>
        <section>
            <?php foreach ($products as $value) : ?>
                <article>
                    <a href="?ctr=detail&Id=<?= $value['Id'] ?>"><img src="public/img/img-product/<?= $value['productImage'] ?>" alt=""></a>
                    <div class="title-product"><a href="">
                            <h4><?= $value['productName'] ?></h4>
                        </a></div>
                    <div class="price">
                        <p>$<?= $value['productPrice'] ?></p>
                    </div>
                </article>
            <?php endforeach ?>
        </section>
    </main>
</div>
<?php include_once "views/client/footer.php" ?>