<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moja półka') }}
        </h2>
    </x-slot>
<a href="?status=planowane"><button>Planowane</button></a>
<a href="?status=przeczytane"><button>Przeczytane</button></a>
<a href="?status=odrzucone"><button>Odrzucone</button></a>
<a href="/dashboard"><button>Wszystkie</button></a>
<table border="1">
<tr>
<th>Zdjęcie</th>
<th>Tytuł</th>
<th>Autor</th>
<th>Kategoria</th>
<th>Rok</th>
<th>Opis</th>
<th>Status</th>
</tr>
@foreach($books as $item)
<tr>
<td>
<img style="width:100px;height:100px;" src="
{{ (!is_null($item->file_url)) ? asset('/storage/img/'.basename($item->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/>
</td>
<td><a href="/books/single/{{$item->id}}">{{$item->title}}</a></td>
<td>{{$item->author}}</td>
<td>{{$item->category_name}}</td>
<td>{{$item->year}}</td>
<td>{{$item->description}}</td>
<td>{{$item->status}}</td>
</tr>
@endforeach
</table>
</x-app-layout>
