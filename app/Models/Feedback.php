<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Feedback extends Model
{
    use HasFactory;

    //get All feedback
    public function getFeedback()
    {

        return Feedback::with('category')->paginate(10);


    }

    //store feeback

    public function addFeedback($inputs)
    {
       
        $feedback = new Feedback();

        $feedback->title = $inputs['title'];
        $feedback->category_id = $inputs['feedback_type'];
        $feedback->user_id = Auth::user()->id;
        $feedback->description = $inputs['description'];
      


        $feedback->save();



        return $feedback;
    }
    //store feedback comment
    public function addFeedbackComment($inputs)
    {
        $feedback_comment = new Comment();

        $feedback_comment->content = $inputs['content'];

        $feedback_comment->user_id = Auth::user()->id;

        $feedback_comment->feedback_id = $inputs['feedback_id'];
      


        $feedback_comment->save();



        return $feedback_comment;

    }

    public function category()
    {
        return $this->belongsTo(FeedbackCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        
        return $this->hasMany(Comment::class, 'feedback_id');
    }
  
}
