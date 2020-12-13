<?php use App\Http\Controllers\HomepageController; ?>
<x-header/>
	<h1>Strona główna</h1>
	<div class="bg-blue-200 py-4 px-1 md:px-48">
		<h2 class="text-center">Wyszukiwarka</h2>
		<form method="GET" action="/search-result">
			<input class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" type="text" name="search_slug" placeholder="Wpisz tytuł, autora lub rok wydania">
			<select class="mb-4 md:mb-0 w-full md:w-1/2 md:ml-32 border bg-white rounded px-3 py-2 outline-none" name="search_category">
				<option value="">Wybierz kategorię</option>
			@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->category_name}}</option>
			@endforeach
			</select>
			<button class="w-full md:w-1/4 bg-yellow-400 text-gray-800 rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none" type="submit">Szukaj</button>
		</form>
	</div>
	<h2 class="text-center w-full">TOP5 oceniane</h2>
	<div class="md:flex py-4 px-1">
		@foreach($top5 as $item)
		<div class="w-full md:w-1/5 md:mx-1 text-center">
			<a href="/books/single/{{$item->id}}">
			<img style="width:100%;height:300px;" src="
{{ (!is_null($item->file_url)) ? asset('/storage/img/'.basename($item->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/>
			<h2>{{$item->title}}</h2>
			<p>{{$item->author}}</p>
			<p>Ocena: {{$item->average_rating}}</p>
			</a>
		</div>
		@endforeach
	</div>
	<section>
		<h2>Listing kategorii</h2>
		@foreach($categories as $category)
		<p><a href="/categories/single/{{$category->id}}">{{$category->category_name}}</a></p>
		@endforeach
	</section>
	<section>
		<p>Polecane z każdej kategorii</p>
		@foreach($categories as $category)
		<h3>{{$category->category_name}}</h3>
			@foreach(HomepageController::top3($category->id) as $item)
				<img style="width:100px;height:100px;" src="
{{ (!is_null($item->file_url)) ? asset('/storage/img/'.basename($item->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/>
				<p>{{$item->title}}</p>
				<p>{{$item->author}}</p>
				<p>{{$item->year}}</p>
				<p>{{$item->category_name}}</p>
				<p>{{$item->average_rating}}</p>
			@endforeach
		@endforeach
	</section>
<p><a href="/categories/list">Lista kategorii</a></p>
<p><a href="/books/list">Lista książek</a></p>
<p><a href="/register">Zarejestruj</a></p>
<p><a href="/login">Zaloguj</a></p>
<form method="POST" action="{{ route('logout') }}">
@csrf
<x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
this.closest('form').submit();">{{ __('Wyloguj') }}</x-jet-dropdown-link>
</form>