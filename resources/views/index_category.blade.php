<link rel="stylesheet" href="{{ asset('css/app.css')  }}">
<h1>List all category</h1>
<a href="/categories/add"><button>Add Category</button></a>
<br/><br/>
<table border="1">
<tr>
<th>Category name</th>
<th>Created at</th>
<th>Updated at</th>
<th>Operations</th>
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