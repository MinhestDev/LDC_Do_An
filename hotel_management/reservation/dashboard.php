<?php 
   session_start();
   if(!isset($_SESSION['HM_uid'])) {
      header('Location: ./login.php');
   }
?>

<?php require_once('../db/db.php') ?>
<?php

function getRes($id){
    $pdo = establishCONN();
    $stmt = $pdo->prepare("SELECT applications.id, applications.created_by, applications.suite, applications.checkin, applications.checkout, applications.adults, applications.children, applications.roomSelected, applications.totalPrice, applications.isApproved, applications.paymentStatus, categories.description, categories.price, users.fname, users.lname, rooms.name AS rname FROM applications LEFT JOIN categories ON applications.suite = categories.id LEFT JOIN users ON applications.created_by = users.id LEFT JOIN rooms ON applications.roomSelected = roomid WHERE applications.created_by = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đặt phòng</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="style.css">

   <style>
      .section {
         display: none;
      }

      .section.active {
         display: block;
      }
   </style>
</head>
<body>
   <section id="dashboard">
      <aside class="aside">
         <nav class="side-nav">
            <h3>Dashboard</h3>
            <ul>
               <li class="side-nav-item"><a href="#" class="dash-side-link" onclick="showSection('jumbotron')"><span style="font-size: 2rem;">🏠</span>Home</a></li>
               <li class="side-nav-item"><a href="#" class="dash-side-link" onclick="showSection('bookings')"><span style="font-size: 2rem;">🛌</span>Bookings</a></li>
            </ul>
         </nav>
      </aside>
      <main>
         <div class="main-content">
            <nav class="dash-nav">
               <div class="dash-nav-right">
                  <p class="textt-lg"><b>Chào mừng <a href="./profile.php"><?php echo $_SESSION["HM_ufname"] ?></a></b></p>
                  <p><a href="./logout.php" class="btn btn-secondary">Đăng xuất</a></p>
               </div>
            </nav>
            <?php if($_SESSION["HM_ver_status"] == true) {?>
            <div class="jumbotron section" id="jumbotron">
               <h1>Xin chào, <?php echo $_SESSION["HM_ufname"] ?></h1>
               <p>Dưới đây là cách xử lý Thanh toán đặt phòng của bạn</p>
               <ol>
                  <li>Điều hướng đến Đặt chỗ</li>
                  <li>Nhấp vào thanh toán.</li>
                  <li>Nhập số điện thoại di động để nhận thanh toán.</li>
                  <li>Chờ Lời nhắc STK trên điện thoại của bạn.</li>
                  <li>Đợi tin nhắn MPESA</li>
                  <li>Đi tới Đặt chỗ và nhấp vào Xác nhận thanh toán.</li>
               </ol>
               <hr>
               <a href="./index.php" class="btn btn-primary">Tạo đặt chỗ</a>
            </div>
            <div class="section" id="bookings">
               <?php $res = getRes($_SESSION["HM_uid"]); ?>
               <h3 class="my-3">Đặt chỗ của bạn</h3>
               <table class="table custom-table">
                  <thead>
                     <tr>
                        <th scope="col">
                           <!-- <label class="control control--checkbox">
                           <input type="checkbox" class="js-check-all">
                           <div class="control__indicator"></div>
                           </label> -->
                        </th>
                        <th scope="col">Bộ</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Người cư trú</th>
                        <th scope="col">Thời gian lưu trú</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach($res as $r) {?>
                     <tr scope="row">
                        <th scope="row">
                           <label class="control control--checkbox">
                           <input type="checkbox">
                           <div class="control__indicator"></div>
                           </label>
                        </th>
                        <td><?php echo $r["rname"] ?></td>
                        <td><a href="#"><?php echo $r["description"]; ?></a></td>
                        <td>
                        <?php echo($r["adults"] + $r["children"]); ?> Người ở
                        <small class="d-block"><?php echo $r["adults"]?> Người lớn, <?php echo $r["children"] ?> Trẻ em</small>
                        </td>
                        <td>
                           <?php 
                              $date1 = new DateTime($r["checkin"]);
                              $date2 = new DateTime($r["checkout"]);

                              // this calculates the diff between two dates, which is the number of nights
                              $numberOfNights= $date2->diff($date1)->format("%a");
                              $total = $numberOfNights * $r["price"];
                           ?>
                           <?php echo $numberOfNights ?> Đêm
                        </td>
                        <td><?php echo $total ?> vnđ</td>
                        <td><?php if($r["isApproved"]) {echo "Approved";} else {echo "Pending";} ?></td>
                        <td>
                           <?php if($r["paymentStatus"]) { ?>
                              <button disabled class="btn btn-mute">Đã trả ✔</button>
                           <?php } else { ?>
                              <?php if($r["isApproved"]) { ?>                                 
                                 <?php if(isset($_SESSION['HM_MPESA_REQ_ID'])) {?>
                                    <a href="./checkout/confirm.php?apl_id=<?php echo $r["id"] ?>&roomno=<?php echo $r["roomSelected"] ?>&payable=<?php echo $r["totalPrice"] ?>" class="btn btn-outline-success">Xác nhận thanh toán</a>
                                 <?php } else { ?>
                                    <button type="button" class="btn btn-outline-primary btn-xs" data-toggle="modal" data-target="#myModal">Kiểm tra</button>
                                 <?php } ?>
                                 <!-- The paymrnt Modal -->
                                 <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                       <div class="modal-content">

                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                          <h4 class="modal-title">Trả tiền đặt phòng</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>

                                          <!-- Modal body -->
                                          <div class="modal-body">
                                             <form class="add-form" method="POST" action="./checkout/" style="max-width: 468px; margin: 0 auto;">
                                                <div class="form-group">
                                                   <label for="amount">Số tiền phải trả</label>
                                                   <input type="text" class="form-control" name="amount" value="Kshs <?php echo$r["price"] ?>" disabled>
                                                   <label for="exampleInputEmail1">Số điện thoại <small>(Số điện thoại nhận yêu cầu thanh toán)</small></label>
                                                   <input type="tel" class="form-control" name="phone" placeholder="254712345678" required>
                                                </div>                
                                                <button type="submit" class="btn btn-success btn-block" name="submit" >Thanh toán</button>
                                             </form>
                                          </div>

                                          <!-- Modal footer -->
                                          <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                          </div>

                                       </div>
                                    </div>
                                 </div>
                                 <button class="btn btn-outline-secondary btn-sm">Xóa</button>
                              <?php } else {?>
                                 <p inactive class="disabled">Chờ phê duyệt</p>
                              <?php } ?>
                           <?php } ?>
                        </td>
                     </tr>
                     <tr class="spacer"><td colspan="100"></td></tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
            <?php } else {?>
               <div class="jumbotron">
                  <h3>Xác minh địa chỉ email</h3>
                  <p>Kiểm tra địa chỉ email bạn đã cung cấp để xác minh địa chỉ.</p>
               </div>
            <?php } ?>
         </div>
      </main>
   </section>
   <script defer>
      /* JavaScript */
      function showSection(sectionId) {
      // Hide all content sections
      var sections = document.getElementsByClassName('section');
      for (var i = 0; i < sections.length; i++) {
         sections[i].classList.remove('active');
      }

      // Show the selected content section
      document.getElementById(sectionId).classList.add('active');
      }

      // Show Section 1 by default
      document.getElementById('jumbotron').classList.add('active');
   </script>
</body>
</html>