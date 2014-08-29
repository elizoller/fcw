
<?php

//$college = $_GET['college'];
$college = 1;
include("db.php");

$stmt1 = $db->prepare('SELECT * FROM colleges WHERE colleges.college_id=1');
$stmt1->execute();
while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
	$college_name = $row['college_name'];
	$college_dean = $row['college_dean'];
	$college_img = $row['college_img'];
}
?>

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

	
	<div class="row">
		<div class='col-xs-2'>

	<?php include("leftnav.php"); ?>
    
	
	<div id="rightnav">
	<ul id="nav">
	<li class="current arch_nav"><a href="#architecture" ></a></li>
	<li class="arch_nav"><a href="#architecture_departments" ></a></li>
	</ul>
	<div id="arrow">
	<a href="#"><span class='arrow-down'></span></a>
	</div>
	</div>	
		</div>
      <div class="col-xs-10 pull-right">
    <!-- Section #1 -->
	<section id="architecture" data-speed="6" data-type="background">
			<h1 class='architecture collegehome text-center'><?php echo $college_name; ?></h1>
	</section>
	<!-- Section #2 -->
	<section id="architecture_departments" data-speed="4" data-type="background">
		<div class="row">
			<h1><?php echo $college_name; ?></h1>
				<h3>Dean: <?php echo $college_dean; ?></h3>
				<?php 
		    	$stmt = $db->prepare("SELECT faculty.faculty_id, faculty_img, faculty_first_name, faculty_last_name, faculty_middle_name, faculty_item_types FROM faculty, items, faculty_items, departments, colleges WHERE faculty.faculty_id=faculty_items.faculty_id AND items.item_id=faculty_items.item_id AND faculty.college_id=colleges.college_id AND colleges.college_id=:id AND item_date = 2013 ORDER BY faculty_last_name");
		    	$stmt->execute(array(':id'=>$college));
		    	$facid = '';
		    	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		    		if ($row['faculty_id'] != $facid) {
		    		echo "<div class='row individual'>
		    		<div class='col-md-11 col-xs-12 pull-right'>
		    		<div class='row'>
		    		<div class='col-xs-2'>
		    		<div class='imgdiv'>
		    		<a data-toggle='modal' href='#" . $row['faculty_id'] . "'>
		    		<img src='images/" . $row['faculty_img'] . ".jpg'>
		    		</a>
		    		
		    		</div>
		    		</div>
		    		<div class='col-md-6 col-xs-10'>
		    		<span><b>
		    		<a data-toggle='modal' href='#" . $row['faculty_id'] . "'>" . $row['faculty_first_name'] . " " . $row['faculty_middle_name'] . " " . $row['faculty_last_name'] . "</a></b></span>
		    		<br/>" . $row['faculty_item_types'] . "</div>
		    		</div>
		    		</div>
		    		</div>
		    		<div class='modal fade ' id='" . $row['faculty_id'] . "' tabindex='-1' role='dialog' aria-labelledby='myLargeModal' area-hidden='true'>
		    		<div class='modal-dialog modal-lg'>
		    		<div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button><h3>" . $row['faculty_first_name'] . " " . $row['faculty_middle_name'] . " " . $row['faculty_last_name'] . "</h3></div>";
		    		echo "<div class='modal-body'>";
					$stmt2 = $db->prepare("SELECT categories.category_id, category_name, item_title, item_description FROM items, faculty, faculty_items, categories WHERE items.item_id=faculty_items.item_id AND faculty.faculty_id=faculty_items.faculty_id AND items.category_id=categories.category_id AND faculty.faculty_id=:faculty AND item_date = 2013 ORDER BY categories.category_id, item_title");
		    		$stmt2->execute(array(':faculty'=>$row['faculty_id']));
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
		    		$facid = $row['faculty_id'];
		    	}
		    	?>
			
	    </div>
	</section>

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
   			$("#nav").onePageNav({
   				changeHash:true
   			});
   		});
   	</script>
   	<script>	
   	$("#shareparent").hover(function() {
   		$("#sharediv").toggle('slide');
   		$("#share").animate({opacity:'1'},1);
   	});
   	$("#shareparent").mouseleave(function() {
   		$("#share").animate({opacity:'.4'},1);
   	})
   	</script>
   	<script>
	$("#arrow").on('click', function(e) {
	   		e.preventDefault();
	   		var thishref = $('.arch_nav.current').children('a').attr('href');
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
   	$(document).ready(function() {
   		$(window).scroll(function() {
		   	if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
		   		$("#arrow").hide();
		   	}
		   	else {
		   		$("#arrow").show();
		   	}
   		});
   	});
   	</script>	
  </body>
</html>
