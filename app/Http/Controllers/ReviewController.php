<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Review;

// su dung trait
use App\Traits\DeleteModelTrait;

class ReviewController extends Controller
{
    use DeleteModelTrait;
    private $review;
    public function __construct(Review $review)
    {
    	$this -> review = $review;
    }
    public function store(Request $request)
    {
    	$input_data = $request -> all();
    	$input_data['user_id'] = Auth::id();
    	$this -> review -> create($input_data);
    	return back() -> with('message','danh gia gui thanh cong');
    }

    public function index()
    {
  		
    	$reviews = $this -> review -> latest() -> paginate(5);
    	return view('admin.review.index',compact('reviews'));
    }

    // xoa danh muc
    public function delete($id)
    {
    	return $this -> deleteModelTrait($id, $this -> review);
    }
}
