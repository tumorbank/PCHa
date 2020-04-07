<?php

// call Url for get ETH to Baht
$html=file_get_contents("https://coinyep.com/th/ex/ETH-THB");

// compare
preg_match("/<small id='coinyep-reverse2'>(.*)<\/small>/", $html, $match);
$pagetitle = $match[1];
//print_r($match);

// convert value to float
$ETH = str_replace('ETH', "", substr($pagetitle, 8));
$ETHToBaht = (float) $ETH;

?>

<script>
// php to js
var ETHToBaht =  <?php echo $ETHToBaht; ?>;
var payETH = ETHToBaht * 4000;
console.log(payETH);
</script>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Personal Healthcare</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Bootstrap v4.3.1-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Maitree:500&display=swap" rel="stylesheet">
		    <!--Main  CSS-->
        <link rel="stylesheet" href="css/main.css">		
    </head>
    <body class="bg-light">
        <!-- Nav -->
        
		<nav class="navbar navbar-expand-md bg-white navbar-light border-bottom p-3 sticky-top">           
            <div class="container mg_nav">
                <!-- Brand -->
                <a class="navbar-brand" href="index.html"><b>Personal Healthcare</b> </a>
                
                 <!-- Toggler/collapsibe Button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			  		  
			    <!-- Navbar links -->
			    <div class="col-md-auto ml-3 navbar-collapse collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
					  	<a class="nav-link" href="index.html">หน้าแรก</a>
					</li>
					<li class="nav-item">
					  	<a class="nav-link" href="detailPersonal.html">ข้อมูลส่วนตัว</a>
					</li>
					<li class="nav-item">
					  	<a class="nav-link" href="resultUser.html">ผลการตวจ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addresult.html">เพิ่มผลการตรวจ</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="EXPcontract.php">อายุสัญญา</a>
                    </li>
                </ul>

                </div>
               
            
                <div  class="navbar-collapse collapse justify-content-end" id="collapsibleNavbar"> 
                    <ul class="nav">
                        <li class="nav-item" id="stillLogin">
                                
                        </li>
                    </ul>
                </div>                     
        </nav>
        

        <!--Body-->
        <div class="container bg-white border mg_login" style="margin-top:2%; padding: 2%;">
            <div id="msgRegister" class="d-flex justify-content-center text-warning"></div>
            <div class="d-flex justify-content-center">
                <h2>สมัครสมาชิก</h2>
            </div>
            <hr>
            
            <h5>Address : <span id="addressUser"></span></h5>
                <div class="form-group">
                  <label for="register">รหัสผ่าน:</label>
                  <input type="password" class="form-control" id="password" placeholder="password">
                </div>
                  <label for="register">ยืนยันรหัสผ่าน:</label>
                  <input type="password" class="form-control" id="cpassword" placeholder="Confirm password">
                <div class="form-group">
                    <label for="register">เพศ</label>
                    <select class="form-control" id="gender">
                      <option value="ชาย">ชาย</option>
                      <option value="หญิง">หญิง</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="register">ชื่อ:</label>
                  <input type="text" class="form-control" id="fname" placeholder="ชือ">
                </div>
                <div class="form-group">
                  <label for="register">นามสกุล:</label>
                  <input type="text" class="form-control" id="lname" placeholder="นามสกุล">
                </div>
                <div class="form-group"> 
                  <label for="register">ที่อยู่:</label>
                  <input type="text" class="form-control" id="address" placeholder="บ้านเลขที่/ถนน/ตำบล/อำเภอ/จังหวัด">
                </div>
                <div class="form-group">
                  <label for="register">เบอร์โทรศัพท์:</label>
                  <input type="text" class="form-control" id="phoneNumber" placeholder="เบอร์โทรศัพท์">
                </div>
                <div class="form-group">
                  <label for="register">โรคประจำตัว:</label>
                  <input type="text" class="form-control" id="disease" placeholder="โรคประจำตัว">
                </div>
                <div class="form-group">  
                  <label for="register">ยาที่แพ้:</label>
                  <input type="text" class="form-control" id="medicine" placeholder="ยาที่แพ้">
                </div>
                <div class="form-group">
                  <label for="register">วันเกิด:</label>
                  <input type="date" class="form-control" id="birthDate">
                </div>

                <!--
                <div class="d-flex justify-content-center ">
                    จำนวน Ether ที่ต้องจ่าย = <span id="ETHpay"></span>
                </div>
                <div class="d-flex justify-content-center pb-2">
                   <small style="color:red;">* ไม่รวมค่า gas</small>
                </div>
-->

                <table class="table table-bordered text-center">
                <tbody>
                  <tr class="table-warning">
                    <th scope="row">จำนวน Ether ที่ต้องจ่าย</th>
                    <td id="ETHpay"></td>
                  </tr>
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                   <small style="color:red;">* 1 บาท = <span id="ETHbaht"></span></small>
                </div>
              <div class="d-flex justify-content-center pb-2">
                   <small style="color:red;">** ไม่รวมค่า gas</small>
                </div>

                <div id="errmsgRegister"></div>

                     
                
                

                <div class="d-flex justify-content-center">
                    <button type="button" id="buttonRegister" class="btn btn-primary">จ่ายเงินและสมัครสมาชิก </button>
                </div>           
            
        </div>

        


        <!--jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Web3-->
        <script src="js/web3.min.js"></script>
        <!--Boostrap js-->
        <script src="js/bootstrap.min.js"></script>
        <!--PersonalHC js-->
        <script src="js/main.js"></script>
        <!--register js-->
        <script src="js/register.js"></script>
        <!--ETH js-->
        <script src="js/ETHshow.js"></script>
    </body>
</html>