<?php
declare(strict_types=1);

namespace App\Helpers;

use Cart;
use Gloudemans\Shoppingcart\CartItem;

class DealsHelper
{
    /**
     * Temporary declaration of deals list
     * @var array
     */
    //TODO: Replace with deals list from SOLR or DB
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

    /**
     * Get list of ALL deals
     * @return array
     */
    public static function getDeals(): array
    {
        return self::DEALS_LIST;
    }

    /**
     * Get Details of deals for a particular SKU
     * @param string $sku
     * @return array
     */
    public static function getDeal(string $sku): array
    {
        if (array_key_exists($sku, self::DEALS_LIST)) {
            return self::DEALS_LIST[$sku];
        }

        return [];
    }

    /**
     * Apply relevant deal for a particular Cart Item
     * @param CartItem $cartItem
     * @return void
     */
    public static function applyDeal(CartItem $cartItem):void
    {
        $deals = self::getDeal($cartItem->id);
        krsort($deals, SORT_NUMERIC);
        $itemDiscount = 0;
        foreach ($deals as $qty => $discount) {
            if ($cartItem->qty >= $qty) {
                echo $cartItem->qty . "<==>$qty" . PHP_EOL;
                $itemDiscount = $discount;
                break;
            }
        }
        Cart::setDiscount($cartItem->rowId, $itemDiscount);
    }
}
