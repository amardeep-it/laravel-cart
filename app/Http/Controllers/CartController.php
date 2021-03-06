<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\DealsHelper;
use App\Helpers\ProductHelper;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Session\SessionManager;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = ProductHelper::getProduct($sku = $request->input('sku'));
        if (empty($product)) {
            return redirect()->route('homepage')->withErrors('Product could not be added to the Cart.');
        }
        $cartItem = \Cart::add(
            $sku,
            $product['name'],
            $request->input('selectQty'),
            $product['price']
        );
        \Cart::setTax($cartItem->rowId, $product['tax']);
        DealsHelper::applyDeal($cartItem);
        return redirect()->route('homepage')->withSuccess('Product has been successfully added to the Cart.');
    }

    public function update(Request $request)
    {
        $cartItem = \Cart::update(
            $request->input('id'),
            $request->input('selectQty')
        );
        DealsHelper::applyDeal($cartItem);
        return redirect()->route('cart')->withSuccess('Product has been successfully updated in the Cart.');
    }

    public function delete(Request $request)
    {
        \Cart::remove($request->input('id'));
        return redirect()->route('cart')->withSuccess('Product has been successfully updated in the Cart.');
    }

    public function shoppingCart()
    {
        return view('cart');
    }
}
