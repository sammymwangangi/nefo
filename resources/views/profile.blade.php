@extends('layouts.app')

@section('content')

    <div class="md:flex overflow-hidden bg-green-200 shadow mb-10">
      <div class="md:flex-shrink-0 mt-4 ml-2">
        <img class="rounded-full border-solid border-white border-2 h-20" src="{{asset ('images/users/'.$user->avatar) }}" alt="avatar">
      </div>
      <div class="md:mt-4 md:ml-6">
        <div class="uppercase tracking-wide text-sm text-green-600 font-bold mb-4">{{$user->name}}</div>
        <div class="flex pb-3 text-xs text-grey-dark">
          <div class="text-center mr-3 border-r border-green-400 pr-3">
            <h2>Joined</h2>
            <span>{{$user->created_at->diffForHumans()}}</span>
          </div>
          <div class="text-center">
            <h2>{{$user->discussions->count()}}</h2>
            <span>Discussions</span>
          </div>
        </div>
        <p class="mt-2 text-gray-600 text-sm overflow-y-auto mb-4">{{$user->about}}</p>
      </div>
    </div>

    <div class="mb-8 font-bold">{{$user->name}}'s Discussions</div>
    
    @if(count($discussions) > 0)
      @foreach($discussions as $d)

      <div class="max-w-sm max-w-full md:flex shadow-md rounded mb-5 text-xs">
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
