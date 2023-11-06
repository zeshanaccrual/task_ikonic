<?php

namespace Database\Seeders;

use App\Models\FeedbackCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class FeedbackCategorySeeder extends Seeder
{
    public function run()
    {
        FeedbackCategory::create([
            'feedback_type' => 'Bug Report',
        ]);

        FeedbackCategory::create([
            'feedback_type' => 'Feature Report',
        ]);

        FeedbackCategory::create([
            'feedback_type' => 'Improvement',
        ]);

        // Add more records as needed
    }
}




