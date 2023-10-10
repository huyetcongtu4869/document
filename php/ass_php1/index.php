<?php
include "./model/connect.php";
$queryprd = "select * from products";
$querycate = "select * from categoryname";
$prds = getAll($queryprd);
$cates = getAll($querycate);
// $querynbprd="select count(id) from categoryname";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">Catelouge</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Blog</a></li>
                </ul>
            </nav>
            <div class="logo"><img src="image/img-user/logo.jpg" alt=""></div>
            <div class="user-signin">
                <?php
                session_start(); //bắt đầu session
                if (isset($_SESSION["username"])) { //kiểm tra xem trong session có tồn tại username hay không, nếu tồn tại thì hiển thị nội dung bên dưới
                    echo "<div class='ring'><img src='image/img-daboard/ring.png' alt=''></div>";
                    echo "<div class='user'>";
                    echo "<p>";
                    echo $_SESSION["username"]; //hiển thị username
                    echo "</p>";
                    echo "</div>";
                    echo "<div class='avartar'><img src='";
                    echo $_SESSION["avartar"];
                    echo "' width='100%' height='100%'></div>";
                    echo "<a href='./controller/logout.php'><button>Logout</button></a>"; //thẻ a điều hướng sang logout.php trong thư mục controller để xử lý việc logout
                } else {
                    echo "<a href='./view/login.php'><button class='btn-login'>Đăng Nhập</button></a>";
                    echo "<a href='./view/register.php'><button class='register'>Đăng ký</button></a>";
                }
                ?>
            </div>
        </header>
        <div class="banner" style="margin-bottom: 40px;">
            <img src="image/img-user/tải xuống.jfif" alt="">
            <img src="image/img-user/67a417a7-6a94-4f3a-8d2a-cfb679905b19.png" alt="">
            <img src="image/img-user/294463564_596817345446666_7430418596151638515_n.png" alt="">
            <img src="image/img-user/Gundam-Battle-Android-1.jpg" alt="">
        </div>
        <div class="product">
            <div class="title">
                <h2>New item</h2>
                <div></div>
            </div>
            <section class="slider">
                <?php foreach ($prds as $key => $value) : ?>
                    <article>
                        <img src="<?php echo "$value[productImage]" ?>" alt="">
                        <div class="bestsellers-info">
                            <a href="">
                                <h4><?php echo "$value[productName]"?></h4>
                            </a>
                            <p class="price"><?php echo "$value[productPrice]"?>$</p>
                        </div>
                    </article>
                <?php endforeach ?>
            </section>
        </div>
        <hr>
        <div class="category">
            <div class="title">
                <h2>Categories</h2>
            </div>
            <section class="slider-cate">
                <!-- <article>
                    <img src="image/img-user/item-category.jfif" alt="">
                    <div class="info-cate">
                        <p>SD</p>
                        <p class="number-product"> 2 product</p>
                    </div>
                </article> -->
                <?php foreach ($cates as $key => $value) : ?>
                    <article>
                        <img src="<?php echo "$value[categoryImage]" ?>" alt="">
                        <div class="info-cate">
                            <a href="">
                                <h4><?php echo "$value[categoryName]"?></h4>
                            </a>
                            <p class="number-product"> 2 product</p>
                        </div>
                    </article>
                <?php endforeach ?>
            </section>
        </div>
        <hr>
        <div class="Bestsellers">
            <div class="title">
                <h2>Bestsellers</h2>
                <div></div>
            </div>
            <section class="slider">
                <?php foreach ($prds as $key => $value) : ?>
                    <article>
                        <img src="<?php echo "$value[productImage]" ?>" alt="">
                        <div class="bestsellers-info">
                            <a href="">
                                <h4><?php echo "$value[productName]"?></h4>
                            </a>
                            <p class="price"><?php echo "$value[productPrice]"?>$</p>
                        </div>
                    </article>
                <?php endforeach ?>
            </section>
        </div>
        <hr>
        <div class="support">
            <section>
                <article>
                    <i class="fa-solid fa-shield"></i>
                    <h6>Security</h6>
                    <p>100% save online payments</p>
                </article>
                <article>
                    <i class="fa-solid fa-repeat"></i>
                    <h6>30 days return period
                    </h6>
                    <p>Easy returns & refunds</p>
                </article>
                <article>
                    <i class="fa-solid fa-life-ring"></i>
                    <h6>Customer support
                    </h6>
                    <p>We are here 24/7</p>
                </article>
                <article>
                    <i class="fa-solid fa-truck"></i>
                    <h6>Flexible shipping
                    </h6>
                    <p>Maximum comfort</p>
                </article>
            </section>
        </div>
        <footer>
            <div>
                <div class="logo-footer"><img src="image/img-user/logo.jpg" width="200" height="100" alt=""></div>
                <div class="info-footer">
                    <div class="about-shop">
                        <h4>About shop</h4>
                        <a href=""><span>Ubout us</span></a><br>
                        <a href=""><span>Contact</span></a><br>
                        <a href=""><span>Blog</span></a><br>
                        <a href=""><span>Site map</span></a><br>
                    </div>
                    <div class="custommer-info">
                        <h4>Customer info</h4>
                        <a href=""><span>Payment</span></a><br>
                        <a href=""><span>Delivery</span></a><br>
                        <a href=""><span>Order tracking </span></a><br>
                        <a href=""><span>Exchanges & returns</span></a><br>
                    </div>
                    <div class="catelouge">
                        <h4>Catalogue</h4>
                        <a href=""><span>New incomes</span></a><br>
                        <a href=""><span>Bestsellers</span></a><br>
                        <a href=""><span>Sale</span></a><br>
                    </div>
                    <div class="connect">
                        <h4>Connect</h4>
                        <a href="">
                            <i class="fa-brands fa-facebook"> Facebook</i>
                        </a><br>
                        <a href="">
                            <i class="fa-brands fa-youtube"> Youtube</i>
                        </a><br>
                        <a href="">
                            <i class="fa-brands fa-tiktok"> Tiktok</i>
                        </a><br>
                        <a href=""><i class="fa-brands fa-instagram"> Instagram</i></a><br>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://kit.fontawesome.com/e599b16f5c.js" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.banner').slick({
                slidesToShow: 1,
                prevArrow: false,
                nextArrow: false,
                autoplay: true,
                autoplaySpeed: 1500,
                dots: true,
            });
        });
        $(document).ready(function() {
            $('.slider').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                draggable: false,
                prevArrow: `<button type='button' class='slick-prev slick-arrow'><i class="fa-solid fa-angle-left"></i></ion-icon></button>`,
                nextArrow: `<button type='button' class='slick-next slick-arrow'><i class="fa-solid fa-angle-right"></i></ion-icon></button>`,
            });
        });
        $(document).ready(function() {
            $('.slider-cate').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                draggable: false,
                prevArrow: `<button type='button' class='slick-prev slick-arrow'><i class="fa-solid fa-angle-left"></i></ion-icon></button>`,
                nextArrow: `<button type='button' class='slick-next slick-arrow'><i class="fa-solid fa-angle-right"></i></ion-icon></button>`,
            });
        });
    </script>
</body>

</html>