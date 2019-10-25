{{-- @extends('layouts.app')

@section('content')

    @if(count($discussions) > 0)
    @foreach($discussions as $d)
    <div class="card shadow-lg p-3 mb-5 bg-white border-0 rounded">

        <div class="card-header bg-white text-dark font-weight-bold">
            <div class="row">
                <div class="col-md-9">
                    <h5>
                    @if($d->user->avatar)
                    <img src="{{ $d->user->avatar }}" class="rounded-circle mr-3" alt="" width="50px" height="50px">
                    @else
                    <img src="img/user.png" class="rounded-circle mr-3" alt="" width="50px" height="50px">
                    @endif
                    {{$d->user->name}} <span class="badge badge-light rounded-circle mr-3">{{$d->user->points}}</span>
                    <small><i class="fas fa-clock fa-1.7x"></i> {{$d->created_at->diffForHumans()}} &nbsp;|&nbsp; {{$d->created_at->format(' H:i A')}}</small>
                </h5> 
                </div>
                <div class="col-md-3">                     
                    @if($d->hasBestAnswer())

                        <span class="btn btn-success btn-sm disabled float-right">CLOSED</span>

                    @else

                        <span class="btn btn-danger btn-sm disabled float-right">OPENED</span>

                    @endif
                </div>
            </div>

        </div>

        <div class="card-body text-muted">
            <a href="{{route('discussion', ['slug' => $d->slug ])}}" style="text-decoration:none"><h4>{{$d->title}} </h4></a>
            <p class="lead"><strong>{!!str_limit(Markdown::convertToHtml($d->content), 170)!!}</strong></p>
        </div>
        <div class="card-footer border-0 bg-transparent">
            <a href="{{url('channel', ['slug' => $d->channel->slug])}}" class="btn btn-outline-success btn-sm mr-3"><i class="fas fa-heart"></i> {{$d->channel->title}}</a>
            Comments <span class="badge badge-success rounded-circle">{{$d->replies->count()}}</span>

        </div>
    </div>
    @endforeach

    <br>
    @else
    <div class="alert alert-danger" role="alert">
      <h1 class="display-4">No discussions found!!!</h1>
    </div>
        
    @endif

@endsection --}}


 @extends('layouts.app')

@section('content')
    @if(count($discussions) > 0)
      @foreach($discussions as $d)

      <div class="max-w-sm w-full max-w-full md:flex shadow-md rounded mb-5 text-xs">
        <div class="rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
          <div class="mb-8">
              <div class="flex-1 flex justify-between mb-4">
                <div>
                  <span class="text-gray-900">@include('layouts.channel')</span>
                  <span class="text-sm ml-3"><i class="fas fa-comment text-green-400"></i></span>
                  <span class="text-xs hover:text-gray-600 ml-1">{{$d->replies->count()}}</span>
                </div>
                <div class="md:flex md:text-left text-center">
                  @if($d->hasBestAnswer())
                    <span class="rounded-full bg-teal-600 uppercase px-2 py-1 text-white text-xs font-bold">solved</span> 
                    @else
                    <span class="rounded-full bg-red-600 uppercase px-2 py-1 text-white text-xs font-bold">unsolved</span>
                  @endif  
                </div>
              </div>

            <div class="text-gray-900 font-bold text-sm mb-2"><a class="text-blue-500 hover:text-blue-800" href="{{route('discussion', ['slug' => $d->slug ])}}">{{$d->title}}</a></div>
            <p class="text-gray-500 text-base">{!!str_limit(Markdown::convertToHtml($d->content), 220)!!}</p>
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
      @endforeach

      <br>
      <div class="flex justify-center mb-8">
         
          {{$discussions->links()}}
      </div>
    @else
      <div class="bg-red-100 border text-center border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Oops!</strong>
        <span class="block sm:inline">No Discussions Found.</span>
      </div>
    @endif
@endsection
