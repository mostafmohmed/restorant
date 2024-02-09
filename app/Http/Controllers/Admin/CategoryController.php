<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vaildator=Validator::make($request->all(),[
            'name'=>'required',
            'descreption'=>'required',

        ]);
        if( $vaildator->fails()){
return response()->json([
    'status'=>400,
    'errors'=> $vaildator->messages()
]);
        }else{
            $imageName = time().'.'.$request->image->extension();
        
            $request->image->move(public_path('images'), $imageName); 
      $category= Category::create([
                'name'=>$request->name,
               'image'=>$imageName,
    
                'descreption'=>$request->descreption,
    
    
      ]);
      if($request->has('menues')){
        $category->menus()->attach($request->menues);
      }
      return response()->json([
           
        'msg' => 'تم الحفظ بنجاح',
    ]);
        }
     

      
      
// 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 
        response()->json($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoryy=Category::findOrfail($id);
           return 
            response()->json($categoryy);

         // view('admin.category.index',compact('categoryy'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 
            response()->json($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
