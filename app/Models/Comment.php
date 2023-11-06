<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Feedback;

class Comment extends Model
{
    use HasFactory;

    public function getFeedbackComments()
    {
        return  Comment::with('feedback')->get();
    }

    public function changeStatus($inputs)
    {
        $status = Comment::find($inputs['comment_id']);
        if($status->id)
        {
            $status->status = !$status->status;
            $status->save();
        
            
        }


        return $status;
    }

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}
