<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Models\Review;

trait Revisable
{
    /**
     * This model has many reviews.
     *
     * @return Review
     */

    public function reviews()
    {
        return $this->morphMany(Review::class, 'review');
    }

    public function communications()
    {
        return $this->morphMany(Review::class, 'review');
    }


    public function domains()
    {
        return $this->morphMany(Review::class, 'review');
    }


    public function empathys()
    {
        return $this->morphMany(Review::class, 'review');
    }


    public function fulfillments()
    {
        return $this->morphMany(Review::class, 'review');
    }


    public function averageReviews()
    {
        return $this->reviews()->avg('review');
    }


    public function averageCommunications()
    {
        return $this->communications()->avg('communication');
    }


    public function averageDomains()
    {
        return $this->domains()->avg('domain');
    }


    public function averageEmpathys()
    {
        return $this->empathys()->avg('empathy');
    }



    public function averageFulfillments()
    {
        return $this->fulfillments()->avg('fulfillment');
    }

    public function sumReviews()
    {
        return $this->reviews()->sum('review');
    }


    public function sumCommunications()
    {
        return $this->reviews()->sum('review');
    }



    public function sumDomains()
    {
        return $this->domains()->sum('domain');
    }



    public function sumEmpathys()
    {
        return $this->empathys()->sum('empathy');
    }



    public function sumFulfillments()
    {
        return $this->fulfillments()->sum('fulfillment');
    }

    public function userAverageReviews()
    {
        return $this->reviews()->where('user_id', Auth::id())->avg('review');
    }


    public function userAverageCommunications()
    {
        return $this->communications()->where('user_id', Auth::id())->avg('communication');
    }



    public function userAverageDomains()
    {
        return $this->domains()->where('user_id', Auth::id())->avg('domain');
    }



    public function userAverageEmpathys()
    {
        return $this->empathys()->where('user_id', Auth::id())->avg('empathy');
    }



    public function userAverageFulfillments()
    {
        return $this->fulfillments()->where('user_id', Auth::id())->avg('fulfillment');
    }


    public function userSumReviews()
    {
        return $this->reviews()->where('user_id', Auth::id())->sum('review');
    }

    public function userSumCommunications()
    {
        return $this->communications()->where('user_id', Auth::id())->sum('communication');
    }


    public function userSumDomains()
    {
        return $this->domains()->where('user_id', Auth::id())->sum('domain');
    }


    public function userSumEmpathys()
    {
        return $this->empathys()->where('user_id', Auth::id())->sum('empathy');
    }


    public function userSumFulfillment()
    {
        return $this->fulfillments()->where('user_id', Auth::id())->sum('fulfillment');
    }


    public function reviewsPercent($max = 5)
    {
        $quantity = $this->reviews()->count();
        $total = $this->sumReviews();

        return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 5) : 0;
    }

    public function communicationsPercent($max = 5)
    {
        $quantity = $this->communications()->count();
        $total = $this->sumCommunications();

        return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 5) : 0;
    }

    public function domainsPercent($max = 5)
    {
        $quantity = $this->domains()->count();
        $total = $this->sumDomains();

        return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 5) : 0;
    }

    public function empathysPercent($max = 5)
    {
        $quantity = $this->empathys()->count();
        $total = $this->sumEmpathys();

        return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 5) : 0;
    }
    public function fulfillmentsPercent($max = 5)
    {
        $quantity = $this->fulfillments()->count();
        $total = $this->sumFulfillments();

        return ($quantity * $max) > 0 ? $total / (($quantity * $max) / 5) : 0;
    }


    public function getAverageReviewsAttribute()
    {
        return $this->averageReviews();
    }


    public function getAverageCommunicationsAttribute()
    {
        return $this->averageCommunications();
    }



    public function getAverageDomainsAttribute()
    {
        return $this->averageDomains();
    }



    public function getAverageEmpathysAttribute()
    {
        return $this->averageEmpathys();
    }


    public function getAverageFulfillmentsAttribute()
    {
        return $this->averageFulfillments();
    }


    public function getSumReviewsAttribute()
    {
        return $this->sumReviews();
    }



    public function getSumCommunicationsAttribute()
    {
        return $this->sumCommunications();
    }


    public function getSumDomainsAttribute()
    {
        return $this->sumDomains();
    }


    public function getSumEmpathysAttribute()
    {
        return $this->sumEmpathys();
    }


    public function getSumFulfillmentsAttribute()
    {
        return $this->sumFulfillments();
    }


    public function getUserAverageReviewsAttribute()
    {
        return $this->userAverageReviews();
    }



    public function getUserAverageCommunicationsAttribute()
    {
        return $this->userAverageCommunications();
    }


    public function getUserAverageDomainsAttribute()
    {
        return $this->userAverageDomains();
    }


    public function getUserAverageEmpathysAttribute()
    {
        return $this->userAverageEmpathys();
    }


    public function getUserAverageFulfillmentsAttribute()
    {
        return $this->userAverageFulfillments();
    }


    public function getUserSumReviewsAttribute()
    {
        return $this->userSumReviews();
    }


    public function getUserSumCommunicationsAttribute()
    {
        return $this->userSumCommunications();
    }



    public function getUserSumDomainsAttribute()
    {
        return $this->userSumDomains();
    }



    public function getUserSumEmpathysAttribute()
    {
        return $this->userSumEmpathys();
    }


    public function getUserSumFulfillmentsAttribute()
    {
        return $this->userSumFulfillments();
    }





}
