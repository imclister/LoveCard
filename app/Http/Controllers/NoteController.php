<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Card;
use Illuminate\Support\Facades\Session;




class NoteController extends Controller
{
    public function index() {

    }
    public function create(Request $request) {

        $Note = new Note;
        $Note->card_id = Session::get('card_id');
        $Note->note = $request->loveNote;
        $Note->status = 'Unread';
        $Note->save();

        return response()->json(['status' => 200, 'message' => 'Note saved!']);


    }
    public function view() {

        $cardID = Session::get('card_id');
        $Card   = Card::findOrFail($cardID);
        $partnerCardID = $Card->card_id;


        $UnreadNotes = Note::where('card_id', $partnerCardID)
                     ->where('status', 'Unread')
                     ->orderBy('created_at', 'desc')
                     ->get(['Note', 'created_at']);

        $TopNotes = Note::orderBy('created_at', 'desc')
                        ->limit(15 - $UnreadNotes->count())
                        ->get(['Note', 'created_at']);

        $Notes = $UnreadNotes->union($TopNotes)->pluck('Note', 'created_at');



        Note::where('card_id', $partnerCardID)->update(['status' => 'Read']);


        return view('notes')->with(['Notes' => $Notes]);
    }
}
