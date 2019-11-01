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

        <form method="post" action="{{ url('/profile/passwordChange/'.Auth::user()->id )}}" class="w-full max-w-lg">

            @csrf

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-5">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                    New Password
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" type="password" name="password" placeholder="Enter New password">
                </div>
                @if($errors->has('password'))
                   <span class="text-red-800">{{ $errors->first('password') }}</span>
                @endif
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password_confirmation">
                    Confirm Password 
                  </label>
                  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password_confirmation" type="password" name="password_confirmation" placeholder="Re-Enter Password">
                </div>
                @if($errors->has('password_confirmation'))
                   <span class="text-red-800">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <div class="flex mt-6">
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" type="submit">
                  Change Password
                </button>
            </div>
        </form>
    </div>
</div>
@stop