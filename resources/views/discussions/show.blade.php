@extends('layouts.app')

@section('content')
            <div class="card shadow-lg p-3 mb-5 bg-white border-0 rounded" >

                <div class="card-header bg-white text-dark font-weight-bold">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="text-dark">
                            @if($d->user->avatar)
                            <img src="{{asset ('images/users/'.$d->user->avatar) }}" class="rounded-circle mr-3" alt="" width="50px" height="50px">
                            @else
                            <img src="{{asset ('img/user.png')}}" class="rounded-circle mr-3" alt="" width="50px" height="50px">
                            @endif
                            {{$d->user->name}} <span class="badge badge-light rounded-circle mr-3">{{$d->user->points}}</span>
                            <small><i class="fas fa-clock fa-1.7x"></i> {{$d->created_at->diffForHumans()}} &nbsp;|&nbsp; {{$d->created_at->format(' H:i A')}}</small>
                        </h5> 
                        </div>
                        <div class="col-md-3">
                            @if(Auth::id() == $d->user->id)
                                @if(!$d->hasBestAnswer())
                                    <a href="{{route('discussions.edit', ['slug' => $d->slug])}}" class="btn btn-info btn-sm"><i class="far fa-edit fa-2x"></i>Edit</a>
                                @endif                       
                            @endif  
                            
                            @if($d->hasBestAnswer())
        
                                <span class="badge badge-success rounded-circle float-right"><i class="far fa-check-circle fa-2x"></i></span>
        
                            @else
        
                                <span class="badge badge-danger rounded-circle float-right"><i class="fas fa-question-circle fa-2x"></i></span>
        
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h3> {{$d->title}}</h3>
                    <hr>

                    <p class="lead"><strong>{!!Markdown::convertToHtml($d->content)!!}</strong></p>

                </div>
                <div class="card-footer bg-transparent border-0">
                    <a href="{{url('channel', ['slug' => $d->channel->slug])}}" class="btn btn-outline-success btn-sm mr-3"><i class="fas fa-heart"></i> {{$d->channel->title}}</a>
                </div>
            </div>
            <hr>

            {{-- BEST ANSWER --}}

            @if($best_answer)
                @if(Auth::id() == $d->user->id)
               <div class="card shadow-lg p-3 mb-5 bg-white border-0 rounded" >

                <div class="card-header bg-white text-dark font-weight-bold">
                    <h4>Best Answer</h4>
                    @if($d->user->avatar)
                    <img src="{{asset ('images/users/'.$d->user->avatar) }}" class="rounded-circle mr-3" alt="" width="50px" height="50px">
                    @else
                    <img src="{{asset ('img/user.png')}}" class="rounded-circle mr-3" alt="" width="50px" height="50px">
                    @endif
                      
                  </i>{{$best_answer->user->name}} <span class="badge badge-light rounded-circle mr-3">{{$best_answer->user->points}}</span>
                      
                   <span class="float-right">(as selected by {{$d->user->name}})</span>

                </div>

                <div class="card-body">

                    <p class="lead"> {!!Markdown::convertToHtml($best_answer->content)!!}</p>
                </div>
                
            </div> 
                @endif
            @endif

            {{-- REPLIES --}}

            <div class="container"><h2> <small>Replies</small></h2></div>
            @foreach($d->replies as $r)
            
            <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                <ul class="list-unstyled">
			  	<li class="media my-4">
                    <img src="{{asset ('images/users/'.$r->user->avatar) }}" class="rounded-circle ml-3 mr-3" alt="" style="width: 2rem; height: 2rem">
				    <div class="media-body">
				      {{$r->user->name}} <span class="badge badge-light rounded-circle mr-3">{{$r->user->points}}</span>
				      {!!Markdown::convertToHtml($r->content)!!}
				      <p class="card-text">
				      	<small class="text-muted"> {{date('d-M-y', strtotime($r->created_at)) }}
				      	</small>
				      </p>
				      <p>
				          @if($r->is_liked_by_auth_user())
                            <a href="{{ route('reply.unlike', ['id' => $r->id ]) }}" class="btn btn-danger btn-sm">Unlike</a>
                            @else
                                <a href="{{ route('reply.like', ['id' => $r->id ]) }}" class="btn btn-success btn-sm">Like<span class="badge">{{$r->likes->count()}}</span></a>
                            @endif
        
                            @if(!$best_answer)
                                @if(Auth::id() == $d->user->id)
                                    <span class="float-right mr-3"><a href="{{ route('discussion.best.answer', ['id' => $r->id])}}" class="btn btn-success btn-sm">Mark as best answer</a></span>
                                @endif
                            @endif
        
                            @if(Auth::id() == $r->user->id)
                                @if(!$r->best_answer)
                                    <span class="float-right mr-3"><a href="{{ url('/reply/edit/'.$r->id)}}" class="btn btn-success btn-sm"><i class="far fa-edit"></i>Edit</a></span>
                                @endif
                            @endif
				      </p>
				    </div>
			  	</li>
			</ul>
            </div>
            @endforeach


            <div class="card shadow-lg p-3 mb-5 bg-white border-0 rounded" >

                <div class="card-body">

                   <form action="{{ route('discussion.reply', ['id' => $d->id]) }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="reply">Leave a reply...</label>
                            <p class="lead emoji-picker-container">
                            <textarea name="reply" id="reply" class="form-control textarea-control" rows="3" class="form-control" data-emojiable="true" data-emoji-input="unicode">
                            </textarea>
                            </p>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Leave a reply</button>
                        </div>

                    </form>
                </div>

            </div>

@endsection
