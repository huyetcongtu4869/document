<hr style="margin-top: 30px;">
<!-- footer -->
<footer>
    <div class="logo-footer"><a href=""><img src="public/img/client/Logo.png" alt=""></a></div>
    <div class="menu">
        <ul>
            <li><a href="?ctr=home">Home</a></li>
            <li><a href="?ctr=about">About Us</a></li>
            <li><a href="?ctr=contact">Contact Us</a></li>
            <li><a href="?ctr=hang-hoa">Category</a></li>
        </ul>
    </div>
</footer>
</div>
</body>
<script type="text/javascript" src="frontend/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('.slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        speed: 300
    });

    var filtered = false;

    $('.js-filter').on('click', function() {
        if (filtered === false) {
            $('.filtering').slick('slickFilter', ':even');
            $(this).text('Unfilter Slides');
            filtered = true;
        } else {
            $('.filtering').slick('slickUnfilter');
            $(this).text('Filter Slides');
            filtered = false;
        }
    });
</script>
<script>
    //slider banner
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }

    // show ảnh
    const ipnFileElement = document.querySelector('input')
    const resultElement = document.querySelector('.preview')
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png']

    ipnFileElement.addEventListener('change', function(e) {
        const files = e.target.files
        const file = files[0]
        const fileType = file['type']

        if (!validImageTypes.includes(fileType)) {
            resultElement.insertAdjacentHTML(
                'beforeend',
                '<span class="preview-img">Chọn ảnh đi :3</span>'
            )
            return
        }

        const fileReader = new FileReader()
        fileReader.readAsDataURL(file)

        fileReader.onload = function() {
            const url = fileReader.result
            resultElement.insertAdjacentHTML(
                'beforeend',
                `<img src="${url}" alt="${file.name}" class="preview-img" />`
            )
        }
    })
</script>

</html>