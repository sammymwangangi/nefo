@extends('layouts.app')

@section('content')
      <div class="max-w-sm w-full max-w-full md:flexrounded mb-5">
        <div class="rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
          <div class="mb-8">
              <div class="flex-1 flex justify-between mb-4">
                <div>
                  <span class="text-gray-900">@include('layouts.channel')</span>
                  @if(Auth::id() == $d->user->id)
                      @if(!$d->hasBestAnswer())
                      <span class="ml-3">
                          <a href="{{route('discussions.edit', ['slug' => $d->slug])}}">
                            <button class="bg-transparent hover:bg-teal-500 text-gray-800 font-semibold text-xs hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-blue-400 hover:border-transparent rounded-full">
                              <span><i class="far fa-edit"></i></span>
                              <span class="ml-2 text-xs">Edit</span>
                            </button>
                          </a>
                      </span>
                      @endif                       
                  @endif
                  {{-- <span class="text-sm ml-3"><i class="fas fa-comment text-green-400"></i></span>
                  <span class="text-xs hover:text-gray-600 ml-1">{{$d->replies->count()}}</span> --}}
                </div>
                <div class="md:flex md:text-left text-center">
                  @if($d->hasBestAnswer())
                    <button class="bg-transparent hover:bg-teal-500 text-gray-800 font-semibold text-xs hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-teal-400 hover:border-transparent rounded-full">
                      <span class="ml-2 text-xs uppercase">solved</span>
                    </button> 
                    @else
                    <button class="bg-transparent hover:bg-red-500 text-gray-800 font-semibold text-xs hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-red-400 hover:border-transparent rounded-full">
                      <span class="ml-2 text-xs uppercase">unsolved</span>
                    </button>
                  @endif  
                </div>
              </div>

            <div class="text-gray-800 font-bold text-md mb-2">
              {{$d->title}}
            </div>

            <div class="text-gray-900 font-serif text-sm mb-2">
              {!!Markdown::convertToHtml($d->content)!!}
            </div>
            
          </div>

          <div class="flex items-center">
            <img class="w-10 h-10 rounded-full mr-4" src="{{asset ('images/users/'.$d->user->avatar) }}" alt="Avatar">
            <div class="text-sm">
              {{-- <p class="text-gray-900 leading-none">{{$d->user->name}}</p> --}}
              <a class="text-gray-900 leading-none" href="{{ url('/',['name' => $d->user->name ?? '']) }}" target="_blank">{{$d->user->name}}</a>
              <p class="text-gray-600">{{$d->created_at->diffForHumans()}} &nbsp;|&nbsp; {{$d->created_at->format(' H:i')}}</p>
            </div>
          </div>

        </div>
      </div>

      {{-- BEST ANSWER --}}
      @if($best_answer)
      @if(Auth::id() == $d->user->id)
      <div class="max-w-sm w-full max-w-full md:flex shadow-md rounded mb-5 bg-teal-100">
        <div class="rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
          <div class="mb-8">
              <div class="flex-1 flex justify-between mb-4">
                <div>
                  <span class="text-yellow-800 text-lg">BEST ANSWER</span>
                  @if(Auth::id() == $d->user->id)
                      @if(!$d->hasBestAnswer())
                      <span>
                          <a href="{{route('discussions.edit', ['slug' => $d->slug])}}" class="flex rounded-full bg-blue-500 uppercase px-2 py-1 text-xs font-bold mr-3"><i class="far fa-edit fa-2x"></i>Edit</a>
                      </span>
                      @endif                       
                  @endif
                </div>
                <div class="md:flex md:text-left text-center">
                  <span>
                    <button class="bg-transparent hover:bg-green-500 text-gray-800 font-semibold text-xs hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full ml-4">
                      <span>as selected by</span>
                      <span class="ml-2 text-xs uppercase"> {{$d->user->name}}</span>
                    </button>
                  </span>
                </div>
              </div>

            <div class="text-gray-800 font-bold text-md mb-2">
              {{$d->title}}
            </div>

            <div class="text-gray-900 font-serif text-sm mb-2">
              {!!str_limit(Markdown::convertToHtml($best_answer->content), 220)!!}</p>
            </div>
            
          </div>

          <div class="flex items-center">
            <img class="w-10 h-10 rounded-full mr-4" src="{{asset ('images/users/'.$best_answer->user->avatar) }}" alt="Avatar">
            <div class="text-sm">
              {{-- <p class="text-gray-900 leading-none">{{$d->user->name}}</p> --}}
              <a class="text-gray-900 leading-none" href="{{ url('/',['name' => $best_answer->user->name ?? '']) }}" target="_blank">{{$best_answer->user->name}}</a>
              <p class="text-gray-600">{{$best_answer->user->points}}</p>
            </div>
          </div>

        </div>
      </div>
      @endif
      @endif

      <hr class="mt-4 mb-4">
        <h5>REPLIES</h5>
      <hr class="mt-4 mb-4">
      
      {{-- REPLIES --}}
      @foreach($d->replies as $r)
      <div class="sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-4xl md:flex shadow-md rounded mb-5 sm:ml-4 xl:ml-16 bg-gray-100">
        <div class="rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
          <div class="mb-8">
            <div class="flex-1 flex justify-between mb-4">
              <div>
                @if(!$best_answer)
                  @if(Auth::id() == $d->user->id)
                      <a href="{{ route('discussion.best.answer', ['id' => $r->id])}}">
                        <button class="bg-transparent hover:bg-teal-500 text-gray-800 font-semibold text-xs hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-blue-400 hover:border-transparent rounded-full">
                          <span><i class="far fa-star"></i></span>
                          <span class="ml-2 text-xs">Mark as best answer</span>
                        </button>
                      </a>
                  @endif
                @endif
              </div>
              <div class="md:flex md:text-left text-center">
                @if(Auth::id() == $r->user->id)
                  @if(!$r->best_answer)
                      <a href="{{ route('reply.edit', ['id' => $r->id])}}">
                        <button class="bg-transparent hover:bg-teal-500 text-gray-800 font-semibold text-xs hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-blue-400 hover:border-transparent rounded-full">
                          <span><i class="far fa-edit"></i></span>
                          <span class="ml-2 text-xs">Edit</span>
                        </button>
                      </a>
                  @endif
                @endif 
              </div>
            </div>
            <div class="text-gray-900 font-serif text-sm mb-8" id="rcontent">
              {!!Markdown::convertToHtml($r->content)!!}
            </div>
          </div>

          <div class="flex flex-1 items-center">
            <img class="w-10 h-10 rounded-full mr-4" src="{{asset ('images/users/'.$r->user->avatar) }}" alt="Avatar">
            <div class="text-sm">
              {{-- <p class="text-gray-900 leading-none">{{$d->user->name}}</p> --}}
              <a class="text-gray-900 leading-none" href="{{ url('/',['name' => $r->user->name ?? '']) }}" target="_blank">{{$r->user->name}}</a>
              <p class="text-gray-600">{{$r->created_at->diffForHumans()}} &nbsp;|&nbsp; {{$d->created_at->format(' H:i')}}</p>
            </div>

            <div class="md:flex md:text-left sm:ml-2 md:ml-4 lg:ml-8 xl:ml-12 text-center">
              {{-- @if($r->is_liked_by_auth_user()) --}}
              <span>
                  <a href="{{ route('reply.like', ['id' => $r->id ]) }}" class="text-green-400">
                    <i class="far fa-thumbs-up"></i>
                    <span class="fill-current h-6 w-6 text-teal-500">{{$r->likes->count()}}</span>
                  </a>
              </span>
              {{-- @else --}}
              <span class="ml-6">
              <a href="{{ route('reply.unlike', ['id' => $r->id]) }}" id="rcontent" class="text-red-400">
                <i class="far fa-thumbs-down"></i>
              </a>
              </span>
              {{-- @endif --}}
            </div>
          </div>

        </div>
      </div>  
      @endforeach

      <div class="sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-4xl md:flex shadow-md rounded mb-5 rounded md:flex text-xs">
          <div class="rounded-b lg:rounded-b-none lg:rounded-r p-4">
              @if (session('status'))
                  <div class="bg-red-100 border-t-4 mb-5 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                      <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                      <div>
                        <p class="font-bold">The following error(s) has occurred!!!</p>
                        <p class="text-sm">{{ session('status') }}</p>
                      </div>
                    </div>
                  </div>
              @endif
              <form method="post" action="{{ route('discussion.reply', ['id' => $d->id]) }}">
                  @csrf
                  <div class="smb-6">
                      <div class="w-full px-3 mb-5">
                        <label class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-4" for="reply">
                          Leave a Reply
                        </label>
                        <textarea class="form-textarea appearance-none w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="reply" required rows="3" id="reply" type="text"></textarea>
                        <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                      </div>
                      @if($errors->has('reply'))
                        <span class="text-red-800">{{ $errors->first('reply') }}</span>
                      @endif
                  </div>
                  <div class="flex mt-6">
                      <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" type="submit">
                        Submit
                      </button>
                  </div>
              </form>
          </div>
      </div>

@endsection
