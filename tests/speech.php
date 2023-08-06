<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>speech</title>
	<style>
		#in1, #in2{
			padding: 7px;
			border-radius: 5px;
			border: 1px solid gray;
			width: 96%;
			margin: 1%;
		}
	</style>
</head>
<body>
	<input id="in1" type="text" name="text" onkeyup="check()"><br><br>
	<input id ="in2" type="text" name="text2"  onkeyup="tcheck()">
	<script type="text/javascript">
		function check(){
			var val = document.getElementById('in1').value;
			var lval = val.slice(val.length-6);
			console.log(lval);
			if(lval=="change" || lval=="Change"){
				document.getElementById('in1').style.backgroundColor="#ededed";
				document.getElementById('in1').value = val.slice(0,val.length-6);
				document.getElementById('in2').focus();
			}
		}
		function tcheck(){
			var tval = document.getElementById('in2').value;
			var tlval = tval.slice(tval.length-6);
			console.log(tlval);
			if(tlval=="change" || tlval=="Change"){
				document.getElementById('in2').style.backgroundColor="#ededed";
				document.getElementById('in2').value = tval.slice(0,tval.length-6);
				document.getElementById('in1').focus();
			}
		}
	</script>

</body>
</html>