<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Faculty Creative Works</title>

    <!-- Bootstrap core CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap/assets/js/html5shiv.js"></script>
      <script src="bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->
   <!--insert google analytics script-->

  </head>
<body> 

<?php

$college = 5;
include("db.php");

$stmt1 = $db->prepare('SELECT college_name, college_dean, college_img FROM colleges WHERE colleges.college_id=5');
$stmt1->execute();
while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
	$college_name = $row['college_name'];
	$college_dean = $row['college_dean'];
	$college_img = $row['college_img'];
}
?>

	<?php include("leftnav.php"); ?>
		
	<div id="rightnav">
	<ul id="nav">
	<div id="topTitle">Home</div><li class="current liberalarts_nav"><a href="#liberalarts" id="top"></a></li>
	</ul>
	<ul id="subnav">
	<div id="artTitle">Art and Art History</div><li class="liberalarts_nav"><a href="#17" id="art"></a></li>
	<div id="communicationTitle">Communication</div><li class="liberalarts_nav"><a href="#18" id="communication"></a></li>
	<div id="criminologyTitle">Criminology and Criminal Justice</div><li class="liberalarts_nav"><a href="#35" id="criminology"></a></li>
	<div id="englishTitle">English</div><li class="liberalarts_nav"><a href="#19" id="english"></a></li>
	<div id="historyTitle">History</div><li class="liberalarts_nav"><a href="#20" id="history"></a></li>
	<div id="linguisticsTitle">Linguistics and TESOL</div><li class="liberalarts_nav"><a href="#21" id="linguistics"></a></li>
	<div id="languagesTitle">Modern Languages</div><li class="liberalarts_nav"><a href="#22" id="languages"></a></li>
	<div id="musicTitle">Music</div><li class="liberalarts_nav"><a href="#23" id="music"></a></li>
	<div id="philosophyTitle">Philosophy and Humanities</div><li class="liberalarts_nav"><a href="#24" id="philosophy"></a></li>
	<div id="polisciTitle">Political Science</div><li class="liberalarts_nav"><a href="#25" id="polisci"></a></li>
	<div id="sociologyTitle">Sociology and Anthropology</div><li class="liberalarts_nav"><a href="#26" id="sociology"></a></li>
	<div id="theatreTitle">Theatre Arts</div><li class="liberalarts_nav"><a href="#27" id="theatre"></a></li>

	<!--this dynamically adds if there is a dean section-->
	<?php
	$stmt4 = $db->prepare("SELECT * FROM faculty, departments WHERE departments.department_id=faculty.department_id AND faculty.department_id=36 AND faculty.college_id=5");
	$stmt4->execute();
	$rowcount = $stmt4->rowCount();
	if ($rowcount > 0) {
		echo "<div id='deanTitle'>Office of the Dean</div><li class='liberalarts_nav'><a href='#36' id='dean'></a></li>";
	}
	?>
	</ul>
	<div id="arrow">
	<a href="#"><span class='arrow-down'></span></a>
	</div>
	</div>	


	<div class="row" id="main">
      <div class="col-xs-10 pull-right">
    <!-- Section #1 -->
	<section id="liberalarts" data-speed="4" data-type="background">
		<div class="row">
			<h1 class='liberalarts collegehome'><?php echo $college_name; ?></h1>
	    </div>
	</section>
	<!-- Section #2 -->




	<?php 
	//doesn't equal 36 because of special case for office of the dean
	$stmt = $db->prepare("SELECT departments.department_id, department_name, department_chair FROM departments, faculty WHERE faculty.department_id=departments.department_id AND faculty.college_id=:id AND faculty.department_id != 36 ORDER BY departments.department_id, faculty_last_name");
	$stmt->execute(array(':id'=>$college));
	
	$facid = '';
	$deptid = '';
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		if ($row['department_id'] != $deptid) {
				echo '<section id="' . $row['department_id'] . '" class="liberalarts_departments" data-speed="4" data-type="background"><div class="row main-liberalarts"><h1 id="liberalartstop">' . $college_name . '</h1><h3>Dean: ' . $college_dean . '</h3>';
			echo "<div class='depthead'><h2>" . $row['department_name'] . "</h2>";
			echo "<h3>Chair: " . $row['department_chair'] . "</h3>";
			$deptid = $row['department_id'];
			$stmt3 = $db->prepare("SELECT faculty.faculty_id, faculty_img, faculty_last_name, faculty_first_name, faculty_middle_name, faculty_item_types FROM departments, faculty WHERE faculty.department_id=departments.department_id AND faculty.department_id=:deptid ORDER BY departments.department_id, faculty_last_name");
				$stmt3->execute(array(':deptid'=>$deptid));
				while ($row3 = $stmt3->FETCH(PDO::FETCH_ASSOC)) {
			if ($row3['faculty_id'] != $facid) {
	    		echo "<div class='row individual'>
	    		<div class='col-md-11 col-xs-12 pull-right'>
	    		<div class='row'>
	    		<div class='col-xs-2'>
	    		<div class='imgdiv'>
	    		<a data-toggle='modal' href='#modal" . $row3['faculty_id'] . "'>
	    		<img src='images/" . $row3['faculty_img'] . ".jpg'>
	    		</a>
	    		
	    		</div>
	    		</div>
	    		<div class='col-md-6 col-xs-10'>
	    		<span><b>
	    		<a data-toggle='modal' href='#modal" . $row3['faculty_id'] . "'>" . $row3['faculty_first_name'] . " " . $row3['faculty_middle_name'] . " " . $row3['faculty_last_name'] . "</a></b></span>
	    		<br/>" . $row3['faculty_item_types'] . "</div>
	    		</div>
	    		</div>
	    		</div>
	    		<div class='modal fade ' id='modal" . $row3['faculty_id'] . "' tabindex='-1' role='dialog' aria-labelledby='myLargeModal' area-hidden='true'>
	    		<div class='modal-dialog modal-lg'>
	    		<div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button><h3>" . $row3['faculty_first_name'] . " " . $row3['faculty_middle_name'] . " " . $row3['faculty_last_name'] . "</h3></div>";
	    		echo "<div class='modal-body'>";
				$stmt2 = $db->prepare("SELECT categories.category_id, item_title, item_description, category_name FROM items, faculty, faculty_items, categories WHERE items.item_id=faculty_items.item_id AND faculty.faculty_id=faculty_items.faculty_id AND items.category_id=categories.category_id AND faculty.faculty_id=:faculty AND item_date = 2013 ORDER BY category_name, item_title");
	    		$stmt2->execute(array(':faculty'=>$row3['faculty_id']));
	    		$catid = '';
	    		while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
	    			if ($catid != $row2['category_id']) {
	    				echo "<h4>" . $row2['category_name'] . "</h4>";
	    			}
					if ($row2['item_title'] != NULL) {
						echo "<h5>" . $row2['item_title'] . "</h5>";
					}
					if ($row2['item_description'] != NULL) {
						echo "<p>" . $row2['item_description'] . "</p>";
					}
					$catid = $row2['category_id'];
	    		}
	    		echo "</div></div>
	    		</div>
	    		</div>";
	    		}
	    		$facid = $row3['faculty_id'];
	    	}
	    	echo "</div></div></section>";
		}
		else {

		}
    	
	}
	//this does the work for an office of the dean section
	$stmt4 = $db->prepare("SELECT * FROM faculty, departments WHERE departments.department_id=faculty.department_id AND faculty.department_id=36 AND faculty.college_id=5");
	$stmt4->execute();
	$rowcount = $stmt4->rowCount();
	if ($rowcount > 0) {
		echo '<section id="36" class="liberalarts_departments" data-speed="4" data-type="background"><div class="row main-liberalarts"><h1 id="liberalartstop">' . $college_name . '</h1><h3>Dean: ' . $college_dean . '</h3>';
			echo "<div class='depthead'><h2>Office of the Dean</h2>";
	while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
			if ($row4['faculty_id'] != $facid) {
	    		echo "<div class='row individual'>
	    		<div class='col-md-11 col-xs-12 pull-right'>
	    		<div class='row'>
	    		<div class='col-xs-2'>
	    		<div class='imgdiv'>
	    		<a data-toggle='modal' href='#modal" . $row4['faculty_id'] . "'>
	    		<img src='images/" . $row4['faculty_img'] . ".jpg'>
	    		</a>
	    		
	    		</div>
	    		</div>
	    		<div class='col-md-6 col-xs-10'>
	    		<span><b>
	    		<a data-toggle='modal' href='#modal" . $row4['faculty_id'] . "'>" . $row4['faculty_first_name'] . " " . $row4['faculty_middle_name'] . " " . $row4['faculty_last_name'] . "</a></b></span>
	    		<br/>" . $row4['faculty_item_types'] . "</div>
	    		</div>
	    		</div>
	    		</div>
	    		<div class='modal fade ' id='modal" . $row4['faculty_id'] . "' tabindex='-1' role='dialog' aria-labelledby='myLargeModal' area-hidden='true'>
	    		<div class='modal-dialog modal-lg'>
	    		<div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button><h3>" . $row4['faculty_first_name'] . " " . $row4['faculty_middle_name'] . " " . $row4['faculty_last_name'] . "</h3></div>";
	    		echo "<div class='modal-body'>";
				$stmt2 = $db->prepare("SELECT categories.category_id, item_title, item_description FROM items, faculty, faculty_items, categories WHERE items.item_id=faculty_items.item_id AND faculty.faculty_id=faculty_items.faculty_id AND items.category_id=categories.category_id AND faculty.faculty_id=:faculty AND item_date = 2013 ORDER BY categories.category_id, item_title");
	    		$stmt2->execute(array(':faculty'=>$row4['faculty_id']));
	    		$catid = '';
	    		while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
	    			if ($catid != $row2['category_id']) {
	    				echo "<h4>" . $row2['category_name'] . "</h4>";
	    			}
					if ($row2['item_title'] != NULL) {
						echo "<h5>" . $row2['item_title'] . "</h5>";
					}
					if ($row2['item_description'] != NULL) {
						echo "<p>" . $row2['item_description'] . "</p>";
					}
					$catid = $row2['category_id'];
	    		}
	    		echo "</div></div>
	    		</div>
	    		</div>";
	    		}
	    		$facid = $row4['faculty_id'];
	    	}
	    	echo "</div></div></section>";
	}

	?>
		
    </div>

	</div>





    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="deploy/scripts/jquery.min.js"></script>
    <script src="deploy/scripts/app.min.js"></script>
   	<script src="deploy/scripts/init.js"></script>
   	<script src="deploy/scripts/jquery.nav.js"></script>
   	<script>
   		$(document).ready(function() {   			
   			$("#subnav").onePageNav({
   				currentClass: 'current',
   				changeHash: true,
   				end: function() {
   					var hash = window.location.hash;
   					var thisid = hash.substring(1);
   					$(".liberalarts_departments").removeClass('curr');
   					$("#"+thisid).addClass('curr');
   				},
   				scrollChange: function($currentListItem) {
   					$('.liberalarts_departments').removeClass('curr');
   					//$('.liberalarts_nav').removeClass('current');
   					//$currentListItem.addlass('current');
   					var href = $currentListItem.children('a').attr('href');
   					var thisid = href.substring(1);
   					$('#'+thisid).addClass('curr');
   					//alert (href);

   				}
   			});	
   		$('section').first().addClass('curr');
   		});	
   	</script>
   		<script>
   	$(document).ready(function() {
   		var thisid;
   		$(window).scroll(function() {
   			//this dynamically changes what has curr selected
   			var thishref = $('#subnav .current').children('a').attr('href');
   			if (thishref) {
   			var thisid = thishref.substring(1);
   			//alert (thisid);
			$('.liberalarts_departments').removeClass('curr');
			$('#liberalarts').removeClass('curr');
			$('#nav li').first().removeClass('current');
	   		$('#'+thisid).addClass('curr');
	   		}
	   		var height = $(window).scrollTop();
		   	if (height < 50) {
		   		$('#top').parent().addClass('current');
			   	$('#liberalarts').addClass('curr');
				$('.liberalarts_departments').removeClass('curr');
				$('#subnav li').removeClass('current');
		   	}
		   	else {
		   		$('#top').parent().removeClass('current');
		   	}
		   	if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
		   		$("#arrow").hide();
		   	}
		   	else {
		   		$("#arrow").show();
		   	}
   		});
   		$('section').first();
   	});
   	</script>	
   	<script>
   	$('#top').on('click', function(e) {
	   		e.preventDefault();
	   		var aHref = $('#top').attr('href');
	   		var top = $(aHref).offset().top;
	   		$('html,body').animate({
	   			scrollTop: top
	   		}
	   		);
	   });
   	</script>
	<script>
	$("#arrow").on('click', function(e) {
	   		e.preventDefault();
	   		var thishref = $('.liberalarts_nav.current').children('a').attr('href');
	   			if (thishref) {
	   		if ($(thishref).next('section').length > 0) {
	   			var next = $(thishref).next('section');
	   			var top = next.offset().top;
	   			$(thishref).removeClass('curr');
	   			$('html,body').animate({
	   				scrollTop: top
	   			}, function() {
	   				next.addClass('curr');
	   			});
	   		}
	   	}
	   	});
	</script>
   	<script>
   	$("#art").on('mouseover', function() {
   		$("#artTitle").fadeIn('slow','linear');
   	});
   	$("#art").on('mouseout', function() {
   		$("#artTitle").fadeOut('slow', 'linear');
   	});
   	$("#communication").on('mouseover', function() {
   		$("#communicationTitle").fadeIn('slow','linear');
   	});
   	$("#communication").on('mouseout', function() {
   		$("#communicationTitle").fadeOut('slow', 'linear');
   	});
   	$("#criminology").on('mouseover', function() {
   		$("#criminologyTitle").fadeIn('slow','linear');
   	});
   	$("#criminology").on('mouseout', function() {
   		$("#criminologyTitle").fadeOut('slow', 'linear');
   	});
   	$("#english").on('mouseover', function() {
   		$("#englishTitle").fadeIn('slow','linear');
   	});
   	$("#english").on('mouseout', function() {
   		$("#englishTitle").fadeOut('slow', 'linear');
   	});
   	$("#history").on('mouseover', function() {
   		$("#historyTitle").fadeIn('slow','linear');
   	});
   	$("#history").on('mouseout', function() {
   		$("#historyTitle").fadeOut('slow', 'linear');
   	});
   	$("#linguistics").on('mouseover', function() {
   		$("#linguisticsTitle").fadeIn('slow','linear');
   	});
   	$("#linguistics").on('mouseout', function() {
   		$("#linguisticsTitle").fadeOut('slow', 'linear');
   	});
   	$("#top").on('mouseover', function() {
   		$("#topTitle").fadeIn('slow','linear');
   	});
   	$("#top").on('mouseout', function() {
   		$("#topTitle").fadeOut('slow', 'linear');
   	});
   	$("#dean").on('mouseover', function() {
   		$("#deanTitle").fadeIn('slow','linear');
   	});
   	$("#dean").on('mouseout', function() {
   		$("#deanTitle").fadeOut('slow', 'linear');
   	});
   	$("#languages").on('mouseover', function() {
   		$("#languagesTitle").fadeIn('slow','linear');
   	});
   	$("#languages").on('mouseout', function() {
   		$("#languagesTitle").fadeOut('slow', 'linear');
   	});
   	$("#music").on('mouseover', function() {
   		$("#musicTitle").fadeIn('slow','linear');
   	});
   	$("#music").on('mouseout', function() {
   		$("#musicTitle").fadeOut('slow', 'linear');
   	});
   	$("#philosophy").on('mouseover', function() {
   		$("#philosophyTitle").fadeIn('slow','linear');
   	});
   	$("#philosophy").on('mouseout', function() {
   		$("#philosophyTitle").fadeOut('slow', 'linear');
   	});
   	$("#polisci").on('mouseover', function() {
   		$("#polisciTitle").fadeIn('slow','linear');
   	});
   	$("#polisci").on('mouseout', function() {
   		$("#polisciTitle").fadeOut('slow', 'linear');
   	});
   	$("#sociology").on('mouseover', function() {
   		$("#sociologyTitle").fadeIn('slow','linear');
   	});
   	$("#sociology").on('mouseout', function() {
   		$("#sociologyTitle").fadeOut('slow', 'linear');
   	});
   	$("#theatre").on('mouseover', function() {
   		$("#theatreTitle").fadeIn('slow','linear');
   	});
   	$("#theatre").on('mouseout', function() {
   		$("#theatreTitle").fadeOut('slow', 'linear');
   	});
   	</script>
   	<script>	
   	$("#shareparent").hover(function() {
   		$("#sharediv").toggle('slide');
   		$("#share").animate({opacity:'1'},1);
   	});
   	$("#shareparent").mouseleave(function() {
   		$("#share").animate({opacity:'.4'},1);
   	});
   	</script>
  </body>
</html>
