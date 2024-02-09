<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menue;
use Illuminate\Support\Facades\Validator;
use App\Models\Table;
use Illuminate\Http\Request;

use function Laravel\Prompts\table;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table=Table::all();
        return view('admin.table.index',compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vaildator=Validator::make($request->all(),[
            'name'=>'required',
            'guest_number'=>'required',
'status'=>'required',
'location'=>'required',
        ]);
        if( $vaildator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $vaildator->messages()
            ]);
        
       
    }
    Table::create($request->all());
    return response()->json("sucess create");
    
    }
    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $table=Table::findOrfail($id);
        return 
         response()->json([
            'table'=> $table
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       
        $menue =Table::findOrfail($request->id);
       
      $menus=  $menue->update($request->all());
        if($menus){
            return 
            response()->json([
               'sucess'=>"the sucess update",
               'status'=>'sucsess'
            ]);
        }else{
            return 
            response()->json([
             
               'status'=>'fail'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delett(string $id)
    {
        $table =Table::findOrfail($id);
        $table->delete();
        return 
        response()->json([
           'sucess'=>"the delete sucess",
           'status'=>200,
        ]);
    }
}
