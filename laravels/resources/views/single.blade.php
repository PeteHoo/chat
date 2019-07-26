@include('header')
<body id="page-top" class="index-page">
<div class="wrap-body">

	<!--////////////////////////////////////Header-->
	<!-- /Section: intro -->
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content">
		<div class="box-content">
			<div class="container">
				<!-----------------Content-------------------->
				<article class="single-post">
					<div class="wrap-post"><!--Start Box-->
						<div class="entry-header text-center">
							<input type="hidden" value="{{$news_detail->id}}" id="news_id"/>
							<h1 class="entry-title">{{$news_detail->title}}</h1>
							<span class="entry-meta">
								<ul class="list-inline link">
									<li>By <a href="#">{{$news_detail->author}}</a></li>
									<li><a href="#">{{$news_detail->created_at}}</a></li>
									{{--<li><a href="#">0 comments</a></li>--}}
								</ul>
							</span>
						</div>
						<div class="post-thumbnail-wrap">
							<div class="portfolio-box zoom-effect">
								<img src="{{$news_detail->Pic}}" class="img-responsive" alt="">
							</div>
						</div>
						<div>
							<p>{{$news_detail->content}}</p>
						</div>
						<div class="comments">
							@if(isset($news_comment))
							@foreach($news_comment as $comment)
								<div>
									<div><p>{{$comment->from_name}}回复{{isset($comment->to_name)?$comment->to_name:'原文'}}:{{$comment->content}}</p></div>
									<div><a class="reply">回复</a><input type="hidden" value="{{$comment->from_user_id}}"><input type="hidden" value="{{$comment->id}}"><input type="hidden" value="{{$comment->level}}"><div class="submit_div"></div></div>

									@include('layouts/comment',['comment_child'=>$comment->child])
								</div>
								@endforeach
								@endif
						</div>


					</div>
				</article>
			</div>	
			
		</div>
	<input type="hidden" id="user_id" value="{{isset($user->id)?$user->id:''}}"/>
	</div>
		
	<!--////////////////////////////////////Footer-->
@include('footer')
	<!-- Footer -->
	<div id="page-top"><a href="#page-top" class="btn btn-toTop"><i class="fa fa-angle-double-up"></i></a></div>
	
	<!-- JS -->
	<!-- ========== Scripts ========== -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/jquery.localScroll.min.js"></script>
	<script src="js/jquery.scrollTo.min.js"></script>
	<script src="js/SmoothScroll.js"></script>
	<script src="js/wow.min.js"></script>
	
	<!-- Definity JS -->
	<script src="js/main.js"></script>
	<script>
		$('.reply').on('click',function (e) {
		    $('#submit_div').remove();
		    console.log(e.target.parentElement.childNodes[1].value);
            console.log(e.target.parentElement.childNodes[2].value);
            console.log(e.target.parentElement);
			e.target.parentElement.childNodes[4].insertAdjacentHTML('afterEnd','\t\t<div id="submit_div">\n' +
                '\t\t\t\t\t\t\t<span>{{isset($user->name)?$user->name:''}}:</span>\n' +
				'\t\t\t\t\t\t\t<input type="hidden" id="from_user_id" value="'+e.target.parentElement.childNodes[1].value+'">\n'+
                '\t\t\t\t\t\t\t<input type="hidden" id="parent_id" value="'+e.target.parentElement.childNodes[2].value+'">\n'+
                '\t\t\t\t\t\t\t<input type="hidden" id="level" value="'+e.target.parentElement.childNodes[3].value+'">\n'+
                '\t\t\t\t\t\t\t<input id="comment_content" type="text" />\n' +
                '\t\t\t\t\t\t\t<a class="btn btn-skin btn-block comment_submit">回复</a>\n' +
                '\t\t\t\t\t\t</div>');
            $('.comment_submit').on('click',function (e) {
                console.log(1111);
                console.log($('#news_id').val());
                $.ajax({
                    url:'comment/create',
                    data:{news_id:$('#news_id').val(),parent_id:$('#parent_id').val(),from_user_id:$('#user_id').val(),to_user_id:$('#from_user_id').val(),level:parseInt($('#level').val())+1,content:$('#comment_content').val()},
                    method:'GET',
                    success:function (data) {
                        if(data.status==200){
                            location.reload();
                        }else{
                            alert(data.msg);
                        }
                    }
                })
            })
        });


	</script>
</div>	
</body>
</html>