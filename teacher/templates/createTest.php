<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style/createTest.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../../others/files/jquery-3.6.0.js"></script>
	<title>Create a test</title>
</head>
<body>
	<div id ="create">
		<div id="create-head">
			<h3>Create your desired test</h3>
		</div>
		<div id="create-inner">
			<span class = "create-inner-labels" >Test name</span><br>
			<span id="error" class = "err"></span>
			<input id ="name" type="text" name="name"> <br> <br>
			<span class = "create-inner-labels" >Target students</span><br>
			<span id="errorTarget" class = "err"></span>
			<input type="radio" name="jee" id="jee">JEE Main<br>
			<input type="radio" name="neet" id="neet">NEET<br>
			<input type="radio" name="adv" id="adv">JEE Advance<br>	<br>
			<span class = "create-inner-labels" >Select the subject included:</span><br>
			<span id="errorSubject" class = "err"></span>
			<input type="radio" name="math" id="math">Mathematics<br>
			<input type="radio" name="physics" id="physics">Physics<br>
			<input type="radio" name="chem" id="chem">Chemistry<br>
			<input type="radio" name="bio" id="bio">Biology<br><br>





			<span class = "create-inner-labels" >Select the type of test:</span><br>
			<span id="errorType" class = "err"></span>
			<input type="radio" name="type" id = "t1">limited time duration MCQ<br>
			<input type="radio" name="type" id="t2">Limited time per question<br><br>
			<span class = "create-inner-labels" >Test duration</span><br>
			<span id="errorDurex" class = "err"></span>
			<input type="number" name="duration" id="duration" placeholder="in seconds"><br><br>


			<span class = "create-inner-labels" >Test Price</span><br>
			<span id="errorPrice" class = "err"></span>
			<input type="number" name="price" id="price" min="0" placeholder="in rupees ( now set to zero )"><br><br>



			<span class = "create-inner-labels" >Write some topics included in this test :</span><br>
			<span id="errorTopic" class = "err"></span>
			<textarea name="topic" id = "topic" rows="3" placeholder="Write topics here ( minimum 10 letters )"></textarea><br><br>

			<span class = "create-inner-labels" >Give a brief description of test :</span><br>
			<span id="errorDescription" class = "err"></span>
			<textarea name="description" id = "description" rows="3" placeholder="start writing here (minimum 25 letters )"></textarea><br><br>







		</div>
		<div id="s-btn">
		<button id="btn" onclick="allGood()">Create test</button>
		</div>
	</div>
			<form id = "screen" method="post" action="./setPaper.php">
				<input id="passedName" type="text" name="name">
			</form>
	<script type="text/javascript">
		const good = [];
		var allSet = 1;
		var name;
		var target;
		var subject;
		var type;
		var duration;
		var price;
		var topic;
		var description;
		var nsub =0;
		function allGood(){
			nsub=0;
			name = document.getElementById('name').value;
			if((name.trim()).length <=5){
				good[0] = 0;
				document.getElementById("error").innerHTML = "The length of name should be greater than 5*<br>";
			}
			if((name.trim()).length >5){
				good[0] = 1;
				document.getElementById("error").innerHTML = "";
			}



			topic = document.getElementById('topic').value;
			if((topic.trim()).length <=10){
				good[6] = 0;
				document.getElementById("errorTopic").innerHTML = "The length of topic should be greater than 10*<br>";
			}
			if((topic.trim()).length >10){
				good[6] = 1;
				document.getElementById("errorTopic").innerHTML = "";
			}
			description = document.getElementById('description').value;
			if((description.trim()).length <=25){
				good[7] = 0;
				document.getElementById("errorDescription").innerHTML = "The length of description should be greater than 25*<br>";
			}
			if((description.trim()).length >25){
				good[7] = 1;
				document.getElementById("errorDescription").innerHTML = "";
			}




			target = "*";
			if(document.getElementById('jee').checked){
				target =target + "JEE Mains*";				
			}
			if(document.getElementById('neet').checked){
				target = target + "NEET*";				
			}
			if(document.getElementById('adv').checked){
				target = target + "JEE Advanced*";				
			}
			if(target != "*"){
				good[1] = 1;
				document.getElementById("errorTarget").innerHTML = "";
			}
			if(target == "*"){
				good[1] = 0;
				document.getElementById("errorTarget").innerHTML = "select atleast one value from the target*<br>";
			}
			console.log(target);
			subject = "*";
			if(document.getElementById('math').checked){
				subject = subject + "Mathematics*";
				nsub++;				
			}
			if(document.getElementById('physics').checked){
				subject = subject + "physics*";	
				nsub++;			
			}
			if(document.getElementById('chem').checked){
				subject = subject + "Chemistry*";	
				nsub++;			
			}
			if(document.getElementById('bio').checked){
				subject = subject + "Biology*";	
				nsub++;			
			}
			if(subject == "*"){
				good[2] = 0;
				document.getElementById("errorSubject").innerHTML = "select atleast one value from the subject*<br>";
			}
			if(subject != "*"){
				good[2] = 1;
				document.getElementById("errorSubject").innerHTML = "";
			}
			console.log(subject);
			type = "*";
			if(document.getElementById('t1').checked){
				type = type + "1";				
			}
			if(document.getElementById('t2').checked){
				type = type + "2";				
			}
			if(type == "*"){
				good[3] = 0;
				document.getElementById("errorType").innerHTML = "select atleast one value from below*<br>";
			}
			if(type != "*"){
				good[3] = 1;
				document.getElementById("errorType").innerHTML = "";
			}
			duration = document.getElementById('duration').value;
			if(duration <=0){
				good[4] = 0;
				document.getElementById("errorDurex").innerHTML = "Fill appropriate duration for test*<br>";
			}
			if(duration >0){
				good[4] = 1;
				document.getElementById("errorDurex").innerHTML = "";
			}
			price = document.getElementById('price').value;
			if(price <0){
				good[5] = 0;
				document.getElementById("errorPrice").innerHTML = "Fill appropriate price for test*<br>";
			}
			if(price >=0){
				good[5] = 1;
				document.getElementById("errorPrice").innerHTML = "";
			}
			for(var i=0; i<8; i++){
				if(good[i]==0){
					allSet =0;
					break;
				}
			}
			if(allSet==1){
				insertIntoDatabase();
			}

		}
		function insertIntoDatabase() {
			$.ajax({
                    url:"../processes/inserting_test_data.php",
                    method:"post",
                    data:{tname:name,ttarget:target,tsubject:subject,ttype:type,tduration:duration,tnsub:nsub,ttopic:topic,tdescription:description,tprice:price},
                    success: function getdata(result){
                    	console.log(result);
                        if(result[0]=="1"){
                        	console.log(result);
                        	document.getElementById("passedName").value = result.substring(1).trim();
                        	var form = document.getElementById("screen");
                        	form.submit();
                        }
                    } 
                })
		}
	</script>
</body>
</html>