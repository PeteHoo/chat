
            @if(isset($comment_child))
                @foreach($comment_child as $comment)
                    <div><p>{{$comment->from_name}}回复{{$comment->to_name}}:{{$comment->content}}</p></div>
                    <div><a class="reply">回复</a><input type="hidden" value="{{$comment->from_user_id}}"><input type="hidden" value="{{$comment->id}}"><input type="hidden" value="{{$comment->level}}"><div class="submit_div"></div></div>

                    @include('layouts/comment',['comment_child'=>$comment->child])
                @endforeach
            @endif

