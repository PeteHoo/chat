@include('header')
<body id="page-top" class="index-page">
<div class="wrap-body">

	<!--////////////////////////////////////Header-->
	<!-- /Section: intro -->
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content">
		
		<div class="box-content">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<!-----------------Content-------------------->
			@foreach($news_list as $new)
						<article>
							<div class="wrap-post"><!--Start Box-->
								<div class="entry-header">
									<h2 class="entry-title"><a href="single?a={{isset($_GET['a'])?$_GET['a']:0}}">{{$new->title}}</a></h2>
									<span class="entry-meta">
										<ul class="list-inline link">
											<li>By <a href="#">{{$new->author}}</a></li>
											<li><a href="#">{{$new->created_at}}</a></li>
											<li><a href="#">0 comments</a></li>
											<li>{{$new->sub_title}}</li>
										</ul>
									</span>
								</div>
								<div class="post-thumbnail-wrap">
									<div class="portfolio-box zoom-effect">
										<img src="{{$new->Pic}}" class="img-responsive" alt="">
									</div>
								</div>
								<div class="entry-content">
									<p>{{$new->content}}</p>
									<a class="btn btn-skin" href="single?a={{isset($_GET['a'])?$_GET['a']:0}}&id={{$new->id}}">Read More</a>
								</div>
							</div>
						</article>
						@endforeach
						{{--<article>--}}
							{{--<div class="wrap-post"><!--Start Box-->--}}
								{{--<div class="entry-header">--}}
									{{--<h2 class="entry-title"><a href="single.html">RETRO GALLERY: FRAGMENTING PERSISTENT FLIGHT AND PATHOLOGY</a></h2>--}}
									{{--<span class="entry-meta">--}}
										{{--<ul class="list-inline link">--}}
											{{--<li>By <a href="#">BUSINESS</a></li>--}}
											{{--<li><a href="#">August, 22 2016</a></li>--}}
											{{--<li><a href="#">0 comments</a></li>--}}
										{{--</ul>--}}
									{{--</span>--}}
								{{--</div>--}}
								{{--<div class="post-thumbnail-wrap">--}}
									{{--<div class="portfolio-box zoom-effect">--}}
										{{--<img src="images/9.jpg" class="img-responsive" alt="">--}}
									{{--</div>--}}
								{{--</div>--}}
								{{--<div class="entry-content">--}}
									{{--<p>Figgis is a member of this unique, new wave of young underground artists bringing painting back to circulation this year. Quite honestly, we’re almost sure that this group’s art is the antidote to process-led abstraction that took serious hold in 2014. At 42 years old, Figgis is not a complete newbie though, but with her…</p>--}}
									{{--<a class="btn btn-skin" href="single.html">Read More</a>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</article>--}}
						{{--<article>--}}
							{{--<div class="wrap-post"><!--Start Box-->--}}
								{{--<div class="entry-header">--}}
									{{--<h2 class="entry-title"><a href="single.html">RETRO GALLERY: FRAGMENTING PERSISTENT FLIGHT AND PATHOLOGY</a></h2>--}}
									{{--<span class="entry-meta">--}}
										{{--<ul class="list-inline link">--}}
											{{--<li>By <a href="#">BUSINESS</a></li>--}}
											{{--<li><a href="#">August, 22 2016</a></li>--}}
											{{--<li><a href="#">0 comments</a></li>--}}
										{{--</ul>--}}
									{{--</span>--}}
								{{--</div>--}}
								{{--<div class="post-thumbnail-wrap">--}}
									{{--<div class="portfolio-box zoom-effect">--}}
										{{--<img src="images/10.jpg" class="img-responsive" alt="">--}}
									{{--</div>--}}
								{{--</div>--}}
								{{--<div class="entry-content">--}}
									{{--<p>Figgis is a member of this unique, new wave of young underground artists bringing painting back to circulation this year. Quite honestly, we’re almost sure that this group’s art is the antidote to process-led abstraction that took serious hold in 2014. At 42 years old, Figgis is not a complete newbie though, but with her…</p>--}}
									{{--<a class="btn btn-skin" href="single.html">Read More</a>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</article>--}}
					</div>
				</div>
			</div>
		</div>
		
	</div>
		
	<!--////////////////////////////////////Footer-->
@include('footer')
	<!-- Footer -->
	<div id="page-top"><a href="#page-top" class="btn btn-toTop"><i class="fa fa-angle-double-up"></i></a></div>
	
	<!-- JS -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/jquery.localScroll.min.js"></script>
	<script src="js/jquery.scrollTo.min.js"></script>
	<script src="js/SmoothScroll.js"></script>
	<script src="js/wow.min.js"></script>
	
	<!-- Definity JS -->
	<script src="js/main.js"></script>

</div>
</body>
</html>