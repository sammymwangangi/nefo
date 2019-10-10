@extends('layouts.app')

@section('content')
            <div class="card">
                
                <div class="card-header">Edit Reply </div>
                <p class="card-text"><a href="{{url('/discussion/'.$reply->discussion->slug)}}" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i> Go Back</a>
                </p>
                <div class="card-body">

                    <form action="{{route('reply.update', ['id' => $reply->id])}}" method="post">

                        @csrf

                    

                        <div class="form-group">
                            <label for="content">Answer a question</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$reply->content}}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success pull-right" type="submit">Save reply changes</button>
                        </div>
                        
                    </form>
                </div>
            </div>

@endsection