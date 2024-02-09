<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rev=Reservation::all();
        return view('admin.Reservation.index',compact('rev'));
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
            'first_name'=>'required',
            'last_name'=>'required',
'email'=>'required',
'tel_number'=>'required',
'res_data'=>'required',
'table_id'=>'required',
        ]);
       
        if ($vaildator->passes()) {
            $re=  Reservation::create(
                $request->all()
             );
            return response()->json(['success'=>'Added new records.'])

            ;
          
        
        }return response()->json(['error'=>$vaildator->errors()->all(),'status'=>400],);
     
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rev=Reservation::findOrfail($id);
        return 
         response()->json([
            'rev'=> $rev
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $rev =Reservation::findOrfail($request->id);
        $revs=  $rev->update($request->all());
        if($revs){  return 
            response()->json([
               'sucess'=> "sucess"
               
            ]); }
      
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
