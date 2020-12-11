<h1>Wyniki wyszukiwania</h1>
@foreach($books as $book)
	<img style="width:100px;height:100px;" src="
{{ (!is_null($book->file_url)) ? asset('/storage/img/'.basename($book->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/>
	<p>{{$book->title}}</p>
	<p>{{$book->author}}</p>
	<p>{{$book->year}}</p>
@endforeach