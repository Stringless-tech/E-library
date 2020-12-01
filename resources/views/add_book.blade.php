<h1>Add book</h1>
<form action="/books/add" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="text" name="title" placeholder="Title" /><br/><br/>
	<input type="text" name="author" placeholder="Author" /><br/><br/>
	<textarea name="description" placeholder="Description"></textarea><br/><br/>
	<select name="category_id">
		@foreach($categories as $category)
  		<option value="{{$category->id}}">{{$category->category_name}}</option>
  		@endforeach
	</select><br/><br/>
	<input type="text" name="year" placeholder="Year" /><br/><br/>
	<input type="file" name="file"/><br/><br/>
	<button type="submit">Add book</button>
</form>