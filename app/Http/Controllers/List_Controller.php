<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class List_Controller extends Controller
{
    //
    function index($boardId){
        Session::put('bId',$boardId);
        $data = Http::get('https://api.trello.com/1/boards/'.$boardId.'/lists?key=3457f595cec5cb7b827b5bd15ba5ba32&token=411cbe24ac3756deba02f12f1380f4758825b081d9fb7d2b92d011d86a5c671b')->json();

        echo "<script>console.log('list visited' );</script>"; 
        return view('List',['lists'=>$data]);
    }

    function store(Request $req){
        $boardId = $req->board_id;
         $name = $req->list_name;
        // $desc = $req->board_desc;
        //return $req->input();
       
        $data = Http::post('https://api.trello.com/1/lists?name='.$name.'&idBoard='.$boardId.'&key=3457f595cec5cb7b827b5bd15ba5ba32&token=411cbe24ac3756deba02f12f1380f4758825b081d9fb7d2b92d011d86a5c671b')->json();
       
        return Redirect::back();
        
    }
}
