<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class Card_Controller extends Controller
{
    //
    function index($listId){
        Session::put('lId',$listId);
        $data = Http::get('https://api.trello.com/1/lists/'.$listId.'/cards?key=3457f595cec5cb7b827b5bd15ba5ba32&token=411cbe24ac3756deba02f12f1380f4758825b081d9fb7d2b92d011d86a5c671b')->json();

        echo "<script>console.log('card visited' );</script>"; 
        return view('Card',['cards'=>$data]);
    }

    function store(Request $req){
        $listId = $req->list_id;
         $name = $req->card_name;
         $desc = $req->card_desc;
        //return $req->input();
       
        $data = Http::post('https://api.trello.com/1/cards?name='.$name.'&desc='.$desc.'&idList='.$listId.'&key=3457f595cec5cb7b827b5bd15ba5ba32&token=411cbe24ac3756deba02f12f1380f4758825b081d9fb7d2b92d011d86a5c671b')->json();
       
        return Redirect::back();
        
    }
}
