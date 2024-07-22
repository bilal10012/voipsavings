<?php

namespace App\Http\Controllers\web;
use App\Notifications\UserNotification; 
use Illuminate\Notifications\Notifiable;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Banner;
use App\Order;
use App\Orderitem;
use App\Coupon;
use App\ProductVariant;
// use App\Country;
use Session;
use DB;
use Auth;
use Carbon\Carbon;
use Stripe;
use App\Http\Stripe\vendor\autoload;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function cartPage()
    {
        \Cart::removeCartCondition('discount');
        
        if(Auth::check()){
            $cartData = \Cart::session(auth()->user()->id)->getContent(auth()->user()->id);
            $condition = \Cart::getCondition('discount');
            // dd($condition);
        }
        else{
            return redirect()->back()->with('error','first you have to login or signup then you can purchase our product thank you');
        }
        $lastIndex = '';
        foreach ($cartData as $key => $value) {
            $lastIndex = $value;
        }


    


        $banner = Banner::where('page','Cart')->first();
      
        if ($lastIndex != null) {
            return view('front.cart',compact(array('lastIndex', 'cartData','banner')))->with('message','Product Has Been Added To Your Cart.');
        }
        else
            return redirect('/')->with('error','Your Cart Is Empty');
    }
     
    public function AddToCart(Request $request)

    {
        $product_id=$request->product_id;
        $prod=ProductVariant::where('product_id',$product_id)->first();
       if($prod){
        $validator = Validator::make($request->all(), [ 
            'color' => 'required',
        ],
        [
            'color.required' => 'Please provide your Color ',
           
        ]);
        if ($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator )->withInput();
        }
    }

        if(Auth::check()){

        $product_id=$request->product_id;
        // $allcarts = \Cart::getContent();

        $allcarts = \Cart::session(auth()->user()->id)->getContent(auth()->user()->id);
        foreach($allcarts as $allcart){
          
            if($allcart->associatedModel == $request->product_id && $allcart->attributes->color  == $request->color){
                return redirect()->back()->with('error','This Product is Already in Cart');
            }
        }
        
    }

      
        $quantity = (isset($request->quantity) && $request->quantity > 1) ? $request->quantity : 1;
        $product = Product::where('id',$request->product_id)->first();
        $product_var = ProductVariant::where('product_id',$request->product_id)->where('var_color',$request->color)->first();
        if($product->stock < $quantity){
            return redirect()->back()->with('error','The Remaining Product Quantity is '.$product->stock);
        }elseif($prod){
        if($product_var->var_stock < $quantity){
            return redirect()->back()->with('error','The Remaining Product Variant Quantity is '.$product_var->var_stock);
        }
    }
        if(Auth::check()){
            $cartData = \Cart::session(auth()->user()->id)->getContent(auth()->user()->id);
            // $quantity = (isset($request->quant) && $request->quant != NULL) ? $request->quant[1] : 1;
            $cartData = \Cart::session(auth()->user()->id)->add(array(
                'id' => uniqid(),
                'name' => $product->name,
                'price' => $product->selling_price,
                'image' => $product->image,
                'quantity' =>$quantity,
                'attributes' => array(
                    'user_id' => auth()->user()->id,
                    'image' => $product->image,
                    'category_id' => $product->category_id,
                    'sku' => $product->sku,
                    'color'=>$request->color
                 
                ),
                'associatedModel' => $product->id,
            ));
     
            if ($cartData) {

                  $banner = Banner::where('page','Cart')->first();
              return  redirect('cartPage')->with('message','This Product added into cart');
            }
        }
        else{
            return redirect()->back()->with('error','first you have to login or signup then you can purchase our product thank you');
            // $cartData = \Cart::add(array(
            //     'id' => uniqid(), // inique row ID
            //     'name' => $product->name,
            //     'price' => $product->selling_price,
            //     'quantity' => $quantity,
            //     'attributes' => array(
            //         'image' => $product->image,
            //         'category_id' => $product->category_id,
            //         'sku' => $product->sku,
            //     ),
            //     'associatedModel' => $product->id,
            // ));
        }
    }

    public function CheckOutPage(Request $request)
    {
       
        if ($request->method() == 'POST') {
            if (auth()->check()){
                $FileAddedToCart = \Cart::session(auth()->user()->id)->update($request->last_ID, array(
                    'total' => $request->total,
                ));
            }
            else{
                $FileAddedToCart = \Cart::update($request->last_ID, array(
                    'total' => $request->total,
               
                ));
            }
       
            if ($FileAddedToCart) {
                return redirect('/CheckOutPage');
            }
        }
        if (Auth::check()) {
            $cartData = \Cart::session(auth()->user()->id)->getContent(auth()->user()->id);
        
        }
        else{
            $cartData = \Cart::getContent();
         
        }
        $lastIndex = '';
        foreach ($cartData as $key => $value) {
            $lastIndex = $value;
        }
        $banner = Banner::where('page','Check Out')->first();
        // $countries = Country::all();
        return ($lastIndex != null)? view('front.checkout',compact('cartData','lastIndex','banner')): redirect('/');
    }

    public function billingInfoPage(Request $request){
        if ($request->method() == 'POST') {
            if (auth()->check()){
                $FileAddedToCart = \Cart::session(auth()->user()->id)->update($request->last_ID, array(
                    'holder' => $request->auth()->user()->id,
                ));
            }
            else{
                $FileAddedToCart = \Cart::update($request->last_ID, array(
                    'holder' => $request->optionsRadios,
                ));
            }

            if ($FileAddedToCart) {
                return redirect('/billing-information');
            }
        }
        if (Auth::check()) {
            $cartData = \Cart::session(auth()->user()->id)->getContent(auth()->user()->id);
        }
        else{
            $cartData = \Cart::getContent();
        }
        $lastIndex = '';
        foreach ($cartData as $key => $value) {
            $lastIndex = $value;
        }

        $banner = Banner::where('page','CheckOut Page')->first();
        return ($lastIndex != null)? view('front.billing-info',compact('cartData','lastIndex','banner')): redirect('/');
    }

    public function updatecart(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
                
            'value' => 'integer|gt:0', 
        ],
        [ 
            'value.gt' => ' Value Must Be Greater Than 0',
     
        ]);
              
        if ($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator )->withInput();
        }
        $value = (isset($request->value) && $request->value > 1) ? $request->value : 1;
 
        $target_product = $request->target_product;

        if ($request->all() != null) {
            if (Auth::check()) {
                $cart_data_to_check = \Cart::session(auth()->user()->id)->getContent($target_product);
 
                $save_product_id = '';
                foreach ($cart_data_to_check as $key => $cartdata) {
                    if ($cartdata->id == $target_product) {
                        $save_product_id = $cartdata->associatedModel;
                    }
                }
                $product_quantity_check = Product::findOrfail($save_product_id);
                if ($product_quantity_check->stock < $value)
                return redirect()->back()->with('error','The Remaining Product Quantity is '.$product_quantity_check->stock);
                $FileAddedToCart = \Cart::session(auth()->user()->id)->update($target_product,
                    array(
                        'quantity' => array(
                            'relative' => false,
                            'value' => $value
                        )
                    ));
                    return redirect()->back()->with('info','Product Quantity Has Been Updated in your Cart');
            }
            else{
                $cart_data_to_check = \Cart::getContent();
                $save_product_id = '';
                foreach ($cart_data_to_check as $key => $cartdata) {
                    if ($cartdata->id == $target_product) {
                        $save_product_id = $cartdata->associatedModel;
                    }
                }
                $product_quantity_check = Product::findOrfail($save_product_id);
                if ($product_quantity_check->stock < $value)
                    return response()->json(['error' => true,]);
                $FileAddedToCart = \Cart::update($target_product,
                    array(
                        'quantity' => array(
                            'relative' => false,
                            'value' => $value
                        )
                    ));
                return response()->json(
                    [
                       'success' => true,
                    ]);
            }
        }
    }

    public function DeleteFromCart($id){
        if (Auth::check()) {
            $removecart =\Cart::session(auth()->user()->id)->get($id);
            \Cart::session(auth()->user()->id)->remove($id);
            $cartData = \Cart::session(auth()->user()->id)->getContent(auth()->user()->id);
            if($cartData->count()==0)
            {
                \Cart::removeCartCondition('discount');
            }
    

        }else{
            \Cart::remove($id);
        }
        return redirect()->back()->with('info','Product Has Been Removed From Your Cart');
    }

    public function Discount(Request $request){
        
        $discounts = Coupon::where('discount_code',$request->discount)->first();

        $discount_code = '';
        $discount_id = 0;
        // $discount_code = $value->discount_code;
        if ($discounts !=null && $discounts->discount_code == $request->discount) {
            if (Carbon::now()->toDateTimeString() >= $discounts->start_date && Carbon::now()->toDateTimeString() <= $discounts->end_date && $discounts->max_usage > 0) {
                if ($request->cart_total >= $discounts->min_required_amount) {
                    if($discounts->discount_type == 'fixed_amount'){
                        $discount_id = $discounts->id;
                        $discounted_price = $request->cart_total - $discounts->discount;
                        if (Auth::check()) {
                            // $FileAddedToCart = \Cart::session(auth()->user()->id)->update('6537ed3ecbf8f', array(
                            //     'discounted_total' => $discounted_price,
                            //     'coupon_name' => $request->discount,
                            //     'discount_price' => $discounts->discount,
                            // ));

                            $FileAddedToCart = new \Darryldecode\Cart\CartCondition(array(
                                'name' => 'discount',
                                // 'name' => $request->discount,
                                'type' => $discounts->discount_type,
                                'target' => $discounted_price, // this condition will be applied to cart's subtotal when getSubTotal() is called.
                                'value' => $discounts->discount,
                                'attributes' => array( 
                                        'coupon' => $request->discount,
                                        'maxdiscount' => $discounts->max_discount,
                                    ),
                            ));
                            \Cart::session(auth()->user()->id)->condition($FileAddedToCart);
                        }
                        else{
                            // $FileAddedToCart = \Cart::update($request->last_id, array(
                            //     'discounted_total' => $discounted_price,
                            //     'coupon_name' => $request->discount,
                            //     'discount_price' => $discounts->discount,
                            // ));
                            $FileAddedToCart = new \Darryldecode\Cart\CartCondition(array(
                                'name' => 'discount',
                                // 'name' => $request->discount,
                                'type' => $discounts->discount_type,
                                'target' => $discounted_price, // this condition will be applied to cart's subtotal when getSubTotal() is called.
                                'value' => $discounts->discount,
                                'attributes' => array( 
                                        'coupon' => $request->discount,
                                        'maxdiscount' => $discounts->max_discount,
                                    ),
                            ));
                            \Cart::session(auth()->user()->id)->condition($FileAddedToCart);
                        }
                        if ($FileAddedToCart) {
                            $coupon_user = Coupon::where('id',$discount_id)->first();

                            $remaining_user = $coupon_user->max_usage - 1;

                            Coupon::where('id', $discount_id)

                            ->update([

                                'max_usage' => $remaining_user,

                            ]);

                            $coupon_user->save();

                            return redirect('cartPage')->with('message','Your Coupon '.$request->discount.' is applied to Your cart');

                        }

                    }

                    else{

                        $discount_id = $discounts->id;

                        $discounted_applied = $request->cart_total * ( $discounts->discount / 100 );

                        $discounted_price = $request->cart_total - round($discounted_applied);
                        $FileAddedToCart = new \Darryldecode\Cart\CartCondition(array(
                            'name' => 'discount',
                            // 'name' => $request->discount,
                            'type' => $discounts->discount_type,
                            'target' => $discounted_price, // this condition will be applied to cart's subtotal when getSubTotal() is called.
                            'value' => $discounts->discount,
                            'attributes' => array( 
                                    'coupon' => $request->discount_code,
                                    'maxdiscount' => $discounts->max_discount,  
                                ),
                        ));
                        \Cart::session(auth()->user()->id)->condition($FileAddedToCart);

                        if ($FileAddedToCart) {

                            $coupon_user = Coupon::where('id',$discount_id)->first();

                            $remaining_user = $coupon_user->max_usage - 1;

                            Coupon::where('id', $discount_id)

                            ->update([

                                'max_usage' => $remaining_user,

                            ]);

                            $coupon_user->save();

                            return redirect('cartPage')->with('message','Your Coupon '.$request->discount.' is applied to Your cart');

                        }

                    }

                }else{

                    return redirect()->back()->with('info','This Coupon is valid for price greater than $'.$discounts->min_required_amount);

                }

            }

            else{

                return redirect()->back()->with('info','This Coupon is no longer valid');

            }

        }

        else{

            return redirect()->back()->with('info','Invalid Coupon');

        }

    }



    public function viewOrder(){

        $order = Order::orderBy('id', 'DESC')->first();;

        $orderitems = Orderitem::where('order_id',$order->id)->get();

        $banner = Banner::where('page','Order Page')->first();

        return view('front.orders',compact('banner','order','orderitems'));

    }



    public function placeOrder(Request $request){
    
        if($request->method() == 'POST'){
        
            $validator = Validator::make($request->all(), [ 
                
                'billing_first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255', 

              
                'billing_town_city' => 'required', 
                'billing_last_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255', 
                'billing_email' => 'required|email',
                'billing_contact' => 'required|max:255',
                'billing_address_1' => 'required|string|max:255',
                'billing_address_2' => 'max:255',
                'billing_country' => 'required|string|max:255',
                'billing_state' => 'required',
                'billing_zip' => 'required|max:5',
                'billing_contact'=>'required'
            ],
            [ 
                'billing_first_name.required' => 'Please Provide First Name',
                'billing_first_name.max' => 'First Name can not exceed :max characters',
                'billing_last_name.required' => 'Please Provide Last Name',
                'billing_last_name.max' => 'First Name can not exceed :max characters',
                'billing_contact.required' => 'Please Provide a Contact',
                
                'billing_email.required' => 'Please provide An Email',
                'billing_email.email' => 'Email Should be in proper format',
                'billing_address_1.required' => 'Please Provide Address 1',
                'billing_address_1.max' => 'Address can not exceed :max characters',
             
                'billing_address_2.max' => 'Address can not exceed :max characters',
                'billing_state.required' => 'Please Provid a State',
                'billing_zip.max' => 'Zip code can not exceed :max characters',
                'billing_country.required' => 'Please Provid a country',
                'billing_town_city.required'=> 'Please Provid a City',
                'billing_company_name.regex'=> 'Company Name Format is Not Correct',
               
            ]);
          
            if ($validator->fails()){
                Session::flash('error', $validator->errors()->first());
                return redirect()->back()->withErrors($validator )->withInput();
            }
            if (Auth::check()) {
                $cartData = \Cart::session(auth()->user()->id)->getContent(auth()->user()->id);
                $cartData_count = \Cart::session(auth()->user()->id)->getContent(auth()->user()->id)->count();   
    
            }
            else{
                return redirect()->back()->with('error','first you have to login or signup then you can purchase our product thank you');

            }

           
            $order = new Order;
            
            $order->order_number = base_convert(time(),10,16);
            $order->order_status = 0;
            $order->user_id = (auth()->check()) ? auth()->user()->id : 'guest';
            $order->type = $request->type;
            $order->billing_first_name = $request->billing_first_name;
            $order->billing_last_name = $request->billing_last_name;
            $order->billing_contact = $request->billing_contact;
            $order->billing_email = $request->billing_email;
            $order->billing_address1 = $request->billing_address_1; 
            $order->billing_address2 = $request->billing_address_2;
            $order->billing_state = $request->billing_state;
            $order->billing_zipcode = $request->billing_zip;
            $order->billing_country = $request->billing_country;
            $order->billing_town_city = $request->billing_town_city;
            $order->billing_company_name = $request->billing_company_name;    
            $order->save();
            $admin = User::where('role', 0)->first();
            \Notification::send($admin, new UserNotification($order));
            $product_cart_quantity = 1;
            $quantity=0;
            $total=0;
            $subtotal=0;
       
            foreach ($cartData as $key => $value) {
                $quantity = $quantity+$value->quantity;
              

                $subtotal = $subtotal+($value->quantity*$value->price);

              

                $order_items = new Orderitem;
                $order_items->user_id = $order->user_id;
                $order_items->order_id = $order->id;
                $order_items->name =  $value->name;
                $order_items->price =  $value->price;
                $order_items->quantity =  $value->quantity;
                $order_items->image =  $value->attributes['image'];
                $order_items->category =  $value->attributes['category_id'];
                $order_items->sku =  $value->attributes['sku'];
                $order_items->color =  $value->attributes['color'];
                $order_items->save();
                $product_update = Product::where('sku',$value->attributes['sku'])->first();
                $product_update->stock = $product_update->stock - $value->quantity;
                $product_update->save();

                $product_updated = ProductVariant::where('product_id',$value->associatedModel)->where('var_color', $value->attributes['color'])->first(); 
          if($product_updated){
                $product_updated->var_stock = $product_updated->var_stock - $value->quantity;
                $product_updated->save();
          }
                if (Auth::check()) {
                    \Cart::session(auth()->user()->id)->remove($value->id);
                }else{
                    \Cart::remove($value->id);
                }
                $product_cart_quantity++;
            }
            $order_items = Orderitem::where('order_id',$order->id)->get();
            $condition = \Cart::getCondition('discount');
            // \Stripe\Stripe::setApiKey(env('STRIPE_SECRET', env('STRIPE_SECRET')));  
            if($condition){
                if($condition->getType() == 'percent'){
                    $total=$subtotal-($subtotal*($condition->getValue()/100));
                    \Cart::removeCartCondition('discount');
                }else{
                    $total=$subtotal-($condition->getValue());
                    \Cart::removeCartCondition('discount');
                }
            }else{
                $total = $subtotal;
            }
                Order::where('id',$order->id)
                ->update([
                    'quantity' => $quantity,
                    'Total' => $total,
                    'subtotal' => $subtotal,  
                    'order_pay' => 0,
                ]);
                // try {
                //     // Use Stripe's library to make requests...
                //     $payment = \Stripe\PaymentIntent::create([
                //         'amount' => (($total > 0)? $total: 1) * 100,
                //         'currency' => 'GBP',
                //         'payment_method' => $request->input('payId'),
                //         'confirm' => true,  
                //         'receipt_email' => $request->input('billing_email'),
                //         'automatic_payment_methods' => [
                //             'enabled' => true,
                //             'allow_redirects' => 'never'
                //         ],
                //     ]);
                //   } catch(\Stripe\Exception\CardException $e) {
                //     // Since it's a decline, \Stripe\Exception\CardException will be caught
                //     // echo 'Status is:' . $e->getHttpStatus() . '\n';
                //     // echo 'Type is:' . $e->getError()->type . '\n';
                //     // echo 'Code is:' . $e->getError()->code . '\n';
                //     // // param is '' in this case
                //     // echo 'Param is:' . $e->getError()->param . '\n';
                //     // echo 'Message is:' . $e->getError()->message . '\n';

                //     Order::where('id',$order->id)
                //     ->update([
                //         'order_pay' => 2,
                //     ]);
                //     return redirect()->route('webIndexPage')->with('error','Your Order Has Been Placed But Payment Not Success'.$e->getError()->message);

                //   } catch (\Stripe\Exception\RateLimitException $e) {
                //     // Too many requests made to the API too quickly
                //     Order::where('id',$order->id)
                //     ->update([
                //         'order_pay' => 2,
                //     ]);
                //     return redirect()->route('webIndexPage')->with('error','Too many requests made to the API too quickly'.$e->getError()->message);
                //   } catch (\Stripe\Exception\InvalidRequestException $e) {
                //     // Invalid parameters were supplied to Stripe's API
                //     Order::where('id',$order->id)
                //     ->update([
                //         'order_pay' => 2,
                //     ]);
                //     return redirect()->route('webIndexPage')->with('error','An invalid request occurred.'.$e->getError()->message);
                //   } catch (\Stripe\Exception\AuthenticationException $e) {
                //     // Authentication with Stripe's API failed
                //     // (maybe you changed API keys recently)
                //     Order::where('id',$order->id)
                //     ->update([
                //         'order_pay' => 2,
                //     ]);
                //     return redirect()->route('webIndexPage')->with('error',' Authentication with Stripe  API failed'.$e->getError()->message);
                //   } catch (\Stripe\Exception\ApiConnectionException $e) {
                //     // Network communication with Stripe failed
                //     Order::where('id',$order->id)
                //     ->update([
                //         'order_pay' => 2,
                //     ]);
                //     return redirect()->route('webIndexPage')->with('error',' Network communication with Stripe failed'.$e->getError()->message);
                //   } catch (\Stripe\Exception\ApiErrorException $e) {
                //     // Display a very generic error to the user, and maybe send
                //     // yourself an email
                //     Order::where('id',$order->id)
                //     ->update([
                //         'order_pay' => 2,
                //     ]);
                //     return redirect()->route('webIndexPage')->with('error','Your Order Has Been Placed But Payment Not Success'.$e->getError()->message);
                //   } catch (Exception $e) {
                //     // Something else happened, completely unrelated to Stripe
                //     Order::where('id',$order->id)
                //     ->update([
                //         'order_pay' => 2,
                //     ]);
                //     return redirect()->route('webIndexPage')->with('error','Something else happened, completely unrelated to Stripe'.$e->getError()->message);
                //   }
                // if($payment['status'] == 'succeeded'){
                //     $transaction_id = $payment['id'];
                //     Order::where('id',$order->id)
                //     ->update([
                //         'transaction_id' => $transaction_id,
                //         'order_pay' => 1,
                //     ]);
                // }else{
                //     Order::where('id',$order->id)
                //     ->update([
                //         'order_pay' => 2,
                //     ]);
                // }
            
                $order = Order::where('id',$order->id)->first();
                $data2['email'] = $request->billing_email;
                Mail::send('front.invoice', ['order' => $order,'order_items'=>$order_items ],function ($m) use ($order,$order_items,$data2) {
                    $m->from(env('MAIL_USERNAME'), 'gorilla-state');
                    $m->to($data2["email"],'User')->subject('Order Invoice');
                   
                });
            // return redirect('/CheckOutPage/'.$order->id);
            return redirect()->route('webIndexPage')->with('message','Your Order Has Been Placed Successfully');
        }
    }
    public function paymentPage($id){
        $order = Order::findOrFail($id);
        if($order->payment_info != null && $order->payment_status != null){
            return redirect('/');
        }
        return view('front.payment',compact('order'));
    }
    public function createPage(Request $request){
        // require('/home/democustomlinks/public_html/k7track_dev/app/Stripe/vendor/autoload.php');
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        function calculateOrderAmount(array $items): int {
            // Replace this constant with a calculation of the order's amount
            // Calculate the order total on the server to prevent
            // people from directly manipulating the amount on the client
            return 1400;
        }
        // header('Content-Type: application/json');
        try {
            $order = Order::findOrfail($request->custom);
            // retrieve JSON from POST body
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);
            // Create a PaymentIntent with amount and currency
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' =>  $order->total * 100,
                'description' => 'Order Placed',
                'currency' => 'USD',
                'metadata' => [
                    'Order Number' => $order->order_number,
                    'Name' => $order->billing_first_name,
                    'Email' => $order->billing_email,
                    'Contact Number' => $order->billing_contact,
                    'Address' => $order->billing_address1 .' '. $order->billing_address2,
                    'City' => $order->billing_city,
                    'State' => $order->billing_state,
                    'Country' => $order->billing_country,
                    'Zipcode' => $order->billing_zipcode,
                  ],
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];
            echo json_encode($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function thankyouPage(Request $request){
        if ($request->method() == "POST") {
            // $product_name = array();
            // $product_price = array();
            // $product_quantity = array();
            // $username = '';
            $order = Order::findOrFail($request->custom);
            // $email =  $order->billing_email;
            // $order_items = Orderitem::where('order_id',$request->custom)->get();
            // if (Auth::check()) {
            //     $username = auth()->user()->first_name .' '. auth()->user()->last_name;
            // }
            // else{
            //     $username = 'Non Register/ Guest Profile';
            // }
            // foreach ($order_items as $key => $item) {
            //     $product_name[] = $item->name;
            //     $product_price[] = $item->price;
            //     $product_quantity[] = $item->quantity;
            // }
            // $data = array(
            //     'username' => $username,
            //     'item_quantity' => count($order_items),
            //     'total_price' => $order->total,
            //     'order_number' => $order->order_number,
            //     'billing_name' => $order->billing_first_name .' '. $order->billing_last_name,
            //     'billing_contact' => $order->billing_contact,
            //     'billing_email' => $order->billing_email,
            //     'billing_address_1' => $order->billing_address1,
            //     'billing_address_2' => $order->billing_address2,
            //     'billing_city' => $order->billing_city,
            //     'billing_state' => $order->billing_state,
            //     'billing_country' => $order->billing_country,
            //     'billing_zip' => $order->billing_zipcode,
            //     'product_name' => $product_name,
            //     'product_quantity' => $product_quantity,
            //     'product_price' => $product_price,
            //     'actionURL' => url('https://demo-customlinks.com/clarabelle-hair-boutique/login')
            // );
            // Mail::send('mail.order_mail', $data, function ($message) use ($data) {
            //     $message->to('mackasauser@gmail.com','mack')
            //         ->subject('New Order Info')
            //         ->from('info@fashion_express.com','Fashion Express');
                // });
            $order->payment_info =serialize($request->all());
            $order->payment_status ='paid';
            $order->save();
            if ($order->save()) {
                return response()->json(['success' => true,]);
            }
        }
        $banner = Banner::where('page','Thankyou')->first();
        return view('front.thankyou',compact('banner'));
    }
}