
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up on loosers</title>
    <link rel="stylesheet" type="text/css" href="../style/signUp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../../others/files/jquery-3.6.0.js"></script>
</head>
<body>
	<div id="head">
		Loosers
	</div>
	<div id="main">
		<div id="left">
			<h1>Why us</h1>
		</div>
		<div id="right">
			<div id ="form-box">
	<div id="header">
		Create new account
	</div>
	<div id="box">
		<form>
			<span>Phone :</span><br>
			<span id="phoneErr" class="err" style="color: red;font-size: 12px;">Please enter valid phone number<br></span>
			<input id ="phone" type="tel" name="phone" autocomplete="off" minlength="10" maxlength="10"><br><br>


			<span>Preparing for :</span><br>
			<span id="courseErr" class="err" style="color: red;font-size: 12px;">Please select atleast one course <br></span>
			<div id="target-box">
				<div id="jeeMains" onclick="check(this)">
					<span id="js">
						<i class="fa fa-check"></i>
					</span>JEE Mains
				</div>
				<div id="jeeAdvance" onclick="check(this)">
					<span id="jas">
						<i class="fa fa-check"></i>
					</span>JEE Advanced
				</div>
				<div id="neet" onclick="check(this)">
					<span id="ns">
						<i class="fa fa-check"></i>
					</span>NEET
				</div><br>
			</div>


			<span>Password :</span><br>
			<span id="passErr" class="err" style="color: red;font-size: 12px;">Password must contain alphabets and integers<br></span>
			<input id = "password" type="password" name="password" autocomplete="off"><br><br>


			<div id="otp-box">
				<span>Enter otp sent at your mobile number :</span><br>
				<input id = "otp" type="text" name="otp" autocomplete="off" style="width: 30%;">
				<span id="resend">resend otp</span><br><br>
				<button id="submitBtn" onclick="createAccount()">Create account</button>
			</div>
			<span id="otpErr" class="err" style="color: red;font-size: 12px;">There is some problem in sending otp<br></span>
			<button  id="getOtp" onclick="sendOtp()">Send otp</button>

			
		</form>
	</div>
</div>
</div>
</div>
	<script type="text/javascript">

		//script for selecting target
		var target = "*";
		var t1= 0;
		var t2= 0;
		var t3= 0;


		function check(qid){
			var id =qid.id;
			if(id=="jeeMains"){
				if(t1==0){
					t1=1;
					document.getElementById('js').style.backgroundColor="blue";
				}else{
					t1=0;
					document.getElementById('js').style.backgroundColor="white";
					deselected(id);
				}
			}
			if(id=="jeeAdvance"){
				if(t2==0){
					t2=1;
					document.getElementById('jas').style.backgroundColor="blue";
				}else{
					t2=0;
					document.getElementById('jas').style.backgroundColor="white";
					deselected(id);
				}
			}
			if(id=="neet"){
				if(t3==0){
					t3=1;
					document.getElementById('ns').style.backgroundColor="blue";
				}else{
					t3=0;
					document.getElementById('ns').style.backgroundColor="white";
					deselected(id);
				}
			}
		}

		//target selecting script ends here

		function sendOtp(){
			var mob = document.getElementById('phone').value;
			 if(isNaN(mob)){
				document.getElementById('phoneErr').style.display="block";
 			}else{
				$.ajax({
                    url:"../processes/sendSignUpOtp.php",
                    method:"post",
                    data:{phone:mob},
                    success: function getdata(result){
                        if(result=="success"){
                        	document.getElementById('getOtp').style.display="none";
							document.getElementById('otp-box').style.display="block";
                        }else{
                        	document.getElementById('otpErr').style.display="block";
                        }
                    } 
                })
		}
	}
	//function to verify details

	function correct(){
		var verif = 1;
		var mob = document.getElementById('phone').value;
			 if(isNaN(mob)){
				document.getElementById('phoneErr').style.display="block";
				verif=0;
 			}else{
 				document.getElementById('phoneErr').style.display="none";
 			}
 			if(t1==0 && t2==0 && t3==0){
 				$('#courseErr').style.display="block";
 				verif=0;
 			}else{
 				$('#courseErr').style.display="none";
 			}
 			if($('#password').value.length <8){
 				$('#passErr').style.display="block";
 				verif = 0;
 			}else{
 				$('#passErr').style.display="none";
 			}
 			if($('#otp').value.length <2){
 				$('#otpErr').style.display="block";
 				verif = 0;
 			}else{
 				$('#otpErr').style.display="none";
 			}
 			if(verif==1){
 				return true;
 			}else{
 				return false;
 			}
	}
	//function to verify details end here
	function createAccount(){
	}
	</script>
</body>
</html>