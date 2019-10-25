@extends('layouts.app')

@section('content')
            <div class="flex-1 max-w-sm w-full lg:max-w-full lg:flex shadow sm:shadow-md md:shadow-md lg:shadow-md xl:shadow-md rounded mb-5">
              <div class="rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">

                    <div class="flex">
                        <div class="w-1/5  h-12">
                            <div class="flex">
                              <div class="flex-none sm:flex-1 md:flex-1 lg:flex-1 xl:flex-1 text-center px-4">
                                @include('layouts.channel')
                              </div>

                                @if(Auth::id() == $d->user->id)
                                    @if(!$d->hasBestAnswer())
                                        <a href="{{route('discussions.edit', ['slug' => $d->slug])}}" class="flex rounded-full bg-blue-500 uppercase px-2 py-1 text-xs font-bold mr-3"><i class="far fa-edit fa-2x"></i>Edit</a>
                                    @endif                       
                                @endif
                            </div>
                        </div>

                      <div class="w-3/5  h-12"></div>
                      <div class="w-1/5  h-12">
                         <p class="text-sm text-white flex items-center mb-3">
                            @if($d->hasBestAnswer())
                            <span class="flex rounded-full bg-teal-500 uppercase px-2 py-1 text-xs font-bold mr-3">solved</span>
                        
                            @else
                            <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">unsolved</span>
                            @endif                   
                        </p>
                      </div>
                    </div>          
                    

                  <div class="text-gray-900 font-bold text-xl mb-2"><a class="text-blue-500 hover:text-blue-800">{{$d->title}}</a></div>
                  <p class="text-gray-500 text-base">{!!Markdown::convertToHtml($d->content)!!}</p>
                </div>
                <div class="flex items-center">
                  <img class="w-10 h-10 rounded-full mr-4" src="{{asset ('images/users/'.$d->user->avatar) }}" alt="Avatar">
                  <div class="text-sm">
                    <p class="text-gray-900 leading-none">{{$d->user->name}}</p>
                    <p class="text-gray-600">{{$d->created_at->diffForHumans()}} &nbsp;|&nbsp; {{$d->created_at->format(' H:i')}}</p>
                  </div>
                </div>
              </div>
            </div>
            <hr>

            {{-- BEST ANSWER --}}

            @if($best_answer)
                @if(Auth::id() == $d->user->id)
               <div class="card shadow-lg p-3 mb-5 bg-white border-0 rounded" >

                <div class="card-header bg-white text-dark font-weight-bold">
                    <h4>Best Answer</h4>
                    <img src="{{asset ('images/users/'.$d->user->avatar) }}" class="rounded-circle mr-3" alt="" width="50px" height="50px">
                      
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
