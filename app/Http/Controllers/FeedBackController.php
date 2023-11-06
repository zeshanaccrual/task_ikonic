<?php

namespace App\Http\Controllers;

use App\Models\FeedbackCategory;
use App\Http\Requests\FeedBack\StoreRequest;
use App\Http\Requests\FeedBack\UpdateRequest;
use App\Http\Requests\FeedBack\StoreComment;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Exception;

class FeedBackController extends Controller
{
    private $feedback;
    private $feedback_categroy;
    public function __construct()
    {

        $this->feedback = new Feedback();
        $this->feedback_categroy = new FeedbackCategory();
    }
    public function index()
    {
        $feedback = $this->feedback->getFeedback();


        $data=['feedback'=>$feedback];

        return view('feedback.index',$data);
    }

    public function create()
    {
        $feedback_categroy = $this->feedback_categroy->getCategoryFeedBack();

        $data = [
            'feedback_categroy' => $feedback_categroy,
        ];
        return view('feedback.create', $data);
    }

    public function store(StoreRequest $request)
    {
        try {

            $feedback = $this->feedback->addFeedback($request->all());


            if(isset($feedback))
            {
                return redirect()->route('feedback.index')->with('success', 'Feedback added successfully.');
            }


        } catch (Exception $e) {

            return redirect()->route('feedback.index')->with('danger', 'Something went wrong.' . ' ' . $e->getMessage());
        }
    }

    public function storeFeedbackComment(StoreComment $request)
    {


        try {

            $feedback_comment = $this->feedback->addFeedbackComment($request->all());


            if(isset($feedback_comment))
            {
                return redirect()->route('feedback.index')->with('success', 'Feedback Comment added successfully.');
            }


        } catch (Exception $e) {

            return redirect()->route('feedback.index')->with('danger', 'Something went wrong.' . ' ' . $e->getMessage());
        }
    }
}