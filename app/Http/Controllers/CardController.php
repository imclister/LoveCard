<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Session;


use Illuminate\Support\Str;


class CardController extends Controller
{
    public function create(Request $request)
    {

        // $validatedData = $request->validate([
        //     'Owner' => 'required|string|max:120',
        //     'Nickname' => 'required|string|max:120',
        //     'Status' => 'required|string|max:25',
        //     'Mood' => 'required|string|max:20',
        //     'IsPasswordProtected' => 'required|boolean',
        //     'password' => 'nullable|string|max:64',
        // ]);

        // $card->Owner = $validatedData['Owner'];

        $Maleuser = User::create([
            'name' => $request->male_name,
            'email' => $request->male_name . '@lovecard'
        ]);
        $Femaleuser = User::create([
            'name' => $request->female_name,
            'email' => $request->female_name . '@lovecard'
        ]);


        $Malecard = new Card();
        $Femalecard = new Card();

        $MalecardHash = Str::random(20);
        $FemalecardHash = Str::random(20);


        $Malecard->Hash = $MalecardHash;
        $Malecard->user_id = $Maleuser->id;
        $Malecard->Owner = $request->male_name;
        $Malecard->Nickname = $request->male_nickname;
        $Malecard->Status = 'Active';
        $Malecard->Mood = 'Happy';
        $Malecard->IsPasswordProtected = 0;


        $Femalecard->Hash = $FemalecardHash;
        $Femalecard->user_id = $Femaleuser->id;
        $Femalecard->Owner = $request->female_name;
        $Femalecard->Nickname = $request->female_nickname;
        $Femalecard->Status = 'Active';
        $Femalecard->Mood = 'Happy';
        $Femalecard->IsPasswordProtected = 0;
        $Femalecard->save();

        $Malecard->card_id = $Femalecard->id;
        $Malecard->save();

        $Femalecard->card_id = $Malecard->id;
        $Femalecard->save();



        echo 'done';



    }
    public function scan(Request $request)
    {
        $Card   = Card::where('hash', $request->hash)->first();
        $Notes  = Note::where('card_id', $Card->card_id)
                    ->get(['Note', 'Status', 'created_at']);

        Session::put('card_id', $Card->id);

        if($Card->IsPasswordProtected == 0)
        {
            return view('initialLogin');
        } else{
            return view('home')->with(['Card' => $Card, 'Notes' => $Notes]);
        }

    }
    public function addpassword(Request $request)
    {
        $newpassword = $request->password;
        $confirmpassword = $request->confirmpassword;

        //Update the Card's isPasswordProtected value
        $Card = Card::findOrFail(session('card_id'));
        $Card->IsPasswordProtected = 1;
        $Card->save();

        //Update the card user's password
        $User = $Card->user;
        $User->password = bcrypt($newpassword);
        $User->save();

        echo 'done';




    }


}
