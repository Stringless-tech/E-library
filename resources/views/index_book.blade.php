
<h1>List all books</h1>
<a href="/books/add"><button>Add book</button></a>
<br/><br/>
<table border="1">
<tr>
<th>Image</th>
<th>Title</th>
<th>Author</th>
<th>Category id</th>
<th>Year</th>
<th>Description</th>
<th>Operations</th>
</tr>
@foreach($data as $item)
<tr>
<td>
<img style="width:100px;height:100px;" src="
{{ (!is_null($item->file_url)) ? asset('/storage/img/'.basename($item->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/>
</td>
<td><a href="/books/single/{{$item->id}}">{{$item->title}}</a></td>
<td>{{$item->author}}</td>
<td>{{$item->category_id}}</td>
<td>{{$item->year}}</td>
<td>{{$item->description}}</td>
<td><a href="/books/edit/{{$item->id}}">Edit</a></td>
</tr>
@endforeach
</table>
