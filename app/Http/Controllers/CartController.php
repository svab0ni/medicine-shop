<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicine;
use App\Models\Delivery;
use App\Models\DeliveryMedicine;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');

        return view('pages.payment.cart', compact('cart'));
    }

    public function update(int $id, bool $increment)
    {
        $cart = session()->get('cart');

        if($cart){
            $cart = $this->incrementQuantity($id, $cart, $increment);

            session()->put('cart', $cart);
        }


        return response(['message' => 'Item quantity successfully updated', 'title' => $cart[$id]['name']], 200);
    }

    public function destroy(int $id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);
        }

        return response('Item successfully removed from the cart', 200);
    }

    public function addToCart(int $id)
    {
        $medicine = Medicine::where('id', $id)->first();

        $cart = session()->get('cart');

        if(!$cart) {
            $cart = [];
            $cart = $this->createCartItem($medicine, $cart);

            session()->put('cart', $cart);
        } else if($this->itemInCart($id, $cart))
        {
            $cart = $this->incrementQuantity($id, $cart);

            session()->put('cart', $cart);
        } else {
            $cart = $this->createCartItem($medicine, $cart);

            session()->put('cart', $cart);
        }

        return response(['message' => 'Item successfully added to the cart', 'title' => $cart[$id]['name']], 200);
    }

    public function itemInCart(int $id, array $cart)
    {
        return isset($cart[$id]);
    }

    public function incrementQuantity(int $id, array $cart, $increment = true)
    {
        if($increment) {
            $cart[$id]['quantity']++;
        }
        else {
            if($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }
        }

        return $cart;
    }

    public function createCartItem(Medicine $medicine, array $cart)
    {
        $cart = $cart + [
            $medicine->id => [
                'name' => $medicine->name,
                'quantity' => 1,
                'price' => $medicine->price,
                'photo' => $medicine->image_url
            ]
        ];

        return $cart;
    }

    public function checkout()
    {
        if (! $user = Auth::user())
            return view('auth.login');

        $cart = session()->get('cart');

        return view('pages.payment.checkout', compact('cart', 'user'));
    }

    public function purchase(Request $request)
    {
        if (! $user = Auth::user())
            return view('auth.login');

        $cart = session()->get('cart');

        $delivery = $this->createDelivery($cart, $user, $request);

        foreach ($cart as $key => $item) {
            $deliveryMedicine = new DeliveryMedicine;

            $deliveryMedicine->medicine_id = $key;
            $deliveryMedicine->delivery_id = $delivery->id;
            $deliveryMedicine->quantity = $item['quantity'];
            $deliveryMedicine->price = $item['price'];

            $deliveryMedicine->save();
        }

        $this->clearCart();

        return view('pages.payment.thanks');
    }

    public function cartTotal ($cart)
    {
        $total = 0;

        foreach ($cart as $key => $item) {
            $total += $item['quantity'] * $item['price'];
        }

        return $total;
    }

    public function createDelivery(array $cart, User $user, Request $request)
    {
        $data = [
            'price' => $this->cartTotal($cart),
            'user_id' => $user->id,
            'address' => $request->get('address'),
            'note' => $request->get('note'),
            'courier_id' => null,
            'status_id' => 1
        ];

        return Delivery::create($data);
    }

    public function clearCart()
    {
        session()->put('cart', null);
    }
}
