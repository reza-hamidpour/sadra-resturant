<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Carts_details;
use App\Models\Foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodsBasketController extends Controller
{
    public function add_item(Request $request){
        $food = Foods::where('id', $request->food_id)->get();
        if($food->isEmpty()){
            return response()->json([
            'status' => 404,
            'msg' => 'Food not found, please try again.',
                ]);
        }
        $food = $food->first();
        if(isset($_SESSION['cart_id']) && $_SESSION['cart_id'] !== null )
        {
            $cart = Carts::where('id', $_SESSION['cart_id'])->get();
            if($cart->isEmpty()){
                $cart = $this->create_cart($food->price, 0);
            }
        }else{
            $cart = $this->create_cart($food->price, 0);
        }
        try{
            $cart->carts_details()->save(new Carts_details([
                'food_id' => $food->id,
                'food_options' => $request->options,
                'allergic_comment' => $request->allergic_comment,
                'age_check' => $request->age_check ? 1 : 0,
                'price' => $food->price,
                'quantity' => $request->quantity,
            ]));
            $_SESSION['current_cart'] = $cart->id;
            $response = [
                'status_code' => 200,
                'status' => 'success',
                'msg' => 'You food added successfully.',
            ];
        }catch(\Exception $e){
            $response = [
                'status_code' => 200,
                'status' => 'danger',
                'msg' => 'There is a problem during ordering online, please contact our store to order your foods.',
            ];
        }
        return response()->json($response);
    }

    private function create_cart($start_price, $user_id=0){
        $cart = new Carts([
            'user_id' => $user_id == 0?? null,
            'comment' => '',
            'total_price' => $start_price,
            'discount_code' => '',
            'discount_percent' => 0
        ]);
        $cart->save();
        return $cart;
    }

    private function add_option_to_food($options, $food){
        foreach($options as $option){
            $option_object = Foods_options::where('id', $option->option_id);
        }
    }

    public function remove_item(Request $request){

    }

    public function current_basket(Request $request){

        if(Auth::user()){
            $cart = Carts::where('user_id', Auth::user()->id)->get();
            if($cart->isEmpty()){
                return response()->json([
                    'status_code' => 200,
                    'status' => 'success',
                    'cart' => null,
                    'cart-details' => null,
                ]);
            }
        }else if(isset($_SESSION['cart_id'])){
            $cart = Carts::where('id', $_SESSION['cart_id'])->get();
            if($cart->isEmpty()){
                return response()->json([
                    'status_code' => 200,
                    'status' => 'success',
                    'cart' => null,
                    'cart_details' => null,
                ]);
            }

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'cart' => $cart->first(),
                'cart_details' => $cart->first()->details(),
            ]);

        }



    }

}
