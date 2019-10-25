@extends('layouts.app')

@section('content')
            <div class="card shadow-lg p-3 mb-5 bg-white border-0 rounded">
                <div class="card-header bg-white text-dark font-weight-bold ">Create a new Discussion</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('discussions.store')}}" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{old('title')}}" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="channel"> Pick a channel</label>
                            <select name="channel_id" id="channel_id" class="form-control">

                               @foreach ($channels as $channel)
                                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                               @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="content">Ask a question</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{old('content')}}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success pull-right" type="submit">Create discussion</button>
                        </div>
                        
                    </form>
                </div>
            </div>

@endsection