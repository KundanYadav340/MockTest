<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View test</title>
    <link rel="stylesheet" type="text/css" href="../style/testShow.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../../others/files/jquery-3.6.0.js"></script>
</head>
<body>
	<div id="header">
		<i class="fa fa-arrow-left" onclick="back()"></i> Test Details
	</div>
	<div id="empty"></div>
	<div id="main-box">
		<div id="left-box">
			box for left items
		</div>
		<div id="right-box">
			<div id="details" class="box-inside">
				<div id="name" class="details-items">
					<span>Test Name : </span>Major test series
				</div>
				<div id="tid" class="details-items">
					<span> Test Id : </span>#2341267866
				</div>
				<div id="from" class="details-items">
					<span>From : </span>Institute of Engineering and technology, Lucknow
				</div>
				<div id="target" class="details-items">
					<span>Target Students : </span>Jee-mains & Advanced
				</div>
				<div id="subject" class="details-items">
					<span>Subjects : </span>Mathematics, Physics, Chemistry
				</div>
				<div id="topic" class="details-items">
					<span>Topics Included : </span>Algebra, 2-D Geometry, Permutation and Combination, Newtons Laws of Motion, Kinematics, Electrostatics, Periodic table, s-Block Elements
				</div>
				<div id="type" class="details-items">
					<span>Test Type : </span>Normal test
				</div>
				<div id="duration" class="details-items">
					<span>Duration : </span>03:00:00
				</div>
				<div id="time" class="details-items">
					<span>Start and End : </span>12th,August 12:00 AM to 17th,August 11:00 PM 
				</div>
				<div id="description" class="details-items">
					<span>Description : </span> lorem ipsum sit dollar ammet in the house of the dungeon dont go alone you will be frightened and no one will save you beacause i am not a good warrior hey come on we are going toward the west for better future
				</div>
			</div>
			<div id="important-btns" class="box-inside">
				<button>Download Syllabus</button>
				<button>Download Reading Contents</button>
				<button>See Solutions</button>
				<button>See Result</button>
			</div>
			<br>
			<h3>Subjects and their question types</h3>
			<div id="question-analysis" class="box-inside">
				<?php
					for($i=0; $i<5; $i++){
				?>
					<div class="question-card">
						<div class="question-card-header">
							Physics
						</div>
						<div class="question-card-body">
							Multiple choice : 10<br>
							match the following : 10<br>
							numerical type : 10<br>
						</div>
					</div>
				<?php 
			}?>
			</div>
			<br>
			<hr>
			<br>
			<h3>Question tags by instructor</h3>
			<div id="tags" class="box-inside">
				<table>
					<tr>
						<th>S.no</th>
						<th>Tags</th>
						<th>Questions</th>
					</tr>
					<tr>
						<td>1</td>
						<td>Formula Based</td>
						<td>12</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Tricky</td>
						<td>16</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Theoretical</td>
						<td>35</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Numerical</td>
						<td>45</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Easy</td>
						<td>20</td>
					</tr>
					<tr>
						<td>6</td>
						<td>Medium</td>
						<td>35</td>
					</tr>
					<tr>
						<td>7</td>
						<td>Hard</td>
						<td>15</td>
					</tr>
				</table>
			</div>
			<br>
			<br>
			<div id="rating" class="box-inside">
				<div id="rating-head">
					<div id="rating-title">
						<span>Ratings & Reviews</span>
						<button>Rate Test</button>
					</div>
					<div id="rating-value">
						<span>4.6 <i class="fa fa-star"></i></span> 1046 ratings and 342 reviews
					</div>
				</div>
				<div id="rating-body">
					<?php 
					for($j=0;$j<5;$j++){
						?>
					<div class="rating-card">
						<div class="rating-card-tags">
							<span>4.8 <i class="fa fa-star"></i></span> Must take | Medium | Tricky
						</div>
						<div class="rating-card-content">
							Just loved this test ! You must have strong grip over all the formulas and tricks to score better... Go for it
						</div>
						<div class="rating-card-footer">
							<div class="user">
								Kundan Yadav | Preparing for Jee-mains & Advanced
							</div>
							<div class="posted">
								<i class="fa fa-check"></i> attempted test | 3 days ago
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div id="rating-foot">
					See all 342 reviews
				</div>
			</div>
			<br>
			<div id="instructor">
				<div id="instructor-institute">
					Institue of Engineering and technology
					<span>4.5 <i class="fa fa-star"></i></span>
				</div>
				<div id = "i-head">Instructors</div>
				<div id="i-box">
					<div id="instructor-name">Kundan Yadav<br>
						<span>35 test | 4 test series</span>
					</div>
					<div id="i-img">
					<img src="../../image/icons/people.png">
				</div>
				</div>
			</div>
			<br>
			<br>
			<br>
		</div>
	</div>
	<div id = "enrolled">
			@10 <button> ENROLL NOW </button>
	</div>


	<script type="text/javascript">
		function back() {
			history.back();
		}
	</script>
</body>
</html>