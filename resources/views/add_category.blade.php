<x-header/>
<h1>Add category</h1>
<form action="/categories/add" method="POST">
	@csrf
	<input type="text" name="category_name" placeholder="Category name" /><br/><br/>
	<button type="submit">Add category</button>
</form>