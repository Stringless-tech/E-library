<x-header/>
<h1 class="w-full text-center">Dodaj nową kategorie</h1>
<form class="px-1 md:mx-96 md:px-4 md:py-4 md:border-2 md:border-blue-500" action="/categories/add" method="POST">
	@csrf
	<input class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" type="text" name="category_name" placeholder="Nazwa kategorii" /><br/><br/>
	<button class="bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none" type="submit">Dodaj</button>
</form>