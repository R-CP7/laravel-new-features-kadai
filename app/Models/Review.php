<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

 

public function updateReviews()
{
    $this->where('score', '>=', 2)
        ->where('score', '<=', 5)
        ->update([
            'score' => 3.5, // Updated score
            // Add other fields you want to update
        ]);
    }
}


// Create an instance of Review
$review = new Review();

// Call the non-static method on the Review instance
$review->updateReviews();



