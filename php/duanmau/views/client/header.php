<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/clients/style.css">
    <link rel="stylesheet" href="public/css/clients/product.css">
    <link rel="stylesheet" href="public/css/clients/list.css">
    <script src="https://kit.fontawesome.com/7f94bdf8ac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .slick-prev:before,
        .slick-next:before {
            font-family: fontawesome;
            font-size: 30px;
            color: black;
        }

        .slick-prev:before {
            content: '\f100';
        }

        .slick-next:before {
            content: '\f101';
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo"><a href="?ctr=home"><img src="public/img/client/Logo.png" alt=""></a></div>
            <div class="menu">
                <ul>
                    <li><a href="?ctr=home">Home</a></li>
                    <li><a href="?ctr=about">About Us</a></li>
                    <li><a href="?ctr=contact">Contact Us</a></li>
                    <li><a href="#">Category</a>
                        <ul class="sub">
                            <?php foreach (category_all() as $value) : ?>
                                <?php
                                if ($value['categoryId'] != 22) {
                                    echo "<li><a href='?ctr=list&categoryId=" . $value['categoryId'];
                                    echo "'>" . $value['categoryName'];
                                    echo "</a></li>";
                                } ?>
                            <?php endforeach ?>
                        </ul>

                    </li>
                </ul>
            </div>
            <form action="?ctr=shearch_home" method="post" class="search" enctype="multipart/form-data">
                <input type="text" name="productName" placeholder="Search...">
                <button class="btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="authenticate">
                <?php
                session_start();
                if (isset($_SESSION["userName"])) {
                    echo " 
                    <div class='acc'>
                    <div class='user'>
                      <p>Welcome, </p>
                      <p class='nu'>" . $_SESSION["userName"] . "</p>
                    </div>
                    <div class='avartar'><img src='public/img/img-user/" . $_SESSION["avartar"] . "' alt='avartar'></div>
                    <div class='setting-account'>
                    <a href='?ctr=sign-out'>Sign out</a><br>
                    <a href='?ctr=acc-setting&id=" . $_SESSION["Id"] . "'>Account setting</a>
                    </div>
                    </div>
                    ";
                } else {
                    echo "
                    <div class='sign'>
                        <button id='signin'><a href='?ctr=form-sign-in'>Sign in</a></button>
                        <button id='signup'><a href='?ctr=form-sign-up'>Sign up</a></button>
                    </div>
                    ";
                }
                ?>
            </div>
        </header>