<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function addStatus(Request $request)
    {
    	$status = new Status;
    	$status->book_id = $request->book_id;
    	$status->user_id = auth()->user()->id;
    	$status->status = $request->status;
    	$status->save();
    }

    public function editStatus(Request $request)
    {
    	$status = Status::where('user_id',auth()->user()->id)
            ->where('book_id',$request->book_id)->first();
        $status->status = $request->status;
        $status->update();
    }

    public function addOrEditStatus(Request $request)
    {
    	if(Status::where('user_id',auth()->user()->id)
            ->where('book_id',$request->book_id)
            ->count() == 0)
        {
            $this->addStatus($request);
        }
        else
        {
            $this->editStatus($request);
        }
        return redirect()->back();
    }

    public function index(Request $request)
    {
    	if(isset($request->status))
    	{
        	$books = DB::table('statuses as s')
    			->join('books as b','b.id','=','s.book_id')
    			->join('categories as c','c.id','=','b.category_id')
    			->select('b.*','c.category_name','s.*')
    			->where('s.user_id','=',auth()->user()->id)
    			->where('s.status','=',$request->status)
    			->get();	
    	}
    	else
    	{
        	$books = DB::table('statuses as s')
    			->join('books as b','b.id','=','s.book_id')
    			->join('categories as c','c.id','=','b.category_id')
    			->select('b.*','c.category_name','s.*')
    			->where('s.user_id','=',auth()->user()->id)
    			->get();
    	}

    	$newest_books = DB::table('books as b')
    					->join('categories as c','c.id','=','b.category_id')
    					->select('b.*','c.category_name')
    					->orderBy('id','DESC')
    					->limit(4)
    					->get();
    	$categories = Category::all();
    	return view('dashboard',compact('books','newest_books','categories'));
    }
}
