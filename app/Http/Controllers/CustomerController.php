<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Reservation;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    function is_connected() {
        $response = null;
        system("ping -c 1 google.com", $response);
        if($response == 0) {
            return true;
        }
        return false;
    }
    public function book(){
    	return view('customer.book');
    }
    public function request(Request $request){
        if(!$this->is_connected()) return redirect("/book");
        $this->validate($request, [
            'checkin'=> 'required',
            'lname'=> 'required',
            'fname'=> 'required',
            'mname'=> 'required',
            'checkout'=> 'required',
            'contact'=> 'required',
            'gender'=> 'required',
            'room'=> 'required',
            'type'=> 'required',
            'email'=> 'required',
            'address'=> 'required',
            'dob'=> 'required'
        ]);

        $user = new Customer;
       $user->lname = $request['lname'];
       $user->fname = $request['fname'];
       $user->mname = $request['mname'];
       $user->gender = $request['gender'];
       $user->dob = $request['dob'];
       $user->address = $request['address'];
       $user->contact = $request['contact'];
       $user->email = $request['email'];
       $user->save();

        $id = $user->id;
       $find = Customer::find($id);
       $reserve = new Reservation;
       $reserve->flag = rand(123456789,98754321);
       $reserve->rooms = $request['room'];
       $reserve->type = $request['type'];
       $reserve->checkin = $request['checkin'];
       $reserve->checkout = $request['checkout'];
       $reserve->barcode = rand(123456789,98754321);
       $reserve->status = true;
       $find->reservation()->save($reserve);


       $data = array('title'=> 'Gracias por confiar en La Posada Ecologica La Abuela.',
              'content'=> 'Apreciado cliente, muchas gracias por reservar con nosotros. Por favor, escanee el siguiente código QR: '.route('reservation',['customer_id'=> $reserve->customer_id, 'flag'=> $reserve->flag]),
              'email'=> $request['email'],
              'name'=> $request['lname ']. ''. $request['fname ']. ''. $request['mname']

              );

       Mail::send('auth.email', $data, function($message) use ($data){
        $message->to($data['email'])->subject('Hola '.$data['name']);
       });

       return redirect()->route('reservation', ['customer_id'=> $reserve->customer_id, 'flag'=> $reserve->flag]);
        
    }
    public function reservation($customer_id, $flag){
      $reservation = Reservation::where('customer_id', $customer_id)->where('flag', $flag)->first();
      return view('customer.reservation', compact('reservation'));
    }
   
}
