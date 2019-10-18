@extends('layouts.app')

@section('content')

    @if(count($discussions) > 0)
    @foreach($discussions as $d)

    <div class="max-w-sm w-full lg:max-w-full lg:flex shadow sm:shadow-md md:shadow-md lg:shadow-md xl:shadow-md rounded mb-5">
      {{-- <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
      </div> --}}
      <div class="rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
            
            <p class="text-sm text-white flex items-center mb-3">
                @if($d->hasBestAnswer())
                <span class="flex rounded-full bg-teal-500 uppercase px-2 py-1 text-xs font-bold mr-3">unsolved</span>
            
                @else
                <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">unsolved</span>
                @endif

                @include('layouts.channel')
                <i class="fas fa-comments text-green-400 pl-4 pr-2"></i>{{$d->replies->count()}}
            </p>

          <div class="text-gray-900 font-bold text-xl mb-2"><a class="text-blue-500 hover:text-blue-800" href="{{route('discussion', ['slug' => $d->slug ])}}">{{$d->title}}</a></div>
          <p class="text-gray-500 text-base">{!!str_limit(Markdown::convertToHtml($d->content), 170)!!}</p>
        </div>
        <div class="flex items-center">
          <img class="w-10 h-10 rounded-full mr-4" src="img/user.png" alt="Avatar">
          <div class="text-sm">
            <p class="text-gray-900 leading-none">{{$d->user->name}}</p>
            <p class="text-gray-600">{{$d->created_at->diffForHumans()}} &nbsp;|&nbsp; {{$d->created_at->format(' H:i')}}</p>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    <br>
    <div class="row justify-content-center">
       
        {{$discussions->links()}}

    </div>
    @else
    <div class="alert alert-danger" role="alert">
      <h1 class="display-4">No discussions found!!!</h1>
    </div>
    @endif
@endsection
