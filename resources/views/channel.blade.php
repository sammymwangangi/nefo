@extends('layouts.app')

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

@endsection
