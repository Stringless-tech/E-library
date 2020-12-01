<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Grade;

class HomepageController extends Controller
{
    public function index()
    {
    	$top56 = Book::join('grades','grades.book_id','=','books.id')
    	->orderBy('grades.value','DESC')
    	->get();
    	$top5 = DB::table('grades as g')
                ->join('books as b','g.book_id', '=', 'b.id')
                ->select(DB::raw('ROUND(AVG(g.value),2) as average_rating'),'b.*')
                ->groupBy('g.book_id')
                ->orderBy('average_rating','DESC')
                ->limit(5)
                ->get();
    	$categories = Category::all();
    	return view('home',compact('top5','categories'));
    }

    static function test($category_id)
    {
    	$top3 = DB::table('grades as g')
                ->join('books as b','g.book_id', '=', 'b.id')
                ->select(DB::raw('ROUND(AVG(g.value),2) as average_rating'),'b.*')
                ->groupBy('g.book_id')
                ->orderBy('average_rating','DESC')
                ->limit(3)
                ->where('category_id','=',$category_id)
                ->get();
        return $top3;
    }
}
