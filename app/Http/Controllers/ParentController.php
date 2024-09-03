<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ParentController extends Controller
{
    public function emergencyContact(){
        return view('emergencycontact');
    }

    public function pickupContacts(){
        return view('pickupcontacts');
    }

    public function myProfile(){
        return view('myprofile');
    }


    public function getPickupContacts(){

        $user = User::find(Auth::user()->id);

        $query = $user->pickupContacts;

        return DataTables::of($query)->make(true);
    }

    public function feedback(){
        return view('myfeedbackforms');
    }

    public function getMyFeedbackForms(){

        $user = User::find(Auth::user()->id);

        $query = $user->feedbackforms->map(function ($form) {
            $form->created_at_formatted = Carbon::parse($form->created_at)->isoFormat('MMMM Do, YYYY');
            return $form;
        });

        return DataTables::of($query)->make(true);
    }
}
