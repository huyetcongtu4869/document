let ListProduct = [
    {
        id: 1,
        name: "Big and Juicy Wagyu Beef Cheeseburger",
        price: 30,
        desc: "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.",
        image: "./src/img/index/image 26 (1).png",
        image1: "./src/img/index/Group 832.png",
        category: 1
    },
    {
        id: 2,
        name: "Fresh Lime Roasted Salmon",
        price: 10,
        desc: "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.",
        image: "./src/img/index/image 26.png",
        image1: "./src/img/index/Group 832 (1).png",
        category: 1
    },
    {
        id: 3,
        name: "The Best Easy One Pot Chicken and Rice",
        price: 20,
        desc: "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.",
        image: "./src/img/index/image 26 (2).png",
        image1: "./src/img/index/Group 832.png",
        category: 3
    },
    {
        id: 4,
        name: "Fresh and Healthy Mixed Mayonnaise ",
        price: 50,
        desc: "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.",
        image: "./src/img/index/image 26 (3).png",
        image1: "./src/img/index/Group 832 (2).png",
        category: 4
    },
    {
        id: 5,
        name: "The Creamiest Creamy Chicken",
        price: 60,
        desc: "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.",
        image: "./src/img/index/image 26 (4).png",
        image1: "./src/img/index/Group 832 (3).png",
        category: 5
    },
    {
        id: 6,
        name: "Fruity Pancake with Orange & Blueberry",
        price: 15,
        desc: "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.",
        image: "./src/img/index/image 26 (5).png",
        image1: "./src/img/index/Group 832 (4).png",
        category: 6
    }
]
let ListCategory = [
    {
        id: 1,
        name: "breakfast",
        image: "./src/img/index/Group 890.png"
    },
    {
        id: 2,
        name: "vegan",
        image: "./src/img/index/Group 879.png"
    },
    {
        id: 3,
        name: "meat",
        image: "./src/img/index/Group 891.png"
    },
    {
        id: 4,
        name: "dessert",
        image: "./src/img/index/Group 892.png"
    },
    {
        id: 5,
        name: "lunch",
        image: "./src/img/index/Group 893.png"
    },
    {
        id: 6,
        name: "chocolate",
        image: "./src/img/index/Group 894.png"
    }
]
function showProduct(dataProduct) {
    let loadProduct = document.querySelector(".table");
    if (loadProduct) {
        loadProduct.innerHTML = "";
        for (let item of dataProduct) {
            loadProduct.innerHTML += `
        <div class="colum">
        <a href="./detail.html?id=${item.id}"><img src="${item.image}" style="border-radius: 15px ;" alt=""></a>
    <a href="./detail.html?id=${item.id}">
        <div class="h3">
            <h3>${item.name}</h3>
        </div>
    </a>
        <div><img src="src/img/index/Group 831.png" style="margin-right:27.75px ;" alt="">
            <img src="${item.image1}" alt="">
        </div>
        </div>`
        }
    }
}
showProduct(ListProduct);
function showCategory() {
    let sanPham = document.querySelector(".sanpham");
    if (sanPham) {
        sanPham.innerHTML = "";
        for (let item of ListCategory) {
            sanPham.innerHTML += `<a href="./product.html?cateId=${item.id}">  
            <div class="chitiet">
            <img src="${item.image}">
            <p>${item.name}</p>
            </div></a>
          `}
    }
}
showCategory();
const filterSelect = document.querySelector("#filter-select")
function filterProduct() {
    const under30 = ListProduct.filter(function (product) {
        return product.price < 30
    })
    const over30 = ListProduct.filter(function (product) {
        return product.price > 30
    })
    if (filterSelect.value == 'under30') {
        showProduct(under30)
    }
    if (filterSelect.value == 'over30') {
        showProduct(over30)
    }
    if (filterSelect.value == 'all') {
        showProduct(ListProduct);

    }
}
if (filterSelect) {
    filterSelect.addEventListener("click", filterProduct);
}
function detailProduct() {
    let prdId = new URLSearchParams(window.location.search).get('id')
    if (prdId) {
        let product = ListProduct.find(function (item) {
            return item.id == prdId;
        })
        const detailProductDiv = document.querySelector('.banner')
        detailProductDiv.innerHTML = `
        <div>
        <h2>${product.name}</h2>
        <p class="price"><b>$${product.price}</b></p>
        <p style="font-size:18px ;">${product.desc}</p>
        <div class="quantity"> 
        <input type="text" id="quantity" placeholder="Quantity">
        <button id="card" onclick="addtocard()" type="button">Add To Cart</button>
        </div>
    </div> 
    <div class="img"><img src="${product.image}" alt=""></div>`
    }
}
detailProduct();
function listCategory() {
    const cateList = document.querySelector('#cate-list')
    if (cateList) {
        for (let item of ListCategory) {
            cateList.innerHTML += `<li><a href="./product.html?cateId=${item.id}">${item.name}</a></li>`
        }
    }
}
listCategory()
function listProductPage(data) {
    const listProductDiv = document.querySelector('.list')
    if (listProductDiv) {
        listProductDiv.innerHTML = ""
        for (let item of data) {
            listProductDiv.innerHTML += `
            <div class="sanpham2">
            <a href="./detail.html?id=${item.id}"><img src="${item.image}" style="border-radius:15px ;" alt=""></a><br>
            <div style="height:40px ;"><b>${item.name}</b></div><br>
            <img src="src/img/detail/$30.png" alt=""><br>
            <button id="add">Add To Cart</button>
        </div>`
        }
    }
}
function reRender() {
    const cateId = new URLSearchParams(window.location.search).get('cateId')
    const productByCategory = ListProduct.filter(function (item) {
        return item.id == cateId
    })
    if (cateId) {
        listProductPage(productByCategory)
    } else {
        listProductPage(ListProduct)
    }
}
reRender()
let listUser = [
    {
        id: 1,
        ten: "Amazing Exia",
        email: "amazingexia@gmail.com",
        pass: "amazingexia4869",
    }, {
        id: 2,
        ten: "Unicorn",
        email: "unicorn@gmail.com",
        pass: "unicorn4869",
    }, {
        id: 3,
        ten: "00 Quant",
        email: "00quant@gmail.com",
        pass: "00quant4869",
    }
];
let luuUsser;
function signin() {
    let signin = document.getElementById("sign-inE").value;
    let signinPass = document.getElementById("sign-inPass").value;

    if (signin == 0) {
        alert("Mời bạn nhập tài khoản");
        return false;
    }
    if (signinPass == 0) {
        alert("Mời bạn nhập mật khẩu");
        return false;
    }
    let countCheck = "";
    for (const item of listUser) {
        if (signin == item.email && signinPass == item.pass) {
            luuUsser = item.ten;
            countCheck++;
            return false;
        }
    }
    if (countCheck == 0) {
        alert("Tên tài khoản không đúng")
    }
}
function sign_inbtn() {
    let showbtn = document.querySelector("#sign-in");
    if (showbtn) {
        showbtn.innerHTML = `<a href="./index.html?user=${luuUsser}"><button type="button" onclick="signin()" id="login">login now</button></a>`
    }
}
sign_inbtn()
console.log(luuUsser);
function resign() {
    const user = new URLSearchParams(window.location.search).get('user')
    let showUsser = document.querySelector(".sign")
    if (showUsser) {
        if (user) {
            showUsser.innerHTML += `<a href="./index.html"><button id="signin">${"huynm"}</button></a>
            `
        } else {
            showUsser.innerHTML += `
            <a href="sign-in.html"><button id="signin">Sign in</button></a>
            <a href="sign-up.html"><button id="signup">Sign up</button></a>`
        }
    }

}
resign();
let saveIdUser = 3;
function signup() {
    let email = document.getElementById("email").value;
    let ten = document.getElementById("ten").value;
    let pass = document.getElementById("pass").value;
    let repass = document.getElementById("re-pass").value;
    saveIdUser++;
    let account = {
        id: saveIdUser,
        ten: ten,
        pass: pass,
        email: email,
    };
    let checkEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.match(checkEmail) == 0) {
        alert("không đúng định dạng");
        return false;
    }
    if (ten == 0 && pass == 0 && repass == 0 && email == 0) {
        alert("không được để trống ô nào");
        return;
    };

    if (ten.length < 7) {
        alert("Username tối thiểu pahir có 7 kí tự");
        return;
    };
    if (pass != repass) {
        alert("mật khẩu phải giống nhau");
    };
    listUser.push(account);
    console.log(listUser);
}
let listContact = [
    {
        _id: 1,
        _name: "Nguyễn Mạnh Huy",
        _subject: "Breakfast",
        _emailaddress: "manhjhuy@gmail.com",
        _enquirytype: "1",
        _mesages: "dead is like a wind, always by my side"
    }
]
let saveIdContact = 1;
function saveContact() {
    let name = document.getElementById("name").value;
    let subject = document.getElementById("SUBJECT").value;
    let emailaddress = document.getElementById("EMAIL ADDRESS").value;
    let enquirytype = document.getElementById("ENQUIRYTYPE").value;
    let mesages = document.getElementById("MESAGES").value;
    saveIdContact++;
    let contact = {
        _id: saveId,
        _name: name,
        _subject: subject,
        _emailaddress: emailaddress,
        _enquirytype: enquirytype,
        _mesages: mesages,
    }
    listContact.push(contact);
    console.log(listContact);
    document.getElementById("name").value = "";
    document.getElementById("SUBJECT").value = "";
    document.getElementById("EMAIL ADDRESS").value = "";
    document.getElementById("MESAGES").value = "";
}

let bloglist = [
    {
        id: 1,
        title: "Big and Juicy Wagyu Beef Cheeseburger",
        image: "./src/img/index/image 26 (1).png",
        content: "This Wagyu Burger made with American Wagyu beef is so flavorful and juicy with the perfect caramelized crust! From American wagyu to Australian Wagyu to Japanese A5 Wagyu beef, you will never want a regular hamburger again!",
        blogCateld: 1
    },
    {
        id: 2,
        title: "Fresh Lime Roasted Salmon",
        image: "./src/img/index/image 26.png",
        content: "Fresh Lime Roasted  Salmon is one of my favorite things to make. It's healthy, hearty and always satisfying. You can never have too many salmon recipes, especially when they are this good!",
        blogCateld: 1
    },
    {
        id: 3,
        title: "The Best Easy One Pot Chicken and Rice",
        image: "./src/img/index/image 26 (2).png",
        content: "The Best Easy One Pot Chicken and Rice is about to be your family's favourite. The skinless chicken thighs are tender and juicy and the rice is perfectly fluffy.",
        blogCateld: 3
    },
    {
        id: 4,
        title: "Fresh and Healthy Mixed Mayonnaise ",
        image: "./src/img/index/image 26 (3).png",
        content: "Mayonnaise has always been one of my favorite condiments, but while the store bought stuff is a convenient and cheap option.",
        blogCateld: 4
    },
    {
        id: 5,
        title: "The Creamiest Creamy Chicken",
        image: "./src/img/index/image 26 (4).png",
        content: "These three secret weapons combine to make the best creamy chicken pasta ever.",
        blogCateld: 5
    },
    {
        id: 6,
        title: "Fruity Pancake with Orange & Blueberry",
        image: "./src/img/index/image 26 (5).png",
        content: "In honour of Independence Day here's an easy recipe for American Style Blueberry and Orange Pancakes. Orange juice adds natural sweetness, so less sugar is needed, and orange zest gives a zingy fresh flavour. I like to mix wholemeal flour and white flour as it's more healthy and also gives a slight nutty flavour.",
        blogCateld: 6
    }
]
let BlogCategory = [
    {
        id: 1,
        name: "breakfast",
    },
    {
        id: 2,
        name: "vegan",
    },
    {
        id: 3,
        name: "meat",
    },
    {
        id: 4,
        name: "dessert",
    },
    {
        id: 5,
        name: "lunch",
    },
    {
        id: 6,
        name: "chocolate",
    }
]
function listCategoryBlog() {
    const cateList = document.querySelector('#blog-list')
    if (cateList) {
        for (let item of ListCategory) {
            cateList.innerHTML += `<li><a href="./blog.html?blogCateId=${item.id}">${item.name}</a></li>`
        }
    }
}
listCategoryBlog()
function listBlogPage(data) {
    const listBlogtDiv = document.querySelector('.listblog')
    if (listBlogtDiv) {
        listBlogtDiv.innerHTML = ""
        for (let item of data) {
            listBlogtDiv.innerHTML += `
            <div class="blog">
                    <div class="img"><img src="${item.image}" alt=""></div>
                    <div class="title"><b>${item.title}</b></div>
                    <div class="content"><p>${item.content}</p></div>
                </div>
        </div>`
        }
    }
}
function reRenderBlog() {
    const blogCateId = new URLSearchParams(window.location.search).get('blogCateId')
    const productByCategoryBlog = bloglist.filter(function (item) {
        return item.id == blogCateId
    })
    if (blogCateId) {
        listBlogPage(productByCategoryBlog)
    } else {
        listBlogPage(bloglist)
    }
}
reRenderBlog()

let x = -1;
function them() {
    let ten = document.getElementById("ten").value;

    let sp = {
        name: ten,

    };

    ListCategory.push(sp);
    document.getElementById("table").innerHTML = "";
    loadTable();
}
loadTable();
function loadTable() {
    let html = document.getElementById("table");
    if (html) {
        html.innerHTML = ""
        for (let i = 0; i < ListCategory.length; i++) {
            html += `<tr>
    <td>${ListCategory[i].name}</td>
    <td>
    <button onclick="capNhat(${i})">Cập nhật </Button>
    </td>
    <td>
    <button onclick="xoa(${i})">Xóa</Button>
    </td>
    </tr>`;

        }
    }

}
function capNhat(i) {
    x = i;
    let sp = ListCategory[i];
    document.getElementById("ten").value = sp.name;

    console.log(ListCategory[i]);
}
function xoa(i) {
    ListCategory.splice(i, 1);
    loadTable();
}
function luu() {
    if (x == -1) {
        them();
    }
    else {
        capNhatArray();
    }
}
function capNhatArray() {
    let ten = document.getElementById("ten").value;
    ListCategory[x].name = ten;
    loadTable();
}