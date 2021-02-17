<?php

namespace App\Observers;

use App\Models\Review;
use App\Models\Product;

class ReviewObserver
{
    /**
     * Handle the Review "created" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function created(Review $review)
    {
        $this -> recalculateProductRating($review -> product_id);
    }

    /**
     * Handle the Review "deleted" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function deleted(Review $review)
    {
        $this -> recalculateProductRating($review -> product_id);
    }

    private function recalculateProductRating($product_id)
    {
        $product = Product::with('reviews') -> find($product_id);
        //dd($product);
        $avg_rating = 0;
        if($product -> reviews() -> count())
        {
            $avg_rating = $product -> reviews() -> avg('rating');
        }
        $product -> update([
            'avg_rating' => $avg_rating,
            'reviews_count' => $product -> reviews -> count()
        ]);
    }
}
