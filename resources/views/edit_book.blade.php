<link rel="stylesheet" href="{{ asset('css/app.css')  }}">
<h1>Edit Book</h1>
<form action="" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="text" name="title" value="{{$book->title}}" placeholder="Title" /><br/><br/>
	<input type="text" name="author" value="{{$book->author}}" placeholder="Author" /><br/><br/>
	<textarea name="description" placeholder="Description">{{$book->description}}</textarea><br/><br/>
	<select name="category_id">
		@foreach($categories as $category)
  		<option value="{{$category->id}}"
  			{{ ( $book->category_id == $category->id) ? 'selected' : '' }}>
  			{{$category->category_name}}</option>
  		@endforeach
	</select><br/><br/>
	<input type="text" name="year" value="{{$book->year}}" placeholder="Year" /><br/><br/>
	<img style="width:100px;height:100px;" src="
{{ (!is_null($book->file_url)) ? asset('/storage/img/'.basename($book->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/><br/><br/>
	<input type="file" name="file"/><br/><br/>
	<button type="submit">Edit book</button>
</form>