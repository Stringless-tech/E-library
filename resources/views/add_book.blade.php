<x-header/>
<h1 class="w-full text-center">Dodaj nową książkę</h1>
<form class="px-4 md:mx-96 md:px-4 md:py-4 md:border md:border-blue-500" action="/books/add" method="POST" enctype="multipart/form-data">
	@csrf
	<input class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" type="text" name="title" placeholder="Tytuł książki" autofocus="true" /><br/><br/>
	<input class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" type="text" name="author" placeholder="Autor książki" /><br/><br/>
	<textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="description" placeholder="Opis książki"></textarea><br/><br/>
	<select class="w-full border bg-white rounded px-3 py-2 outline-none" name="category_id">
		@foreach($categories as $category)
  		<option value="{{$category->id}}">{{$category->category_name}}</option>
  		@endforeach
	</select><br/><br/>
	<input class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" type="text" name="year" placeholder="Rok wydania" /><br/><br/>
	<input class="w-full text-gray-700 px-3 py-2 border rounded" type="file" name="file"/><br/><br/>
	<button class="bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none" type="submit">Dodaj</button>
</form>