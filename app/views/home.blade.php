<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=".IP">
    <meta name="author" content=".IP Team">
    <link rel="shortcut icon" href="themes/Pratt/assets/ico/favicon.png">

    <title>.IP - Easy redirection</title>

    <!-- Bootstrap core CSS -->
    <link href="../themes/Pratt/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../themes/Pratt/assets/css/main.css" rel="stylesheet">
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    <script src="../themes/Pratt/assets/js/jquery.min.js"></script>
    <script src="../themes/Pratt/assets/js/smoothscroll.js"></script>
    

  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navigation">

    <!-- Fixed navbar -->
	    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" style="padding:8px 20px 0px 0px;" href="#"><img src="../themes/Pratt/assets/img/logo_dotip_beta.png" height="36" alt=""></a>
	        </div>
	        <div class="navbar-collapse collapse">
	          <ul class="nav navbar-nav">
	            <li class="active"><a href="#home" class="smothscroll">Home</a></li>
	            <li><a href="#desc" class="smothscroll">Description</a></li>
	            <li><a href="#showcase" class="smothScroll">Showcase</a></li>
	            <li><a href="#contact" class="smothScroll">Contact</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>


	<section id="home" name="home"></section>
	<div id="headerwrap">
	    <div class="container">
	    	<div class="row centered">
	    		<div class="col-lg-12">
					<h1><img src="../themes/Pratt/assets/img/logo_dotip_beta.png" height="128" alt=""></h1>
					<h3>The easiest & simpliest way to create redirections</h3>
					<br>
	    		</div>
	    		<div class="col-lg-8 col-lg-offset-2">
					<p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
	    		</div>
			</div>
		</div>
		<div class="container">
		
			@if ($errors->any())
			<ul style="color:red;">
			{{ implode('', $errors->all('<li>:message</li>')) }}
			</ul>
			@endif
			@if (Session::has('message'))
			<p>{{ Session::get('message') }}</p>
			@endif
			
			{{ Form::open(array('url' => 'home/create')) }}
			
				{{ Form::hidden('form_name', 'create'); }}

				<div class="row centered">
					<div class="col-lg-2 col-lg-offset-2">
						<h3><b style="font-size:120%">REDIRECT</b></h3>
					</div>
					
					<div class="col-lg-3 text-left">
						<label for="domain_id" class="control-label text-left">Domain</label>
						<?php
						$domains = array();
						foreach(DB::table('domains')->get() as $value)
						{
							$domains = $domains + array($value->id => 'www.' . $value->domain);
						}
						?>

						{{ Form::select('domain_id', $domains, 1, array('class'=>'form-control')); }}

					</div>
					<div class="col-lg-2 text-left">
						<label for="dirname" class="control-label text-left">Directory name</label>
						
						{{ Form::text('dirname', Input::old('dirname'), array('class'=>'form-control','placeholder'=>'directoryname','required','autofocus')) }}
						
					</div>
				</div>
				<br />
				<div class="row centered">
					<div class="col-lg-2 col-lg-offset-2">
						<h3><b style="font-size:120%">TO</b></h3>
					</div>
					
					<div class="col-lg-5 text-left">
						<label for="destination" class="control-label text-left">URL or IP address</label>
						
						{{ Form::text('destination', Input::old('destination'), array('class'=>'form-control','placeholder'=>'www.domain.com or 73.60.114.126','required','autofocus')) }}

					</div>
				</div>
				<div class="row centered">
					<div class="col-lg-6 col-lg-offset-4">
						<p><b>www.dotip.net/directoryname</b><br />will be redirected to <b>73.60.114.126</b></p>
					</div>
				</div>
				<div class="row centered">
					<label for="email" class="col-lg-3 col-lg-offset-3 control-label text-right">Email</label>
					<div class="col-lg-3">

						{{ Form::email('email', Input::old('email'), array('class'=>'form-control','placeholder' => 'email@domain.com','required','autofocus')) }}
						
					</div>
				</div>
				<br />
				<div class="row centered">
					<div class="col-lg-3 col-lg-offset-6">
					
						{{ Form::submit('create this redirection *', array('class'=>'btn btn-lg btn-primary btn-block')) }}

					</div>
				</div>
				
				{{ Form::close() }}
				
	    </div> <!--/ .container -->
		
		<br><br><br><br>

	</div><!--/ #headerwrap -->


	<section id="desc" name="desc"></section>
	<!-- INTRO WRAP -->
	<div id="intro">
		<div class="container">
			<div class="row centered">
				<h1>Login</h1>
				<br>
				<div class="col-lg-4 col-lg-offset-4">

					@include('login')			

				</div>
				<div class="col-lg-4 text-left">
					<br />
					<img src="../themes/Pratt/assets/img/intro01.png" alt="">
				</div>
			</div>
			<br>
			<hr>
	    </div> <!--/ .container -->
	</div><!--/ #introwrap -->

	<section id="desc" name="desc"></section>
	<!-- INTRO WRAP -->
	<div id="intro">
		<div class="container">
			<div class="row centered">
				<h1>Newsletter</h1>
				<br>
				<br>
				<div class="col-lg-4">
					<img src="../themes/Pratt/assets/img/intro01.png" alt="">
					<h3>Community</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
				<div class="col-lg-4">
					<img src="../themes/Pratt/assets/img/intro02.png" alt="">
					<h3>Schedule</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
				<div class="col-lg-4">
					<img src="../themes/Pratt/assets/img/intro03.png" alt="">
					<h3>Monitoring</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
			</div>
			<br>
			<hr>
	    </div> <!--/ .container -->
	</div><!--/ #introwrap -->	
	
	<!-- FEATURES WRAP -->
	<div id="features">
		<div class="container">
			<div class="row">
				<h1 class="centered">What's New?</h1>
				<br>
				<br>
				<div class="col-lg-6 centered">
					<img class="centered" src="../themes/Pratt/assets/img/mobile.png" alt="">
				</div>
				
				<div class="col-lg-6">
					<h3>Some Features</h3>
					<br>
				<!-- ACCORDION -->
		            <div class="accordion ac" id="accordion2">
		                <div class="accordion-group">
		                    <div class="accordion-heading">
		                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
		                        First Class Design
		                        </a>
		                    </div><!-- /accordion-heading -->
		                    <div id="collapseOne" class="accordion-body collapse in">
		                        <div class="accordion-inner">
								<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
								</div><!-- /accordion-inner -->
		                    </div><!-- /collapse -->
		                </div><!-- /accordion-group -->
		                <br>
		
		                <div class="accordion-group">
		                    <div class="accordion-heading">
		                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
		                        Retina Ready Theme
		                        </a>
		                    </div>
		                    <div id="collapseTwo" class="accordion-body collapse">
		                        <div class="accordion-inner">
								<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
								</div><!-- /accordion-inner -->
		                    </div><!-- /collapse -->
		                </div><!-- /accordion-group -->
		                <br>
		
		                 <div class="accordion-group">
		                    <div class="accordion-heading">
		                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
		                        Awesome Support
		                        </a>
		                    </div>
		                    <div id="collapseThree" class="accordion-body collapse">
		                        <div class="accordion-inner">
								<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
								</div><!-- /accordion-inner -->
		                    </div><!-- /collapse -->
		                </div><!-- /accordion-group -->
		                <br>
		                
		                 <div class="accordion-group">
		                    <div class="accordion-heading">
		                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
		                        Responsive Design
		                        </a>
		                    </div>
		                    <div id="collapseFour" class="accordion-body collapse">
		                        <div class="accordion-inner">
								<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
								</div><!-- /accordion-inner -->
		                    </div><!-- /collapse -->
		                </div><!-- /accordion-group -->
		                <br>			
					</div><!-- Accordion -->
				</div>
			</div>
		</div><!--/ .container -->
	</div><!--/ #features -->
	
	
	<section id="showcase" name="showcase"></section>
	<div id="showcase">
		<div class="container">
			<div class="row">
				<h1 class="centered">Some Screenshots</h1>
				<br>
				<div class="col-lg-8 col-lg-offset-2">
					<div id="carousel-example-generic" class="carousel slide">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					  </ol>
					
					  <!-- Wrapper for slides -->
					  <div class="carousel-inner">
					    <div class="item active">
					      <img src="../themes/Pratt/assets/img/item-01.png" alt="">
					    </div>
					    <div class="item">
					      <img src="../themes/Pratt/assets/img/item-02.png" alt="">
					    </div>
					  </div>
					</div>
				</div>
			</div>
			<br>
			<br>
			<br>	
		</div><!-- /container -->
	</div>	


	<section id="contact" name="contact"></section>
	<div id="footerwrap">
		<div class="container">
			<div class="col-lg-5">
				<h3>Address</h3>
				<p>
				Av. Greenville 987,<br/>
				New York,<br/>
				90873<br/>
				United States
				</p>
			</div>
			
			<div class="col-lg-7">
				<h3>Drop Us A Line</h3>
				<br>
				<form role="form" action="#" method="post" enctype="plain"> 
				  <div class="form-group">
				    <label for="name1">Your Name</label>
				    <input type="name" name="Name" class="form-control" id="name1" placeholder="Your Name">
				  </div>
				  <div class="form-group">
				    <label for="email1">Email address</label>
				    <input type="email" name="Mail" class="form-control" id="email1" placeholder="Enter email">
				  </div>
				  <div class="form-group">
				  	<label>Your Text</label>
				  	<textarea class="form-control" name="Message" rows="3"></textarea>
				  </div>
				  <br>
				  <button type="submit" class="btn btn-large btn-success">SUBMIT</button>
				</form>
			</div>
		</div>
	</div>
	<div id="c">
		<div class="container">
			<p>Created by <a href="http://www.blacktie.co">BLACKTIE.CO</a></p>
		
		</div>
	</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../themes/Pratt/assets/js/bootstrap.js"></script>
	<script>
	$('.carousel').carousel({
	  interval: 3500
	})
	</script>
  </body>
</html>
