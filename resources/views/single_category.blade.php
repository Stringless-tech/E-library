<x-header/>
    <div class="bg-yellow-400 py-10 px-10 mb-10 text-center text-white">
        <h1>Kategoria: {{$category->category_name}}</h1>
    </div>
<p>Książki z kategorii {{$category->category_name}}</p>
<section style="width:100%;">
@foreach($books as $book)
<div style="width:30%;float:left;margin:1%">
<img style="width:100px;height:100px;" src="
{{ (!is_null($book->file_url)) ? asset('/storage/img/'.basename($book->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/><br/><br/>
<h2>Tytuł:</h2>
<p>{{$book->title}}</p>
<h2>Autor:</h2>
<p>{{$book->author}}</p>
<h2>Rok wydania:</h2>
<p>{{$book->year}}</p>
<h2>Opis:</h2>
<p>{{$book->description}}</p>
</div>
@endforeach
</section>