<?php
declare(strict_types=1);

namespace App\Helpers;

class DealsHelper
{
    private const DEALS_LIST = [
        'plants0001' => [
            '2' => 10,
            '5' => 25,
            '50' => 50,
        ],
        'plants0002' => [
            '2' => 10,
            '5' => 35,
            '50' => 50,
        ],
        'plants0003' => [
            '2' => 10,
            '5' => 25,
            '50' => 50,
        ],
        'plants0004' => [
            '2' => 10,
            '5' => 25,
            '50' => 50,
        ],
        'plants0005' => [
            '2' => 10,
            '5' => 50,
            '50' => 70,
        ],
    ];

    public static function getDeals(): array
    {
        return self::DEALS_LIST;
    }

    public static function getDeal(string $sku): array
    {
        if (array_key_exists($sku,self::DEALS_LIST)) {
            return self::DEALS_LIST[$sku];
        }

        return [];
    }
    public static function applyDeal(\Gloudemans\Shoppingcart\CartItem $cartItem){
        $deals = self::getDeal($cartItem->id);
        krsort($deals, SORT_NUMERIC);
        $itemDiscount = 0;
        foreach ($deals as $qty => $discount) {
            if($cartItem->qty >= $qty){
                echo $cartItem->qty . "<==>$qty".PHP_EOL;
                $itemDiscount = $discount;
                break;
            }
        }
        echo $cartItem->qty . "<==>$itemDiscount".PHP_EOL;
        \Cart::setDiscount($cartItem->rowId, $itemDiscount);
    }
}
