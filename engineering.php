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
   <!-- google analytics script-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16674574-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </head>
<body> 

<?php

$college = 4;
include("db.php");

$stmt1 = $db->prepare('SELECT college_name, college_dean, college_img FROM colleges WHERE colleges.college_id=4');
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
	<div id="topTitle">Home</div><li class="current engineering_nav"><a href="#engineering" id="top"></a></li>
	</ul>
	<ul id="subnav">
	<div id="bioengineeringTitle">Bioengineering</div><li class="engineering_nav"><a href="#10" id="bioengineering"></a></li>
	<div id="civilTitle">Civil Engineering</div><li class="engineering_nav"><a href="#11" id="civil"></a></li>
	<div id="compsciTitle">Computer Science</div><li class="engineering_nav"><a href="#12" id="compsci"></a></li>
	<div id="electricalTitle">Electrical Engineering</div><li class="engineering_nav"><a href="#13" id="electrical"></a></li>
	<div id="industrialTitle">Industrial and Manufacturing Systems Engineering</div><li class="engineering_nav"><a href="#14" id="industrial"></a></li>
	<div id="materialsTitle">Materials Science and Engineering</div><li class="engineering_nav"><a href="#15" id="materials"></a></li>
   	<div id="mechanicalTitle">Mechanical and Aerospace Engineering</div><li class="engineering_nav"><a href="#16" id="mechanical"></a></li>
	<!--this dynamically adds if there is a dean section-->
	<?php
	$stmt4 = $db->prepare("SELECT * FROM faculty, departments WHERE departments.department_id=faculty.department_id AND faculty.department_id=36 AND faculty.college_id=4");
	$stmt4->execute();
	$rowcount = $stmt4->rowCount();
	if ($rowcount > 0) {
		echo "<div id='deanTitle'>Office of the Dean</div><li class='engineering_nav'><a href='#36' id='dean'></a></li>";
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
	<section id="engineering" data-speed="4" data-type="background">
		<div class="row">
			<h1 class='engineering collegehome'><?php echo $college_name; ?></h1>
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
				echo '<section id="' . $row['department_id'] . '" class="engineering_departments" data-speed="4" data-type="background"><div class="row main-engineering"><h1 id="engineeringtop">' . $college_name . '</h1><h3>Dean: ' . $college_dean . '</h3>';
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
	$stmt4 = $db->prepare("SELECT * FROM faculty, departments WHERE departments.department_id=faculty.department_id AND faculty.department_id=36 AND faculty.college_id=4");
	$stmt4->execute();
	$rowcount = $stmt4->rowCount();
	if ($rowcount > 0) {
		echo '<section id="36" class="engineering_departments" data-speed="4" data-type="background"><div class="row main-engineering"><h1 id="engineeringtop">' . $college_name . '</h1><h3>Dean: ' . $college_dean . '</h3>';
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
   					$(".engineering_departments").removeClass('curr');
   					$("#"+thisid).addClass('curr');
   				},
   				scrollChange: function($currentListItem) {
   					$('.engineering_departments').removeClass('curr');
   					//$('.engineering_nav').removeClass('current');
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
			$('.engineering_departments').removeClass('curr');
			$('#engineering').removeClass('curr');
			$('#nav li').first().removeClass('current');
	   		$('#'+thisid).addClass('curr');
	   		}
	   		var height = $(window).scrollTop();
		   	if (height < 50) {
		   		$('#top').parent().addClass('current');
			   	$('#engineering').addClass('curr');
				$('.engineering_departments').removeClass('curr');
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
	   		var thishref = $('.engineering_nav.current').children('a').attr('href');
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
   	$("#bioengineering").on('mouseover', function() {
   		$("#bioengineeringTitle").fadeIn('slow','linear');
   	});
   	$("#bioengineering").on('mouseout', function() {
   		$("#bioengineeringTitle").fadeOut('slow', 'linear');
   	});
   	$("#civil").on('mouseover', function() {
   		$("#civilTitle").fadeIn('slow','linear');
   	});
   	$("#civil").on('mouseout', function() {
   		$("#civilTitle").fadeOut('slow', 'linear');
   	});
   	$("#compsci").on('mouseover', function() {
   		$("#compsciTitle").fadeIn('slow','linear');
   	});
   	$("#compsci").on('mouseout', function() {
   		$("#compsciTitle").fadeOut('slow', 'linear');
   	});
   	$("#electrical").on('mouseover', function() {
   		$("#electricalTitle").fadeIn('slow','linear');
   	});
   	$("#electrical").on('mouseout', function() {
   		$("#electricalTitle").fadeOut('slow', 'linear');
   	});
   	$("#industrial").on('mouseover', function() {
   		$("#industrialTitle").fadeIn('slow','linear');
   	});
   	$("#industrial").on('mouseout', function() {
   		$("#industrialTitle").fadeOut('slow', 'linear');
   	});
   	$("#materials").on('mouseover', function() {
   		$("#materialsTitle").fadeIn('slow','linear');
   	});
   	$("#materials").on('mouseout', function() {
   		$("#materialsTitle").fadeOut('slow', 'linear');
   	});
	$("#mechanical").on('mouseover', function() {
   		$("#mechanicalTitle").fadeIn('slow','linear');
   	});
   	$("#mechanical").on('mouseout', function() {
   		$("#mechanicalTitle").fadeOut('slow', 'linear');
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
