<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" 
integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="stayle2.css">
</head>

<body>
    <div class="container">
        <div class="wave">
            <img src="bg.png" alt="">
        </div>

        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Maintenance Service</a></li>
                <li><a href="#">Track Maintenance</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
            <img src="logoo.png" height="150" width="150" alt="">
        </nav>

        <div class="main-content">

            <div class="image-pista">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="img1.png" alt=""></div>
                        <div class="swiper-slide"><img src="img2.png" alt=""></div>
                        
                    </div> 
                </div>
            </div>
            <div class="main-text">
                <h1>Fix your device now!</h1>
               <form action="index.php">
                <button>Maintenance Service</button>
            </form>
            </div>
        </div>
             <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 1,
          spaceBetween: 30,
          loop: true,
        });
      </script>
</body>

</html>