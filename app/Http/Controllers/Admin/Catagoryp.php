<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class Catagoryp extends Controller
{
    public function destroy($id)
    {
        $catagory = Category::find($id);
        if($catagory)
        {
            $catagory->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Student Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }
    }
    public function update(Request $request,$id){
        $vaildator=Validator::make($request->all(),[
            'name'=>'required',
            'descreption'=>'required',

        ]);
        $catagory= Category::find($id);
        // return response()->json([
        //     'sucess'=>$catagory
        //             ]);




        
//         if( $vaildator->fails()){
// return response()->json([
//     'status'=>400,
//     'errors'=> $vaildator->messages()
// ]);




   
    if( $vaildator->fails()){
    return response()->json([
        'status'=>400,
            'errors'=> $vaildator->messages()
                ]);
            }


            else{

                $catagory->name=$request->name;
                $catagory->descreption=$request->descreption;
                $catagory->save();
                return response()->json([
                    'status'=>200,
                    'catagory'=>$catagory
                       
                            ]);
            }
           
    }
    public function post($id){
        $catagory=Category::find($id);
        if($catagory)
        {
            return response()->json([
                'status'=>200,
                'catagory'=> $catagory,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }
      
        // $catagory=Category::find($request->id);
        // return response()->json([
        //     'catagory'=>$catagory
        //             ]);
        // $catagory->name=$request->name;
        // $catagory->descreption=$request->descreption;
        // $catagory->image=$request->file('image');
        // $catagory->save();
       
        // return   ;
        // view('admin.category.edite',compact('catagory'));
     }
      
     function fetch(){
        $catagory=Category::all();
        return response()->json([
'catagory'=>$catagory
        ]);
     }
}