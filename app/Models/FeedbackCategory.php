<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackCategory extends Model
{
    use HasFactory;

    protected $table = 'categories';
    // Other model properties and methods
   
    public function getCategoryFeedBack()
    {
        return FeedbackCategory::all();
    }
    
 
}
