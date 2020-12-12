<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
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
}
