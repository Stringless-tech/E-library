<x-header/>
<h1>Single book</h1>
<img style="width:100px;height:100px;" src="
{{ (!is_null($book->file_url)) ? asset('/storage/img/'.basename($book->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/>
<br/><br/>
<h2>Title:</h2>
<p>{{$book->title}}</p>
<h2>Author:</h2>
<p>{{$book->author}}</p>
<h2>Year:</h2>
<p>{{$book->year}}</p>
<h2>Description:</h2>
<p>{{$book->description}}</p>
<h2>Category</h2>
<p>{{$category->category_name}}</p>
<br/>
<h2>Ocena</h2>
<p>{{$grade}}</p>

@if (Auth::check())
<h2>Oceń książke</h2>
<form action="/grades/addoredit" method="POST">
	@csrf
	<select name="value">
  		<option value="1" {{ ( $user_grade == 1) ? 'selected' : '' }}>1</option>
  		<option value="2" {{ ( $user_grade == 2) ? 'selected' : '' }}>2</option>
  		<option value="3" {{ ( $user_grade == 3) ? 'selected' : '' }}>3</option>
  		<option value="4" {{ ( $user_grade == 4) ? 'selected' : '' }}>4</option>
  		<option value="5" {{ ( $user_grade == 5) ? 'selected' : '' }}>5</option>
      <option value="6" {{ ( $user_grade == 6) ? 'selected' : '' }}>6</option>
      <option value="7" {{ ( $user_grade == 7) ? 'selected' : '' }}>7</option>
      <option value="8" {{ ( $user_grade == 8) ? 'selected' : '' }}>8</option>
      <option value="9" {{ ( $user_grade == 9) ? 'selected' : '' }}>9</option>
      <option value="10" {{ ( $user_grade == 10) ? 'selected' : '' }}>10</option> 		
	</select>
	<input type="hidden" name="book_id" value="{{$book->id}}"/>
	<button type="submit">Oceń</button>
</form>
@endif

@if (Auth::check())
<h2>Dodaj status</h2>
<form action="/statuses/addoredit" method="POST">
  @csrf
  <select name="status">
      <option value="planowane" {{ ( $user_status == 'planowane') ? 'selected' : '' }}>Planowane</option>
      <option value="przeczytane" {{ ( $user_status == 'przeczytane') ? 'selected' : '' }}>Przeczytane</option>
      <option value="odrzucone" {{ ( $user_status == 'odrzucone') ? 'selected' : '' }}>Odrzucone</option>    
  </select>
  <input type="hidden" name="book_id" value="{{$book->id}}"/>
  <button type="submit">Dodaj status</button>
</form>
@endif