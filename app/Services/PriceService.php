<?php

namespace App\Services;

Class PriceService {

    public function convertPriceToUSD($price) {
        return $price / 50;
    }
}