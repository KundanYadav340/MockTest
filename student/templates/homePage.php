<?php
    include "../../others/include/conn.php";
    $popularId = array();
    $popularName = array();
    $popularTeacher = array();
    $popularTime = array();
    $popularStartDate = array();
    $popularEndDate = array();
    $popularTarget = array();
    $popularSubject = array();
    $popularTopic = array();
    $popularRating = array();
    $popularEnrolled = array();
    $popularPrice = array();
    $recentId = array();
    $recentName = array();
    $recentTeacher = array();
    $recentTime = array();
    $recentStartDate = array();
    $recentEndDate = array();
    $recentTarget = array();
    $recentSubject = array();
    $recentTopic = array();
    $recentRating = array();
    $recentEnrolled = array();
    $recentPrice = array();


    $sql = "SELECT * FROM paper ORDER BY enrolled desc limit 10";
    $result = mysqli_query($con, $sql);
    while ($pass = mysqli_fetch_assoc($result)) {
        array_push($popularId , $pass['test_id']);
        array_push($popularName , $pass['name_of_test']);
        array_push($popularTeacher , $pass['institute']);
        array_push($popularTime , $pass['duration']);
        array_push($popularStartDate , $pass['timeStart']);
        array_push($popularEndDate , $pass['timeEnd']);
        array_push($popularTarget , $pass['target']);
        array_push($popularSubject , $pass['name_of_subjects']);
        array_push($popularTopic , $pass['topics']);
        array_push($popularRating , $pass['rating']);
        array_push($popularEnrolled , $pass['enrolled']);
        array_push($popularPrice , $pass['price']);
    }

    $sqlr = "SELECT * FROM paper ORDER BY timeStart desc limit 10";
    $resultr = mysqli_query($con, $sqlr);
    while ($pass = mysqli_fetch_assoc($resultr)) {
        array_push($recentId , $pass['test_id']);
        array_push($recentName , $pass['name_of_test']);
        array_push($recentTeacher , $pass['institute']);
        array_push($recentTime , $pass['duration']);
        array_push($recentStartDate , $pass['timeStart']);
        array_push($recentEndDate , $pass['timeEnd']);
        array_push($recentTarget , $pass['target']);
        array_push($recentSubject , $pass['name_of_subjects']);
        array_push($recentTopic , $pass['topics']);
        array_push($recentRating , $pass['rating']);
        array_push($recentEnrolled , $pass['enrolled']);
        array_push($recentPrice , $pass['price']);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="../style/homePage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../../others/files/jquery-3.6.0.js"></script>
</head>
<body>
    <div id="header">
        <div id="logo">
            Loosers
        </div>
        <div id="top-nav">
            <div class="top-navbar">
                <a class="active" href="#"><i class="fa fa-flask"></i><br>Test</a> 
                <a href="#"><i class="fa fa-book"></i><br>Notebook</a> 
                <a href="#"><i class="fa fa-gamepad"></i><br>Games</a> 
                <a href="#"><i class="fa fa-pencil"></i><br>Class</a>
            </div> 
        </div>
        <div id="tail-items">
            <i class="fa fa-bell"></i>
        </div>
    </div>
    <div id="main-box">
        <div id="left-box">
            <div id="left-box-inside">
                this box will contain filters
            </div>
        </div>
        <div id="right-box">
            <div id="find">
                <div id="filter-btn" onclick="showStatus()">
                    <i class="fa fa-filter"></i>
                </div>
                <div id="search-bar">
                    <div id="input-field">
                        <input class="no-outline" type="text" name="search" >
                    </div>
                    <div id="search-icon">
                        <i class = "fa fa-search"></i>
                    </div>
                </div>
            </div>
            <div id="showing">
                showing result for Jee-Mains
            </div>

            <!-- Showing popular test series -->
            <div class="container">
                <div class="container-header">
                    Most Popular
                </div>
                <div class="container-box">
                    <?php 
                        for($i=0; $i<7; $i++){
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-left">
                                    <div class="test-name">
                                            <?php
                                                echo $popularName[$i];
                                            ?>
                                    </div>
                                    <div class="test-creator">
                                        <?php
                                                echo $popularTeacher[$i];
                                            ?>
                                    </div>
                                </div>
                                <div class="card-header-right">
                                    <div class="test-time">
                                        <img class="icon-img" src = "../../image/icons/schedule.png" alt="img">
                                         <?php
                                                echo $popularTime[$i];
                                            ?>
                                         <br>
                                         <span id ="start-end">
                                         <?php
                                                echo substr($popularStartDate[$i], 0,10);
                                            ?> 
                                     </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="test-target-box">
                                    <div class="test-target-icon">
                                        <img class="icon-img" src = "../../image/icons/target.png" alt="img">
                                    </div>
                                    <div class="test-target-name">
                                        <?php
                                                echo $popularTarget[$i];
                                            ?>
                                    </div>
                                </div>
                                <div class="test-subject-box">
                                    <div class="test-subject-icon">
                                        <img class="icon-img" src = "../../image/icons/books.png" alt="img">
                                    </div>
                                    <div class="test-subject-name">
                                        <?php
                                                echo $popularSubject[$i];
                                            ?>
                                    </div>
                                </div>
                                <div class="test-topic-box">
                                    <div class="test-topic-icon">
                                        <img class="icon-img" src = "../../image/icons/topic.png" alt="img">
                                    </div>
                                    <div class="test-topic-name">
                                        <?php
                                                echo $popularTopic[$i];
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class=card-footer-navbar>
                                    <a href="#"><img class="footer-icon-img" src = "../../image/icons/star.png" alt="img"><br><?php
                                                echo $popularRating[$i];
                                            ?></a> 
                                    <a href="#"><img class="footer-icon-img" src = "../../image/icons/people.png" alt="img"><br><?php
                                                echo $popularEnrolled[$i];
                                            ?></a> 
                                    <a href="#"><img class="footer-icon-img" src = "../../image/icons/heart.png" alt="img"><br>Rs.<?php
                                                echo $popularPrice[$i];
                                            ?></a> 
                                    <a href="#"><img class="footer-icon-img" src = "../../image/icons/sign-up.png" alt="img"><br>enroll now</a>
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                    ?>
                </div>
            </div>
            <!-- popular test list ends here -->
            <!-- Recent test goes here -->
            <div class="container">
                <div class="container-header">
                    Recent tests
                </div>
                <div class="container-box">
                    <?php 
                        for($i=0; $i<7; $i++){
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-left">
                                    <div class="test-name">
                                        <?php
                                            echo $recentName[$i];
                                        ?>
                                    </div>
                                    <div class="test-creator">
                                        <?php
                                            echo $recentTeacher[$i];
                                        ?>
                                    </div>
                                </div>
                                <div class="card-header-right">
                                    <div class="test-time">
                                        <img class="icon-img" src = "../../image/icons/schedule.png" alt="img">
                                         <?php
                                            echo $recentTime[$i];
                                        ?>
                                         <br>
                                         <span id ="start-end">
                                         <?php
                                            echo substr($recentStartDate[$i],0,10);
                                        ?>
                                     </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="test-target-box">
                                    <div class="test-target-icon">
                                        <img class="icon-img" src = "../../image/icons/target.png" alt="img">
                                    </div>
                                    <div class="test-target-name">
                                        <?php
                                            echo $recentTarget[$i];
                                        ?>
                                    </div>
                                </div>
                                <div class="test-subject-box">
                                    <div class="test-subject-icon">
                                        <img class="icon-img" src = "../../image/icons/books.png" alt="img">
                                    </div>
                                    <div class="test-subject-name">
                                        <?php
                                            echo $recentSubject[$i];
                                        ?>
                                    </div>
                                </div>
                                <div class="test-topic-box">
                                    <div class="test-topic-icon">
                                        <img class="icon-img" src = "../../image/icons/topic.png" alt="img">
                                    </div>
                                    <div class="test-topic-name">
                                        <?php
                                            echo $recentTopic[$i];
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class=card-footer-navbar>
                                    <a href="#"><img class="footer-icon-img" src = "../../image/icons/star.png" alt="img"><br>
                                        <?php
                                            echo $recentRating[$i];
                                        ?>
                                    </a> 
                                    <a href="#"><img class="footer-icon-img" src = "../../image/icons/people.png" alt="img"><br><?php
                                            echo $recentEnrolled[$i];
                                        ?></a> 
                                    <a href="#"><img class="footer-icon-img" src = "../../image/icons/heart.png" alt="img"><br>Rs.<?php
                                            echo $recentPrice[$i];
                                        ?></a> 
                                    <a href="#"><img class="footer-icon-img" src = "../../image/icons/sign-up.png" alt="img"><br>enroll now</a>
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                    ?>
                </div>
            <!-- recent test ends here -->
            <!-- test series box starts here -->

            <!-- test series box ends here -->
        </div>
        <div id="last-space">
            
        </div>
    </div>

    <script type="text/javascript">
        var m =0;
        function showStatus(){
            if(m==0){
                document.getElementById('filter-btn').innerHTML = "<i class='fa fa-close'></i>";
                document.getElementById('left-box').style.display = "block";
                m=1;
            }else{
                document.getElementById('filter-btn').innerHTML = "<i class='fa fa-filter'></i>";
                document.getElementById('left-box').style.display = "none";
                m=0;
            }
        }
    </script>
</body>
</html>