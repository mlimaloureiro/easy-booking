<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>EasyBooking</title>

	    <meta name="description" content="desc.">
	    <meta name="author" content="mloureiro.com">
	   	
	   	{{HTML::style('packages/mlimaloureiro/easy-booking/css/foundation.css');}}
	   	{{HTML::script('packages/mlimaloureiro/easy-booking/css/easybooking.css');}}

	   	{{HTML::script('packages/mlimaloureiro/easy-booking/js/modernizr.js');}}

	  	<meta class="foundation-mq-small">
	  	<meta class="foundation-mq-medium">
		<meta class="foundation-mq-large">
		<meta class="foundation-mq-xlarge">
		<meta class="foundation-mq-xxlarge">
		<meta class="foundation-mq-topbar">
	</head>
	
	<body style="height:100%">
		<nav class="top-bar hide-for-small" data-topbar="" style="margin-bottom: 20px;">
			
			<div class="row" style="max-width:62em;">
				<ul class="title-area">
				    <li class="name">
				      <h1><a href="index.html">EasyBooking</a></h1>
				    </li>
				</ul>
				<section class="top-bar-section">
				    <ul class="right">			    	
				      	
				    	<li class="divider"></li>
				      	
				      	<li>
				       		<a href="business/services.html" class="">Home</a>
				      	</li>

				      	<li class="divider"></li>
				      	
				      	<li>
				        	<a href="/docs" class="">Calendar</a>
				      	</li>

				      	<li class="divider"></li>
				      	
				      	<li>
				       		<a href="business/services.html" class="">Rooms</a>
				      	</li>
				      	
				      	<li class="divider"></li>
					</ul>
				</section>
			</div>
		</nav>

		<div class="row">
			<div class="large-8 columns">
				<div class="row">
					<div class="panel" style="background:#fff">
					  <h2>Start by setting up ...</h2>
					  <p>It has an easy to override visual style, and is appropriately subdued.</p>
					</div>
				</div>
				
				<div class="row">
					<dl class="sub-nav">
					  <dd class="active"><a href="#">Today Schedule</a></dd>
					  <dd><a href="#">Reservations</a></dd>
					</dl>

					<div style="padding:10px;border-bottom:1px solid #adadad;" class="clearfix">
						<h3> Quarto camarido xpto 10</h3>
						<h6> <span class="label success">Check in</span> <small> requested by <a href="#"> cliente xpto </a>, from 10:00am to 13:00am </small> </h6>
					</div>

					<div style="padding:10px;border-bottom:1px solid #adadad;" class="clearfix">
						<h3> Apartament 2 twin duplo</h3>
						<h6> <span class="label regular">Check out</span> <small> requested by <a href="#"> cliente xpto </a>, from 10:00am to 13:00am </small> </h6>
					</div>

					<div style="padding:10px;border-bottom:1px solid #adadad;" class="clearfix">

						<h3> Quarto camarido xpto 10</h3>
						<h6> <span class="label success">Check in</span> <small> requested by <a href="#"> cliente xpto </a>, from 10:00am to 13:00am </small> </h6>
					</div>

				</div>
				
			</div>

			<div class="large-4 columns">
				<h2> Notice </h2>
				<p>This is just a small booking management interface example.</p> Extend at your own will.
			</div>
		</div>
	</body>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/js/foundation.min.js"/>

</html>
