@if ($d->channel->title == 'Laravel')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 inline-flex items-center rounded-full">
		    <i class="fab fa-laravel text-red-400 pr-2"></i> 
		  <span>{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'Angular')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 inline-flex items-center rounded-full">
		    <i class="fab fa-angular text-red-600 pr-1"></i> 
		  <span>{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'PHP')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 inline-flex items-center rounded-full">
		    <i class="fab fa-php text-indigo-600 pr-1"></i>
		  <span>{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'JAVA')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 inline-flex items-center rounded-full">
		    <i class="fab fa-java text-blue-500 pr-1"></i> 
		  <span>{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'Ruby')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 inline-flex items-center rounded-full">
		    <i class="fas fa-gem text-red-600 pr-1"></i>
		  <span>{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'CSS3')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 inline-flex items-center rounded-full">
		    <i class="fab fa-css3 text-blue-700 pr-1"></i> 
		  <span>{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'Android')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 inline-flex items-center rounded-full">
		    <i class="fab fa-android text-green-500 pr-1"></i> 
		  <span>{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'Javascript')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 inline-flex items-center rounded-full">
		    <i class="fab fa-js text-yellow-400 pr-1"></i>
		  <span>{{$d->channel->title}}</span>
		</button>
	</a>
@endif

@if ($d->channel->title == 'Python')
	<a href="{{url('channel', ['slug' => $d->channel->slug])}}">
		<button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 inline-flex items-center rounded-full">
		    <i class="fab fa-python text-yellow-500 pr-1"></i> 
		  <span>{{$d->channel->title}}</span>
		</button>
	</a>
@endif