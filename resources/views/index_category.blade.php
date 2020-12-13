<x-header/>
<h1>Lista wszystkich kategorii</h1>
<a href="/categories/add"><button class="bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none">Dodaj kategorię</button></a>
<br/><br/>
<table border="1">
<tr>
<th>Nazwa kategorii</th>
<th>Stworzona</th>
<th>Aktualizowana</th>
<th>Akcje</th>
</tr>
@foreach($data as $item)
<tr>
<td><a href="/categories/single/{{$item->id}}">{{$item->category_name}}</a></td>
<td>{{$item->created_at}}</td>
<td>{{$item->updated_at}}</td>
<td><a href="/categories/edit/{{$item->id}}">Edit</a></td>
</tr>
@endforeach
</table>