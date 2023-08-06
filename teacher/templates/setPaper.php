<?php
session_start();
include "../../others/include/conn.php";
if($con){
	//echo "success";
}
//$test_id=$_POST['name'];
$test_id=7;

//$_SESSION["id"] = $test_id;
//echo $test_id;
$name;
$number_of_subjects;
$name_of_subjects;
$per_subject_question;
$question;
$options;
$duration;
$subjects = array();
$sql = "select * from paper where test_id='$test_id'";
$result = mysqli_query($con, $sql);
if($result){
	//echo mysqli_num_rows($result);
}

while ($pass = mysqli_fetch_assoc($result)) {
  $name=$pass['name_of_test'];
  $number_of_subjects = $pass['number_of_subjects'];
  $name_of_subjects = $pass['name_of_subjects'];
  $per_subject_question = $pass['per_subject_question'];
  $question = $pass['question'];
  $options = $pass['options'];
  $duration = $pass['duration'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Make your paper</title>
<link rel="stylesheet" type="text/css" href="../style/setPaper.css">
  <script src="../../others/files/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- math jax -->
  <script>
        MathJax = {
          tex: {
            inlineMath: [['$', '$'], ['\\(', '\\)']]
          }
        };
        </script>
        <script id="MathJax-script" async
          src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js">
        </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>





</head>
<body>
<div id="testName"><?php echo $name; ?></div>





	<script type="text/javascript">
		var test_id = "<?php echo $test_id; ?>";
		const subjects =[];
		const num_ques_subject = [];
		var selected_subject = 0;

	</script>
		<?php

    $string = " ";
    for ($i = 1; $i < strlen($name_of_subjects); $i++) {
        if ($name_of_subjects[$i] != "*") {
            $string = $string . $name_of_subjects[$i];
        } else {
        	array_push($subjects, $string);
    ?>
            <script type="text/javascript">
                subjects.push("<?php echo $string; ?>");
            </script>
    <?php
            $string = " ";
        }
    }

    ?>
    <?php 
$string = " ";
for ($i = 1; $i < strlen($per_subject_question); $i++) {
    if ($per_subject_question[$i] != "*") {
        $string = $string . $per_subject_question[$i];
    } else {
        ?>
        	<script type="text/javascript">
                num_ques_subject.push("<?php echo $string; ?>");
            </script>
        <?php
        $string = " ";
    }
}

    ?>

    <?php 
$string = " ";
for ($i = 1; $i < strlen($per_subject_question); $i++) {
    if ($per_subject_question[$i] != "*") {
        $string = $string . $per_subject_question[$i];
    } else {
        ?>
        	<script type="text/javascript">
                num_ques_subject.push("<?php echo $string; ?>");
            </script>
        <?php
        $string = " ";
    }
}

    ?>
	<div id="subjectBox">
		<?php
		for($i=0; $i<$number_of_subjects; $i++){
			?>
			<button class="subjectBtn" id="<?php echo $subjects[$i]; ?>" onclick="changeSubject(this)" ><?php echo $subjects[$i]; ?></button>
			<?php
		}
		?>
	</div>
	<div id="m-textBtn">
		<button class="m-textBtn-btn" id="m-btn-para" onclick="showPara()">Paragraph</button>
		<button class="m-textBtn-btn" id="m-btn-fraction" onclick="openMathsEditor()">Maths equation</button>
		<button class="m-textBtn-btn" id="m-btn-image" onclick="changeTextBtn(this)">Image</button>
	</div>
	<script type="text/javascript">
		var questionCode = " ";
		var option1Code = " ";
		var option2Code = " ";
		var option3Code = " ";
		var option4Code = " ";
		var showQuestionCode = " ";
		var showOption1Code = " ";
		var showOption2Code = " ";
		var showOption3Code = " ";
		var showOption4Code = " ";
		var canAdd = 0;
		var selectedOption =0;

	</script>
	<div id="box">
		<div id="left">
		<div id = "numberBox">Question no.<span id ="nqs"></span></div>
		<div id="questionBox" onclick="selectOption(this)">Start writing question from here.You can add paragraph and fraction from above</div>
		<div id="optionBox">
			<div class="op" type="textarea" name="o1" id="o1"    onclick="selectOption(this)">option 1</div>
			<div class="op" type="textarea" name="o2" id="o2"    onclick="selectOption(this)">option 2</div>
			<div class="op" type="textarea" name="o3" id="o3"    onclick="selectOption(this)">option 3</div>
			<div class="op" type="textarea" name="o4" id="o4"    onclick="selectOption(this)">option 4</div>
		</div>
	</div>
		<div id = entry-box>
			<div id="tools">
				<div>
					<span> Most used</span><br>
					<button onclick="showPara()">Paragraph</button><br>
					<span>Maths equation</span><br>
					<button onclick="openMathsEditor()">Using Math jax</button><br>
					<span>Others</span><br>
					<button onclick="openImage()">image</button>
					<button>Most asked questions</button><br>
				</div>
			</div>
			<div id="math-editor">
				<div id="math-editor-head" class="mbox">
					Math jax editor Calculate what you want :)<span onclick="closeMathsEditor()"><i class="fa fa-close"></i></span>
				</div>
				<div id="math-editor-result" class="mbox">
					result
				</div>
				<div id="math-editor-code" class="mbox">
					codes
					<textarea id="math-code" rows="3"></textarea>
				</div>
				<div id="m-mbtn">
					<button onclick="mathShow()">Show result</button>
					<button onclick="addMath()">add equation</button>
				</div>
				<div id="math-editor-btns" class="mbox">
					<button class="opener" name="mostUsed"><!-- most used -->basic</button>
					<button class="opener" name="symbols">symbols</button>
					<button class="opener" name="alphabets">alphabets</button>
					<button class="opener"  name="operators">operators</button>
					<button class="opener" name="functions">functions</button>
					<button class="opener" name="sizeStyle">styling</button>
				</div>
				<div id="math-editor-items" class="mbox">
					<div id="mostUsed">
						<div id="d0001">${x^{y}}$</div>
						<div id="d0002">${x_{y}}$</div>
						<div id="d0003">${\frac{x}{y}}$</div>
						<div id="d0004">${\sqrt{ab}}$</div>
						<div id="d0005">${\int_{a}^{b}}$</div>
						<div id="d0006">${\sum_a^b}$</div>
						<div id="d0007">${\left({a^{b}}\right)}$</div>
						<div id="d0008">${\left({a^{b}}\right)^{x}}$</div>
						<div id="d0009">${\left({\frac{a^{2}}{b^{3}}}\right)}$</div>
						<div id="d0010">${\lbrace{ab}\rbrace}$</div>
						<div id="d0011">${|{{x}+{y}}|}$</div>
						<div id="d0012">${[{ab}]}$</div>
						<div id="d0013">${+}$</div>
						<div id="d0014">${-}$</div>
						<div id="d0015">${\div}$</div>
						<div id="d0016">${\times}$</div>
						<div id="d0017">${=}$</div>
						<div id="d0018">${\neq}$</div>
						<div id="d0019">${!}$</div>
						<div id="d0020">${\bar{x}}$</div>
						<div id="d0021">${\vec{x}}$</div>
						<div id="d0022">${\hat{x}}$</div>
						<div id="d0023">${\frac{\partial {a}}{\partial {b}}}$</div>
						<div id="d0024">${\lim_{{a} \rightarrow {b}}}$</div>
						<div id="d0025" style="display:none;">none</div>
						<div id="d0026">${\log_{a}{b}}$</div>
						<div id="d0027">${ln~{ab}}$</div>
						<div id="d0028">${\sqrt[n]{ab}}$</div>
						<div id="d0029">${\oint_{a}^{b}}$</div>
						<div id="d0030">${\begin{bmatrix}a & b \\c & d \end{bmatrix}}$</div>
						<div id="d0031">${\left.\frac{a^{3}}{3}\right|_{0}^{1}}$</div>
						<div id="d0032">${\begin{cases}a & x = 0\\b & x > 0\end{cases}}$</div>
					</div>
					<div id="symbols">
						
						<div id="d0033">${\dotsm}$</div>
						<div id="d0034">${\dotso}$</div>
						<div id="d0035" style="display: none;">none</div>
						<div id="d0036">${\vdots}$</div>
						<div id="d0037">${`}$</div>
						<div id="d0038">${;}$</div>
						<div id="d0039">${\colon}$</div>
						<div id="d0040">${.}$</div>
						<div id="d0041">${\cdot}$</div>
						<div id="d0042">${\backslash}$</div>
						<div id="d0043">${\#}$</div>
						<div id="d0044">${\measuredangle}$</div>
						<div id="d0045">${\angle}$</div>
						<div id="d0046">${\nabla}$</div>
						<div id="d0047">${\triangle}$</div>
						<div id="d0048">${\triangledown}$</div>
						<div id="d0049">${\exists}$</div>
						<div id="d0050">${\nexists}$</div>
						<div id="d0051">${\varnothing}$</div>
						<div id="d0052">${\forall}$</div>
						<div id="d0053">${\bot}$</div>
						<div id="d0054">${\infty}$</div>
						<div id="d0055">${\sphericalangle}$</div>
						<div id="d0056">${\uparrow}$</div>
						<div id="d0057">${\downarrow}$</div>
						<div id="d0058">${\updownarrow}$</div>
						<div id="d0059">${\Uparrow}$</div>
						<div id="d0060">${\Downarrow}$</div>
						<div id="d0061">${\Leftarrow}$</div>
						<div id="d0062">${\Rightarrow}$</div>
						<div id="d0063">${\Leftrightarrow}$</div>
						<div id="d0064">${\nLeftrightarrow}$</div>
						<div id="d0065">${\nRightarrow}$</div>
						<div id="d0066">${\nLeftarrow}$</div>
						<div id="d0067">${\rightarrow}$</div>
						<div id="d0068">${\leftarrow}$</div>
						<div id="d0069">${\leftrightharpoons}$</div>
						<div id="d0070">${\rightleftharpoons}$</div>
						<div id="d0071">${\leftharpoonup}$</div>
						<div id="d0072">${\leftharpoondown}$</div>
						<div id="d0073">${\upharpoonright}$</div>
						<div id="d0074">${\upharpoonleft}$</div>
						<div id="d0075" style="display: none;">none</div>
						<div id="d0076">${\downharpoonright}$</div>
						<div id="d0077">${\rightharpoonup}$</div>
						<div id="d0078">${\downharpoonleft}$</div>
						<div id="d0079">${\rightharpoondown}$</div>
						<div id="d0080">${\curvearrowright}$</div>
						<div id="d0081">${\curvearrowleft}$</div>
						<div id="d0082">${\leftrightarrows}$</div>
						<div id="d0083">${\rightleftarrows}$</div>
					</div>
						<div id="alphabets">
						<div id="d0084">${\Gamma}$</div>
						<div id="d0085">${\alpha}$</div>
						<div id="d0086">${\xi}$</div>
						<div id="d0087">${\Delta}$</div>
						<div id="d0088">${\beta}$</div>
						<div id="d0089">${\pi}$</div>
						<div id="d0090">${\varepsilon}$</div>
						<div id="d0091">${\Lambda}$</div>
						<div id="d0092">${\gamma}$</div>	
						<div id="d0093">${\rho}$</div>
						<div id="d0094">${\varkappa}$</div>
						<div id="d0095">${\Phi}$</div>
						<div id="d0096">${\delta}$</div>
						<div id="d0097">${\sigma}$</div>
						<div id="d0098">${\Pi}$</div>
						<div id="d0099">${\epsilon}$</div>
						<div id="d0100">${\tau}$</div>
						<div id="d0101">${\Psi}$</div>
						<div id="d0102">${\upsilon}$</div>
						<div id="d0103">${\Sigma}$</div>
						<div id="d0104">${\eta}$</div>
						<div id="d0105">${\phi}$</div>
						<div id="d0106">${\theta}$</div>
						<div id="d0107">${\chi}$</div>
						<div id="d0108">${\vartheta}$</div>
						<div id="d0109">${\Upsilon}$</div>
						<div id="d0110">${\psi}$</div>
						<div id="d0111">${\kappa}$</div>
						<div id="d0112">${\omega}$</div>
						<div id="d0113">${\Omega}$</div>
						<div id="d0114">${\lambda}$</div>
						<div id="d0115">${\mu}$</div>
						<div id="d0116">${\nu}$</div>
						<div id="d0117">${\hslash}$</div>
						<div id="d0118">${\ell}$</div>
						<div id="d0119">${\mho}$</div>
						<div id="d0120">${\partial}$</div>
						<div id="d0121">${\hbar}$</div>
					</div>
					<div id="operators">
						<div id="d0122">${\mp}$</div>
						<div id="d0123">${\eqsim}$</div>
						<div id="d0124">${\ngtr}$</div>
						<div id="d0125">${\sim}$</div>
						<div id="d0126">${\circ}$</div>
						<div id="d0127">${\amalg}$</div>
						<div id="d0128">${\simeq}$</div>
						<div id="d0129">${\nleq}$</div>
						<div id="d0130">${\leqslant}$</div>
						<div id="d0131">${\eqslantless}$</div>
						<div id="d0132">${\pm}$</div>
						<div id="d0133">${\approx}$</div>
						<div id="d0134">${\geq}$</div>
						<div id="d0135">${\gg}$</div>
						<div id="d0136">${\ggg}$</div>
						<div id="d0137">${\ll}$</div>
						<div id="d0138">${\cong}$</div>
						<div id="d0139">${\lll}$</div>
						<div id="d0140">${\leq}$</div>
						<div id="d0141">${\therefore}$</div>
						<div id="d0142">${\because}$</div>
						<div id="d0143">${\backepsilon}$</div>
						<div id="d0144">${\varpropto}$</div>
						<div id="d0145">${\in}$</div>
						<div id="d0146">${\triangleright}$</div>
						<div id="d0147">${\triangleleft}$</div>
						<div id="d0148">${\notin}$</div>
						<div id="d0149">${\shortparallel}$</div>
						<div id="d0150">${\varsubsetneqq}$</div>
						<div id="d0151">${\subsetneqq}$</div>
						<div id="d0152">${\subseteqq}$</div>
						<div id="d0153">${\subseteq}$</div>
						<div id="d0154">${\supset}$</div>
						<div id="d0155">${\subset}$</div>
						<div id="d0156">${\cap}$</div>
						<div id="d0157">${\cup}$</div>
						<div id="d0158">${\triangleq}$</div>
						<div id="d0159">${\supseteq}$</div>
						<div id="d0160">${\supseteqq}$</div>
						<div id="d0161">${\supsetneq}$</div>
						<div id="d0162">${\varsupsetneqq}$</div>
					</div>
					<div id="functions">
						<div id="d0163">${\sin}$</div>
						<div id="d0164">${\cos}$</div>
						<div id="d0165">${\tan}$</div>
						<div id="d0166">${\sec}$</div>
						<div id="d0167">${\cot}$</div>
						<div id="d0168">${\det}$</div>
						<div id="d0169">${\sin^{-1}}$</div>
						<div id="d0170">${\cos^{-1}}$</div>
						<div id="d0171">${\tan^{-1}}$</div>
						<div id="d0172">${\exp}$</div>
						<div id="d0173">${\ln}$</div>
						<div id="d0174">${\log_{e}}$</div>
						<div id="d0175">${\lim}$</div>
						<div id="d0176">${\max}$</div>
						<div id="d0177">${\min}$</div>
						<div id="d0178">${\arg}$</div>
						<div id="d0179">${\deg}$</div>
						<div id="d0180">${\varprojlim}$</div>
						<div id="d0181">${\varinjlim}$</div>
					</div>
					<div id="sizeStyle">
						<div id="d0182">${\tiny {Tiny}}$</div>
						<div id="d0183">${\small {Small}}$</div>
						<div id="d0184">${\normalsize {Normal}}$</div>
						<div id="d0185">${\large {large}}$</div>
						<div id="d0186">${\mathbf{Bold}}$</div>
						<div id="d0187">${\mathit{Italic}}$</div>
						<div id="d0188">${\mathcal{Mathcal}}$</div>
						<div id="d0189">${\mathrm{Roman}}$</div>
						<div id="d0190">${\mathsf{Sans Serif}}$</div>
						<div id="d0191">${\mathtt{Typewriter}}$</div>
						<div id="d0192">${{\color{Black} {Black}}}$</div>
						<div id="d0193">${{\color{Blue} {Blue}}}$</div>
						<div id="d0194">${{\color{Green} {Green}}}$</div>
						<div id="d0195">${{\color{Indigo} {Indigo}}}$</div>
						<div id="d0196">${{\color{Crimson} {Crimson}}}$</div>
						<div id="d0197">${{\color{RoyalBlue} {RoyalBlue}}}$</div>
						<div id="d0198">${{\color{Yellow} {Yellow}}}$</div>
					</div>
					</div>
			</div>
			<div id="pattern">
				<div id="search-pattern">
					
				</div>
				<div class="pattern-box">
					<div class="pattern-head">
						
					</div>
					<div class="pattern-body">
						
					</div>
				</div>
			</div>
		<div id="entry">
			<div id="paragraph" class="c-entry">
		<b>Paragraph: <span onclick="closePara()"><i class="fa fa-close"></i></span></b><br><br>
		<textarea rows ="5" cols ="15" name="para" id ="para" placeholder="Insert a Paragraph" class="entry-input-para"></textarea><br><br>
		<button id="a" onclick="addPara()">add Paragraph</button><br><br></div>

		<div id="image" class="c-entry">
		<form id = "target" method="post" enctype="multipart/form-data" action = "../processes/insertImg.php">
			<input type="number" id="num" name = "num" value="0">
			<input type="text" name="name" id="name" value = "@">
			<button type="submit">Submit</button>
		</form>
		<button id="ifile" onclick="inputBtn();">create</button>
		<button onclick="save()">save</button>
	</div>
</div>
	</div>
		</div>
	</div>
	<div id ="sabtns">
			<button class="editbtn" id = "savebtn" onclick="saveQuestion()">Save Question</button>
			<button class="editbtn" id = "addbtn" onclick="addQuestion()">Add New Question</button>
		</div>
		<div><a href = "../../student/templates/testPage.php"> see your page</a></div>

	<script type="text/javascript">
		document.getElementById(subjects[selected_subject]).style.backgroundColor="#aaffff";
		document.getElementById('nqs').innerHTML=parseInt(num_ques_subject[selected_subject]) +1;
		function changeSubject(subject){
			document.getElementById(subjects[selected_subject]).style.backgroundColor="skyblue";
			var selected = subject.id;
			console.log(selected);
			selected_subject = subjects.indexOf(selected);
			console.log(selected_subject);
			document.getElementById(subjects[selected_subject]).style.backgroundColor="#aaffff";
			document.getElementById('nqs').innerHTML=parseInt(num_ques_subject[selected_subject]) +1;
		}
		function renderCode(){
			document.getElementById("questionBox").innerHTML = showQuestionCode;
			document.getElementById("o1").innerHTML = showOption1Code;
			document.getElementById("o2").innerHTML = showOption2Code;
			document.getElementById("o3").innerHTML = showOption3Code;
			document.getElementById("o4").innerHTML = showOption4Code;
			MathJax.typeset();
			document.getElementById('nqs').innerHTML=parseInt(num_ques_subject[selected_subject]) +1;


		}

		//Paragraph related scripts

		function showPara(){
			document.getElementById('entry').style.display="block";
			document.getElementById('paragraph').style.display="block";
		}
		function closePara() {
			document.getElementById('entry').style.display="none";
			document.getElementById('paragraph').style.display="none";
		}


		//paragraph related scripts ends here
		//Image related script goes here

		function openImage(){
			document.getElementById('math-editor').style.display="none";
			document.getElementById('entry').style.display="block";
			document.getElementById('paragraph').style.display="none";
			document.getElementById('image').style.display="block";
		}



		//image related script ends here
		function addPara(){
			var newPara = document.getElementById("para").value;
			if(selectedOption==0){
			showQuestionCode = showQuestionCode  + newPara ;
			questionCode =questionCode + newPara;
			}
			if(selectedOption==1){
			showOption1Code = showOption1Code + newPara;
			option1Code =option1Code + newPara ;
			}
			if(selectedOption==2){
			showOption2Code = showOption2Code  + newPara ;
			option2Code =option2Code + newPara ;
			}
			if(selectedOption==3){
			showOption3Code = showOption3Code + newPara ;
			option3Code =option3Code  + newPara ;
			}
			if(selectedOption==4){
			showOption4Code = showOption4Code + newPara ;
			option4Code =option4Code + newPara ;
			}
			renderCode();
			document.getElementById("para").value = "";
		}
		function addMath(){
			var neweq = document.getElementById("math-code").value;
			var neq = "%%20"+neweq+"%%20";
			if(selectedOption==0){
			showQuestionCode = showQuestionCode + neq ;
			questionCode =questionCode + neq;
			}
			if(selectedOption==1){
			showOption1Code = showOption1Code + neq;
			option1Code =option1Code + neq;
			}
			if(selectedOption==2){
			showOption2Code = showOption2Code +neq;
			option2Code =option2Code + neq;
			}
			if(selectedOption==3){
			showOption3Code = showOption3Code +neq;
			option3Code =option3Code + neq;
			}
			if(selectedOption==4){
			showOption4Code = showOption4Code + neq;
			option4Code =option4Code + neq;
			}
			renderCode();
		}
		function save(){
			var ImgName = randomstring+".png";
			if(selectedOption==0){
			showQuestionCode = showQuestionCode + "<br><img src = %%20../../image/questions image/" + ImgName + "%%20 class =%%20img%%20><br>";
			questionCode =questionCode + "<br><img src = %%20../../image/questions image/" + ImgName + "%%20 class =%%20img%%20><br>";
			}
			if(selectedOption==1){
			showOption1Code = showOption1Code + "<br><img src = %%20../../image/questions image/" + ImgName + "%%20 class =%%20img%%20><br>";
			option1Code =option1Code +  "<br><img src = %%20../../image/questions image/" + ImgName + "%%20 class =%%20img%%20><br>";
			}
			if(selectedOption==2){
			showOption2Code = showOption2Code + "<br><img src = %%20../../image/questions image/" + ImgName + "%%20 class =%%20img%%20><br>";
			option2Code =option2Code + "<br><img src = %%20../../image/questions image/" + ImgName + "%%20 class =%%20img%%20><br>";
			}
			if(selectedOption==3){
			showOption3Code = showOption3Code + "<br><img src = %%20../../image/questions image/" + ImgName + "%%20 class =%%20img%%20><br>";
			option3Code =option3Code + "<br><img src = %%20../../image/questions image/" + ImgName + "%%20 class =%%20img%%20><br>";
			}
			if(selectedOption==4){
			showOption4Code = showOption4Code +  "<br><img src = %%20../../image/questions image/" + ImgName + "%%20 class =%%20img%%20><br>";
			option4Code =option4Code + "<br><img src = %%20../../image/questions image/" + ImgName + "%%20 class =%%20img%%20><br>";
			}
			renderCode();
		}
		function checkEntries() {
			var flag =1;
			if(questionCode.trim().length<=0){
				flag=0;
			}
			 if(option1Code.trim().length<=0){
			 	flag=0;
			 }
			  if(option2Code.trim().length<=0){
			 	flag=0;
			 }
			  if(option3Code.trim().length<=0){
			 	flag=0;
			 }
			  if(option4Code.trim().length<=0){
			 	flag=0;
			 }
			if(flag==1){
				return true;
			}else{
				return false;
			}
		}
		function saveQuestion(){
			var addAfter = 0;
			var per = "*";
			for(var i=0; i<=selected_subject; i++){
				addAfter = parseInt(addAfter) + parseInt(num_ques_subject[i]);
			}
			num_ques_subject[selected_subject] = parseInt(num_ques_subject[selected_subject] )+1;
				for(var i=0; i<subjects.length; i++){
					per = per+parseInt(num_ques_subject[i])+"*";
				}
				num_ques_subject[selected_subject]--;
				console.log(per);
			if(checkEntries()){
				var finalOption = option1Code+ "%%21"+option2Code+"%%21" + option3Code+ "%%21"+ option4Code + "%%21*";
				console.log("go");
				$.ajax({
                    url:"../processes/inserting_question.php",
                    method:"post",
                    data:{id:test_id,after:addAfter,question:questionCode,perq:per,option:finalOption},
                    success: function getdata(result){
                    	console.log(result);
                        if(result=="success"){
                        	console.log(result);
                        	document.getElementById("target").submit();
                        	document.getElementById("entry").style.display = "none";
                        	document.getElementById("savebtn").style.display = "none";
                        	num_ques_subject[selected_subject]++; 
                        	canAdd = 1;
                        }
                    } 
                })
			}

		}
		function addQuestion() {
			if(canAdd==1){
				showQuestionCode=" ";
				questionCode=" ";
				showOption1Code=" ";
				option1Code=" ";
				showOption2Code=" ";
				option2Code=" ";
				showOption3Code=" ";
				option3Code=" ";
				showOption4Code=" ";
				option4Code=" ";
				document.getElementById("numr").value = "";
			document.getElementById("denr").value = "";
			document.getElementById("para").value = "";
				document.getElementById("entry").style.display = "block";
                        	document.getElementById("savebtn").style.display = "inline";
                        	renderCode();
                        	document.getElementById('nqs').innerHTML=parseInt(num_ques_subject[selected_subject]) +1;
                        	canAdd=0;
			}else{
				window.alert("Save this question before adding new");
			}
		}
		function selectOption(show){
			var id = show.id;
			document.getElementById(id).style.backgroundColor="powderblue";
			if(id!="questionBox"){
				document.getElementById("questionBox").style.backgroundColor="white";
			}else{
				selectedOption = 0;
			}
			if(id!="o1"){
				document.getElementById("o1").style.backgroundColor="white";
			}else{
				selectedOption = 1;
			}
			if(id!="o2"){
				document.getElementById("o2").style.backgroundColor="white";
			}else{
				selectedOption = 2;
			}
			if(id!="o3"){
				document.getElementById("o3").style.backgroundColor="white";
			}else{
				selectedOption = 3;
			}
			if(id!="o4"){
				document.getElementById("o4").style.backgroundColor="white";
			}else{
				selectedOption = 4;
			}
		}
	</script>
		<script type="text/javascript">
		var numImg =0;
    function inputBtn(){
    var input=document.createElement('input');
    input.type="file";
    input.name ="img"+numImg;
    //without this next line, you'll get nuthin' on the display
    document.getElementById('target').appendChild(input);
    numImg++;
    randomString();
    document.getElementById('num').value=numImg;
    var val = document.getElementById('name').value;
    var newval = val+randomstring+"*";
    document.getElementById('name').value=newval;
}
</script>
<script type="text/javascript">
	function changeTextBtn(btn){
		var name = btn.innerHTML;
		console.log(name);
		var lc_name = name.toLowerCase();
		var collection = document.getElementsByClassName("c-entry");
		for (let i = 0; i < collection.length; i++) {
  			collection[i].style.display= "none";
			}
		document.getElementById(lc_name).style.display = "block";
	}
</script>
<script type="text/javascript">
var randomstring = " ";
function randomString() {  
            //define a variable consisting alphabets in small and capital letter  
    var characters = "ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";  
              
            //specify the length for the new string  
    var lenString = 10;  
    randomstring = '';  
  
            //loop to select a new character in each iteration  
    for (var i=0; i<lenString; i++) {  
        var rnum = Math.floor(Math.random() * characters.length);  
        randomstring += characters.substring(rnum, rnum+1);  
    }  
}  
</script>
<!-- script for math jax editor -->
<script type="text/javascript">
	function refreshCode(codeq){
		document.getElementById('math-code').value=codeq;
	};
	function mathShow() {
		var fcode = document.getElementById('math-code').value
		document.getElementById('math-editor-result').innerHTML="$"+fcode+"$";
		MathJax.typeset();
	}
	var mathjaxCode = "";
	const collection = document.getElementsByClassName('opener');
	for(let x=0; x<collection.length; x++){
		collection[x].addEventListener("click", function(){
			for(let q=0; q<collection.length; q++){
				document.getElementById(collection[q].name).style.display="none";
				document.getElementById(this.name).style.display="flex";
			}
		});
	}
	const over = document.getElementById('math-editor-items').children;
	const codes =[];
	var prevBtn="*";
	for (let z = 0; z < over.length; z++){
		const down = document.getElementById(over[z].id).children;
		for (let l = 0; l < down.length; l++) {
			codes.push(down[l].innerHTML);
  				down[l].addEventListener("click", function(){
  					console.log(this.id);
  					if(prevBtn=="*"){
  						prevBtn=this.id;
  						document.getElementById(this.id).style.backgroundColor="powderblue";
  					}else{
  						document.getElementById(prevBtn).style.backgroundColor="white";
  						document.getElementById(this.id).style.backgroundColor="powderblue";
  						prevBtn=this.id;
  					}
  					mathjaxCode=document.getElementById('math-code').value;
  					var myElement = document.getElementById('math-code');
        			var startPosition = myElement.selectionStart;
       				 var endPosition = myElement.selectionEnd;
        			var num = this.id.slice(1);
        			console.log(num);
        			num=parseInt(num);
        			console.log(num);
        			var acode = codes[num-1];
        			var acode1 = acode.slice(1);
        			console.log(acode1);
        			var acode2 = acode1.slice(0,acode1.length-1);
  					const result1 = mathjaxCode.slice(0, startPosition);
  					const result2 = mathjaxCode.slice(startPosition);
  					mathjaxCode=result1+acode2+result2;
  					console.log(mathjaxCode);
  					refreshCode(mathjaxCode);
  				});
			}
	}
	function openMathsEditor() {
		document.getElementById('math-editor').style.display="block";
	}
	function closeMathsEditor() {
		document.getElementById('math-editor').style.display="none";
	}
</script>
<!-- math jax script ends here -->
</body>
</html>