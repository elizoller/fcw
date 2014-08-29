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
<body data-spy="scroll"> 

	<div id="leftnav">
	<a href="http://uta.edu/library"><img src="images/Library-Logo-verticalWhite2.png" id="liblogo"></a><br/>
	<ul id="homenav">
	<li class="current"><a href="#intro">Faculty Creative Works</a></li>
	<br/>
	<li><a href="#home">Colleges &amp; Schools,<br/> UTA Libraries</a></li>
	<br/>
	</ul>
	<a href="search.php">Search</a><br/>
	</div>
	<div id="leftnav">
	<a href="#">Previous Years</a><br/>
	<a href="about.php" id="info"><span>i</span></a>
	<div id="shareparent">
	<a href="" id="share"><img src="images/share.png"></a>
	<div id="sharediv">
		<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="none">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-type="button"></div>
		<script src="//platform.linkedin.com/in.js" type="text/javascript">
		  lang: en_US
		</script>
		<script type="IN/Share"></script>
	</div>
	</div>
	</div>
	<div id="rightnav">
	<div id="arrow">
	<a href="#home"><span class='arrow-down'></span></a>
	</div>
	</div>

      
    <!-- Section #1 -->
	<section id="intro" data-speed="6" data-type="background">
			<div class="row">
			<div class='col-xs-12'>
			<h1 class='hometitle chopin text-center'>Celebrating</h1>
			<h1 class='hometitle year text-center'>Faculty Creative Works<br/>2013</h1>
			<h1>&nbsp;</h1>
			<h1>&nbsp;</h1>
			<h1>&nbsp;</h1>
			<h1>&nbsp;</h1>
			</div>
			</div>
	</section>

	<!-- Section #2 -->
	<section id="home" data-speed="4" data-type="background">
		<div class="row">
			<div class="col-xs-10 pull-right" id="colleges">
				<div class="row">
					<a href="architecture.php" class="odd"><img src="images/architecture.jpg" class='college'></a>
					<a href="education.php" class="odd"><img src="images/education.jpg" class='college'></a>
					<a href="liberalarts.php" class="odd"><img src="images/liberalarts.jpg" class='college'></a>
				</div>
				<div class="row">
					<a href="business.php" class="even"><img src="images/business.jpg" class='college'></a>
					<a href="engineering.php" class="odd"><img src="images/engineering.jpg" class='college'></a>
				</div>
				<div class="row">
					<h1 class='hometitle year maincollege'>Colleges &amp; Schools,<br/>UTA Libraries</h1>
					<a href="nursing.php" class="even nursingimg"><img src="images/nursing.jpg" class='college'></a>
				</div>
				<div class="row">
					<a href="science.php" class="bottom"><img src="images/science.jpg" class='college'></a>
					<a href="socialwork.php" class="bottom"><img src="images/socialwork.jpg" class='college'></a>
					<a href="urban.php" class="bottom"><img src="images/urban.jpg" class='college'></a>
					<a href="libraries.php" class="bottom"><img src="images/libraries.jpg" class='college'></a>
				</div>
			</div>
	    </div>
	</section>






    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="deploy/scripts/jquery.min.js"></script>
    <script src="deploy/scripts/app.min.js"></script>
   	<script src="deploy/scripts/init.js"></script>
   	<script src="deploy/scripts/jquery.nav.js"></script>
   	<script>
   		$(document).ready(function() {
   			$("#homenav").onePageNav({
   				currentClass: 'current',
   				changeHash:true
   			});
   		});
   	</script>
   	<script>
	$("#arrow").on('click', function(e) {
		e.preventDefault();
	   		var thishref = $('#homenav .current').children('a').attr('href');
	   		//alert (thishref);
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
   	$("#shareparent").hover(function() {
   		$("#sharediv").toggle('slide');
   		$("#share").animate({opacity:'1'},1);
   	});
   	$("#shareparent").mouseleave(function() {
   		$("#share").animate({opacity:'.4'},1);
   	})
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
