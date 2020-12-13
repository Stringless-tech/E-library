<x-header/>
<h1>Edit Category</h1>
<form action="" method="POST">
	@csrf
	<input type="text" name="category_name" value="{{$category->category_name}}" placeholder="Category name" /><br/><br/>
	<button type="submit">Edit category</button>
</form>