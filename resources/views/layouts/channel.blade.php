@if ($d->channel->title == 'Laravel')

<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
  <button class="bg-transparent hover:bg-teal-500 text-gray-800 font-semibold text-xs hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
    <span><i class="fab fa-laravel text-red-400"></i></span>
    <span class="ml-2">{{$d->channel->title}}</span>
  </button>
</a>
@endif

@if ($d->channel->title == 'Angular')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-transparent hover:bg-green-400 text-gray-800 font-semibold hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
		    <i class="fab fa-angular text-red-600"></i> 
		    
		  <span class="ml-2 text-xs">{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'PHP')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-transparent hover:bg-green-400 text-gray-800 font-semibold hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
		    <i class="fab fa-php text-indigo-600"></i>
		  <span class="ml-2 text-xs">{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'JAVA')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-transparent hover:bg-green-400 text-gray-800 font-semibold hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
		    <i class="fab fa-java text-blue-500"></i> 
		  <span class="ml-2 text-xs">{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'Ruby')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-transparent hover:bg-green-400 text-gray-800 font-semibold hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
		    <i class="fas fa-gem text-red-600"></i>
		  <span class="ml-2 text-xs">{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'CSS3')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-transparent hover:bg-green-400 text-gray-800 font-semibold hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
		    <i class="fab fa-css3 text-blue-700"></i> 
		  <span class="ml-2 text-xs">{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'Android')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-transparent hover:bg-green-400 text-gray-800 font-semibold hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
		    <i class="fab fa-android text-green-500"></i> 
		  <span class="ml-2 text-xs">{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'Javascript')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-transparent hover:bg-green-400 text-gray-800 font-semibold hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
		    <i class="fab fa-js text-yellow-400"></i>
		  <span class="ml-2 text-xs">{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'Python')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-transparent hover:bg-green-400 text-gray-800 font-semibold hover:text-white hover:font-bold py-1 px-2 inline-flex items-center border border-green-400 hover:border-transparent rounded-full">
		    <i class="fab fa-python text-yellow-500"></i> 
		  <span class="ml-2 text-xs">{{$d->channel->title}}</span>
		</button>
	</a>
@endif