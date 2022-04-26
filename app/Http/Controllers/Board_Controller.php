<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;


class Board_Controller extends Controller
{
    //
    function index(){
        $data = Http::get('https://api.trello.com/1/organizations/userworkspacedefault11/boards?key=3457f595cec5cb7b827b5bd15ba5ba32&token=411cbe24ac3756deba02f12f1380f4758825b081d9fb7d2b92d011d86a5c671b')->json();

        echo "<script>console.log('board visited' );</script>"; 
        return view('Board',['boards'=>$data]);
    }

    function store(Request $req){
        $name = $req->board_name;
        $desc = $req->board_desc;


        $data = Http::post('https://api.trello.com/1/boards/?name='.$name.'&desc='.$desc.'&defaultLists=true&key=3457f595cec5cb7b827b5bd15ba5ba32&token=411cbe24ac3756deba02f12f1380f4758825b081d9fb7d2b92d011d86a5c671b')->json();

        return Redirect::back();
        
    }

    function update(Request $req){
        $boardId = $req->update_board_id;
        $name = $req->update_board_name;
        $desc = $req->update_board_desc;


        $data = Http::put('https://api.trello.com/1/boards/'.$boardId.'?name='.$name.'&desc='.$desc.'&defaultLists=true&key=3457f595cec5cb7b827b5bd15ba5ba32&token=411cbe24ac3756deba02f12f1380f4758825b081d9fb7d2b92d011d86a5c671b')->json();

        return Redirect::back();
        
    }

    function delete($boardId){

        $data = Http::delete('https://api.trello.com/1/boards/'.$boardId.'?key=3457f595cec5cb7b827b5bd15ba5ba32&token=411cbe24ac3756deba02f12f1380f4758825b081d9fb7d2b92d011d86a5c671b')->json();
        return Redirect::back();
    }
}
