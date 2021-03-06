@extends('layouts.app')

@section('content')
<div class="max-w-sm rounded overflow-hidden shadow-lg w-full md:flex text-xs m-auto">
    <div class="rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
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

        <form action="{{route('discussions.store')}}" method="post" class="w-full max-w-lg">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Title
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-state" type="text" name="title" value="{{old('title')}}" required placeholder="Enter title here...">
                </div>
                <div class="w-full md:w-1/2 px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="channel_id">
                    Choose Channel
                  </label>
                  <select class="form-select block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="channel_id" id="channel_id">
                    @foreach ($channels as $channel)
                      <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                    @endforeach
                    </select>
                </div>

            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Ask a question
                  </label>
                  <textarea class="form-textarea appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="content" required rows="10" id="grid-password" type="password" placeholder="Enter some long content.">{{old('content')}}</textarea>
                  <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                </div>
            </div>
            <div class="flex mt-6">
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" type="submit">
                  Create discussion
                </button>
            </div>
        </form>
    </div>
</div>

@endsection