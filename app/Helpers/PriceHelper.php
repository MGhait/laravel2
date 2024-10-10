<?php

// can be seen form any part of our project and need to configure it form comoser.json then run composer dump-autoload
function convertPriceToUSD($price) 
{
    return $price / 50;
}

function printCurrency ($c){
    return "<span style='color:red'>" . strtoupper($c) . "</span>";
}
