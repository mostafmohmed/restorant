<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class querycontroller extends Controller
{
    public function index(){
        // $table=Table::where([
        //     ['name','cccc'],
        //     // ['status','Avalaiable'],

        // ])->get();
         // $table=Table::where([
        //     ['name','cccc'],
        //     // ['status','Avalaiable'],

        
//          $table=Table::where(function ($q){
// $q->where('name','cccc');
//          })->get();
       
//$table=Table::select('name',DB::raw('count(*) as total'))->groupBy('name')->orderBy('name')     ->get();
//$table=Table::select('name','id')->whereIn('name',['cccc','xxxxxx'])->orderBy('name','DESC')     ->get();
//$table=Reservation::select('name','guest_number')->whereBetween('guest_number',[3,11])->orderBy('guest_number','DESC') ->limit(2)    ->get();
$table= Reservation::rightJoin('tables','tables.id','=','reservations.table_id')->get();
        return  $table;
    }
}
