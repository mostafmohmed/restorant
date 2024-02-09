<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\menueRequest;
use App\Models\Menue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menue=Menue::all();
        return view('admin.menues.index',compact('menue'));
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
            'descreption'=>'required',
'price'=>'required',
'image'=>'required',
        ]);
        if( $vaildator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $vaildator->messages()
            ]);
        
       
    }
        $imageName = time().'.'.$request->image->extension();
        
        $request->image->move(public_path('images'), $imageName); 

      
      Menue::create([
            'name'=> $request->name,
            'image'=> $imageName,
            
           'descreption'=>     $request->descreption      ,
           'price'=>    $request->price     ,

        ]);
        if($request->has('categories')){
            $menue=new Menue;
            $menue->catagory()->attach($request->categories);
            // echo $request->categorie_id;
            // return response()->json();
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return response()->json($id);
          $menue=Menue::findOrFail($id);
         return view('admin.menues.show',compact('menue'));
    //  return response()->json([
    //     'menue'=> $id
    //  ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menue=Menue::findOrfail($id);
        return 
         response()->json([
            'menue'=> $menue
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        $menue =Menue::findOrfail($request->id);
        $menues =Menue::findOrfail($request->id);




        if($request->has('image')){        
           
  
            //code for remove old file
             if(\File::exists(public_path('images/'.$menue->image))){
                //  $file_old = $path.$menue->image;
                //  unlink($file_old);
                \File::delete(public_path('images/'.$menue->image));
            }
  
            //upload new file
            //  $file = $request->image;
            $imageName = time().'.'.$request->image->extension();
            // $filename = $file->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName); 
  
            //for update in table
            $menue->update([
                'image'=>$imageName
            ]);
       }
  







        // if($request->has('image')){
        //     $imageName = time().'.'.$request->image->extension();
        //     $request->image->move(public_path('images'), $imageName); 
        //     $menue->update([
        //         'image'=>$imageName
        //     ]);
       
        // }
      $menus=  $menue->update($request->all());
        if($menus){
            if ($request->has('categories')) {
                $menues->catagory()->sync($request->categories);
            }
            return 
            response()->json([
               'sucess'=>"the sucess update",
               'status'=>'sucsess'
            ]);
        }else{
            return 
            response()->json([
               'sucess'=>"the sucess update",
               'status'=>'fail'
            ]);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menue =Menue::findOrfail($id);
        $menue->catagory()->detach();
        $menue->delete();
        return 
        response()->json([
           'sucess'=>"the delete sucess",
           'status'=>200,
        ]);
    }
}
