<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {

  $adults = (int)$_POST["adults"];
  $children = (int)$_POST["children"];
  $cp = $adults + $children;

  header("Location: ./reservation/?cp=" . $cp);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Mường Thanh Hotel | Trang chủ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <link rel="shortcut icon" href="https://banner2.cleanpng.com/20190304/rqs/kisspng-logo-muong-thanh-hotel-portable-network-graphics-b-logo-muong-thanh-thit-k-thi-cng-xy-d-5c7d029070b4e0.9390674015516965284617.jpg">

</head>

<body>

  <!-- <div id="preloader">
    <img src="image/loader.gif" alt="">
  </div>  --> 
  <header class="header" id="navigation-menu">
    <div class="container">
      <nav>
        <a href="#" class="logo"> <img src="image/logo_hotel.png" alt=""> </a>

        <div>
          <ul class="nav-menu">
            <li> <a href="#home" class="nav-link" data-aos="fade-down" data-aos-delay="100">Trang chủ</a> </li>
            <li> <a href="#about" class="nav-link" data-aos="fade-down" data-aos-delay="150">Về chúng tôi</a> </li>
            <li> <a href="#rooms" class="nav-link" data-aos="fade-down" data-aos-delay="200">Phòng</a> </li>
            <li> <a href="#restaurant" class="nav-link" data-aos="fade-left" data-aos-delay="250">Nhà hàng</a> </li>
            <li> <a href="#gallery" class="nav-link" data-aos="fade-left" data-aos-delay="300">Trưng bày</a> </li>
            <li> <a href="#footer" class="nav-link" data-aos="fade-left" data-aos-delay="350">Liên hệ</a> </li>
            <li> <a href="./reservation/login.php" class="nav-link" data-aos="fade-left" data-aos-delay="350">Đăng nhập</a> </li>
            <a href="./reservation"> <button class="btn2">Đặt phòng</button></a>
          </ul>
          
        </div>

        <div class="hambuger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </nav>
    </div>
  </header>
  <script>
    const hambuger = document.querySelector('.hambuger');
    const navMenu = document.querySelector('.nav-menu');

    hambuger.addEventListener("click", mobileMenu);

    function mobileMenu() {
      hambuger.classList.toggle("active");
      navMenu.classList.toggle("active");
    }

    const navLink = document.querySelectorAll('.nav-link');
    navLink.forEach((n) => n.addEventListener("click", closeMenu));

    function closeMenu() {
      hambuger.classList.remove("active");
      navMenu.classList.remove("active");
    }
  </script>

  <section class="home" id="home">
    <div class="head_container">
      <div class="box">
        <div class="text">
          <h1 data-aos="fade-down">Chào mừng đến với Mường Thanh Hotel</h1>
          <p data-aos="fade-up">Là Hệ thống Khách sạn tư nhân lớn nhất tại Đông dương, Mường Thanh tự hào sở hữu gần 60 khách sạn với sức chứa hơn 12.000 phòng, tạo việc làm và môi trường phát triển cho hơn 10.000 lao động, đóng góp vào ngân sách quốc gia hàng ngàn tỷ đồng mỗi năm.</p>
        
        </div>
      </div>
      <div class="image">
        <img src="image/home1.jpg" class="slide">
      </div>
      <div class="image_item">
        <img src="image/home1.jpg" alt="" class="slide active" onclick="img('image/home1.jpg')">
        <img src="image/home2.jpg" alt="" class="slide" onclick="img('image/home2.jpg')">
        <img src="image/home3.jpg" alt="" class="slide" onclick="img('image/home3.jpg')">
        <img src="image/home4.jpg" alt="" class="slide" onclick="img('image/home4.jpg')">
      </div>
    </div>
  </section>
  <script>
    function img(anything) {
      document.querySelector('.slide').src = anything;
    }

    function change(change) {
      const line = document.querySelector('.image');
      line.style.background = change;
    }
  </script>
  <section class="book">
    <div class="container">
      <form method="post" class="flex">
        <div class="input grid">
          <div class="box">
            <label>Thời gian đến:</label>
            <input type="date" placeholder="Check-in-Date">
          </div>
          <div class="box">
            <label>Thời gian đi:</label>
            <input type="date" placeholder="Check-out-Date">
          </div>
          <div class="box">
            <label>Người lớn:</label> <br>
            <input type="number" placeholder="0" name="adults">
          </div>
          <div class="box">
            <label>Trẻ em:</label> <br>
            <input type="number" placeholder="0" name="children">
          </div>
        </div>
        <a class="search" style="text-decoration: none;">
          <input type="submit" value="Tìm kiếm">
        </a>
      </form>
    </div>
  </section>
  <section class="about top" id="about">
    <div class="container flex">
      <div class="left">
        <div class="img">
          <img src="image/a1.jpg" alt="" class="image1">
          <img src="image/a2.jpg" alt="" class="image2">
        </div>
      </div>
      <div class="right">
        <div class="heading" data-aos="fade-down" data-aos-delay="200" >
          <h5>NÂNG SỰ THOẢI MÁI LÊN MỨC CAO NHẤT</h5>
          <h2>Chào mừng đến với khách sạn Mường Thanh!</h2>
          <p>Thắp sáng bản đồ ngành lưu trú Việt Nam, khẳng định vị thế vững chắc cho riêng mình, Tập đoàn Khách sạn Mường Thanh đã tạo được chỗ đứng trong lòng khách hàng và du khách trong và ngoài nước.</p>
          <p>Là Hệ thống Khách sạn tư nhân lớn nhất tại Đông dương, Mường Thanh tự hào sở hữu gần 60 khách sạn với sức chứa hơn 12.000 phòng, tạo việc làm và môi trường phát triển cho hơn 10.000 lao động, đóng góp vào ngân sách quốc gia hàng ngàn tỷ đồng mỗi năm.</p>
          
        </div>
      </div>
    </div>
  </section>
  <section class="wrapper top">
    <div class="container" >
      <div class="text" data-aos="fade-left" data-aos-delay="250">
        <h2>Dịch vụ của chúng tôi</h2>
        <p>Phòng | Ăn uống | Hội nghị & Sự kiện | Thời gian nghỉ dưỡng</p>
       
        <hr>
        <br>
        <br>

        <div class="content">
          <div class="box flex">
            <i class="fas fa-swimming-pool"></i>
            <span>Bể bơi</span>
          </div>
          <div class="box flex">
            <i class="fas fa-dumbbell"></i>
            <span>Gym & Yoga</span>
          </div>
          <div class="box flex">
            <i class="fas fa-spa"></i>
            <span>Spa & Massage</span>
          </div>
          
          <div class="box flex">
            <i class="fas fa-swimmer"></i>
            <span>Lướt sóng</span>
          </div>
          <div class="box flex">
            <i class="fas fa-microphone"></i>
            <span>Phòng họp</span>
          </div>
          <div class="box flex">
            <i class="fas fa-water"></i>
            <span>Lặn biển</span>
          </div>
          
        </div>
      </div>
    </div>
  </section>
  <section class="room top" id="rooms">
    <div class="container">
      <div class="heading_top flex1">
        <div class="heading" data-aos="fade-right" data-aos-delay="100">
          <h5>NÂNG SỰ THOẢI MÁI LÊN MỨC CAO NHẤT</h5>
          <h2>Phòng và Căn hộ</h2>
        </div>
       <!--  <div class="button">
          <button class="btn1">VIEW ALL</button>
        </div> -->
      </div>

      <div class="content grid">
        <div class="box" data-aos="fade-left" data-aos-delay="150">
          <div class="img">
            <img src="image/r1.jpg" alt="">
          </div>
          <div class="text">
            <h3>Phòng sang trọng</h3>
          </div>
        </div>
        <div class="box" data-aos="fade-left" data-aos-delay="200">
          <div class="img">
            <img src="image/r2.jpg" alt="">
          </div>
          <div class="text">
            <h3>Phòng gia đình</h3>
          </div>
        </div>
        <div class="box" data-aos="fade-left" data-aos-delay="250">
          <div class="img">
            <img src="image/r3.jpg" alt="">
          </div>
          <div class="text">
            <h3>Phòng Vip</h3>
          </div>
        </div>
      </div>
       <div class="button" id="ct-buton">
          <a href="./reservation/">
            <button class="btn1" id="r-btn">ĐẶT NGAY</button>
          </a>
        </div>
    </div>
  </section>
  <section class="wrapper wrapper2 top">
    <div class="container">
      <div class="text" data-aos="fade-right" data-aos-delay="200">
        <div class="heading">
          <h5>ĐÁNH GIÁ CỦA KHÁCH HÀNG</h5>
          <h2>Khách hàng nói</h2>
        </div>

        <div class="para">
          <p>Tuyệt vời, 10/10!</p>

          <div class="box flex">
            <div class="img">
              <img src="image/c.jpg" alt="">
            </div>
            <div class="name">
              <h5>KATE PALMER</h5>
              <h5>IDAHO</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="restaurant top" id="restaurant">
    <div class="container flex">
      <div class="left">
        <img src="image/re.jpg" alt="">
      </div>
      <div class="right">
        <div class="text" data-aos="fade-left" data-aos-delay="250">
          <h2>Nhà hàng của chúng tôi</h2>
          <p> Trải nghiệm ẩm thực và đồ uống độc đáo của nó mang một trạng thái mang tính biểu tượng của riêng nó. Mở cửa cho khách của khách sạn cũng như du khách, nhà hàng mang đến nhiều điều hơn là một khung cảnh tuyệt đẹp.</p>
        </div>
        <div class="accordionWrapper" data-aos="fade-left" data-aos-delay="300">
          <div class="accordionItem open">
            <h2 class="accordionIHeading">Bếp địa phương</h2>
            <div class="accordionItemContent">
              <p>Chứa tất cả các loại món ăn địa phương. Điều này bao gồm githeri, <i>mukimu</i>, cơm và thịt bò hầm, ugali với thịt gà/cá và nhiều món khác.
              </p>
            </div>
          </div>
          <div class="accordionItem close">
            <h2 class="accordionIHeading">Italian Kitchen</h2>
            <div class="accordionItemContent">
              <p>This comprises of italian dishes such as lasagne, pasta, ravioli etc.
              </p>
            </div>
          </div>
          <div class="accordionItem close">
            <h2 class="accordionIHeading">Swahili Kitchen</h2>
            <div class="accordionItemContent">
              <p>Swahili cuisines at its finest. This includes pilau, beef/goat biryani, mishkaki, Mbaazi za Nazi and many more.
              </p>
            </div>
          </div>
          <div class="accordionItem close">
            <h2 class="accordionIHeading">International Kitchen</h2>
            <div class="accordionItemContent">
              <p>This comprises of cuisines from many parts of the world including Asian, Southern and West Africa.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    var accItem = document.getElementsByClassName('accordionItem');
    var accHD = document.getElementsByClassName('accordionIHeading');

    for (i = 0; i < accHD.length; i++) {
      accHD[i].addEventListener('click', toggleItem, false);
    }

    function toggleItem() {
      var itemClass = this.parentNode.className;
      for (var i = 0; i < accItem.length; i++) {
        accItem[i].className = 'accordionItem close';
      }
      if (itemClass == 'accordionItem close') {
        this.parentNode.className = 'accordionItem open';
      }
    }
  </script>



  <section class="gallery mtop " id="gallery">
    <div class="container">
      <div class="heading_top flex1">
        <div class="heading" data-aos="fade-right" data-aos-delay="200">
          <h5>CHÀO MỪNG BẠN ĐẾN THƯ VIỆN HÌNH ẢNH CỦA CHÚNG TÔI</h5>
          <h2>Ảnh về khách sạn</h2>
        </div>
        <!-- <div class="button">
          <button class="btn1">VIEW GALLERY</button>
        </div> -->
      </div>

      <div class="owl-carousel owl-theme" data-aos="fade-in" data-aos-delay="200">
        <div class="item">
          <img src="image/g1.jpg" alt="">
        </div>
        <div class="item">
          <img src="image/g2.jpg" alt="">
        </div>
        <div class="item">
          <img src="image/g3.jpg" alt="">
        </div>
        <div class="item">
          <img src="image/g4.jpg" alt="">
        </div>
        <div class="item">
          <img src="image/g5.jpg" alt="">
        </div>
        <div class="item">
          <img src="image/g6.jpg" alt="">
        </div>
        <div class="item">
          <img src="image/g7.jpg" alt="">
        </div>
        <div class="item">
          <img src="image/g8.jpg" alt="">
        </div>
      </div>

    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      dots: false,
      navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    })
  </script>




  <div id="footer">
    <div class="container grid top">
      <div class="box">
        <img src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/48/000000/external-hotel-hotel-services-and-city-elements-flatart-icons-flat-flatarticons-1.png" />
        <p> Chúng tôi rất hân hạnh được phục vụ bạn và cung cấp cho bạn nơi ở tốt nhất và sang trọng</p>
        <br>

        <p><em>Phương thức thanh toán được chấp nhận</em></p>
        <div class="payment grid">
          <img src="https://img.icons8.com/color/48/000000/visa.png" />
          <img src="https://img.icons8.com/color/48/000000/mastercard.png" />
          <img src="https://img.icons8.com/color-glass/48/000000/paypal.png" />
          <img src="image/mpesa-seeklogo.com.svg" width="70" height="50" />
        </div>
      </div>

     

      <div class="box">
        <h3>Tin tức gần đây</h3>

        <ul>
          <li>Đêm Rhumba vào mỗi Thứ Bảy đầu tiên của tháng</li>
          <li>Sinh hoạt gia đình vào Chủ nhật hàng tuần</li>
          <li>Tháng 12 ở khách sạn Cascade</li>
          <li>Hòa nhạc trực tiếp tại Cascade</li>
        </ul>
      </div>

      <div class="box">
        <h3>Cho khách hàng</h3>
        <ul>
          <li>Giới thiệu về Mường Thanh</li>
          <li>Chăm sóc/Trợ giúp khách hàng</li>
          <li>Tài khoản công ty</li>
          <li>Thông tin tài chính</li>
          <li>Điều khoản & Điều kiện</li>
        </ul>
      </div>

      <div class="box">
        <h3>Liên hệ với chúng tôi</h3>

        <ul>
          <li>(0123) 456 789</li>
          <li><i class="far fa-envelope"></i>muongthanh@gmail.com</li>
          <li><i class="far fa-phone-alt"></i>+254 725 118 000</li>
          <li><i class="far fa-phone-alt"></i>+254 758 856 963</li>
          <li><i class="far fa-comments"></i>Dịch vụ khách hàng 24/7</li>
        </ul>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- <script>

    var loader = document.getElementById("preloader");

    window.addEventListener("load", function(){
      loader.style.display = "none";
    })

  </script> -->
</body>

</html>