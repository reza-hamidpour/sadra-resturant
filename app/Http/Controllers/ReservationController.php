<?php

namespace App\Http\Controllers;

use App\Models\DeskInformation;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    public function index(){
        $desks_information = DeskInformation::where('status', 1)->get();
        return view('client-side.pages.reservation', compact('desks_information'));
    }


    public function reservation(Request $request){
        $desk_information_ids = DeskInformation::where('status', 1)->get()->pluck('id')->toArray();
        $validation = [
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'reservation_date' => 'required|string',
            'reservation_from' => 'required|string',
            'reservation_to' => 'required|string',
            'desk_information' => ['required', Rule::in($desk_information_ids)],
            'comment' => 'nullable|string',
        ];


        $request->validate($validation);

        $reservation = new Reservation();
        $reservation->name =  $request->name;
        $reservation->phone_number= $request->phone_number;
        $reservation->reserve_date = $request->reservation_date;
        $reservation->from = $request->reservation_from;
        $reservation->to = $request->reservation_to;
        $reservation->party_size = $request->party_size;
        $request->desk_number = $request->desk_information;
        $request->reservation_status = 0;


        try{
            $reservation->save();
            return response()->json([
               'status_code' => 200,
               'status' => 'success',
               'msg' => 'Your request has successfully reserved, see you on ' . $request->reservation_date . ' at ' . $request->reservation_from,
            ]);
        }catch(\Exception $e){

            return response()->json([
               'status_code' => 200,
               'status' => 'danger',
                'msg' => $e,
//               'msg' => 'You request did not set at this time, please contact with our Customer service.',
            ]);
        }
    }

}
