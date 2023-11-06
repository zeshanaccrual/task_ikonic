<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    private $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }
    public function index()
    {
        $comment = $this->comment->getFeedbackComments();

        $data = [
            'comments' => $comment
        ];

        return view('comment.index', $data);
    }

    public function statusChange(Request $request)
    {
        try {
            $newStatus = $request->all();

            $status = $this->comment->changeStatus($newStatus);
            if (isset($status)) {
                return redirect()->route('comment.index')->with('success', 'Status updated successfully.');
            }
        } catch (Exception $e) {

            return redirect()->route('comment.index')->with('danger', 'Something went wrong.' . ' ' . $e->getMessage());
        }
    }
}
