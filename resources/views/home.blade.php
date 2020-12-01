<?php use App\Http\Controllers\HomepageController; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Strona główna</title>
</head>
<body>
	<h1>Strona główna</h1>
	<section>
		<p>Banner z top5 ocenami</p>
		@foreach($top5 as $item)
			<img style="width:100px;height:100px;" src="
{{ (!is_null($item->file_url)) ? asset('/storage/img/'.basename($item->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/>
			<p>{{$item->title}}</p>
			<p>{{$item->author}}</p>
			<p>{{$item->average_rating}}</p>
		@endforeach
	</section>
	<section>
		<p>Listing kategorii</p>
		@foreach($categories as $category)
		<p><a href="/categories/single/{{$category->id}}">{{$category->category_name}}</a></p>
		@endforeach
	</section>
	<section>
		<p>Polecane z każdej kategorii</p>
		@foreach($categories as $category)
		<h3>{{$category->category_name}}</h3>
			@foreach(HomepageController::test($category->id) as $item)
				<img style="width:100px;height:100px;" src="
{{ (!is_null($item->file_url)) ? asset('/storage/img/'.basename($item->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/>
				<p>{{$item->title}}</p>
				<p>{{$item->author}}</p>
				<p>{{$item->average_rating}}</p>
			@endforeach
		@endforeach
	</section>
<p><a href="/categories/list">Lista kategorii</a></p>
<p><a href="/books/list">Lista książek</a></p>
<p><a href="/register">Zarejestruj</a></p>
<p><a href="/login">Zaloguj</a></p>
<p><a href="/logout">Wyloguj</a></p>
</body>
</html>