<?php

namespace App\Http\Controllers;

use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inputs = Sections::all();
        return view('sections/sections',compact('inputs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //        الطريقة الثانية لل validation
        $validatedData = $request->validate([
            'section_name' => 'required|unique:sections|max:255',
            'description' => 'required'],[
                'section_name.required'=>"يرجي ادخال اسم القسم",
                'section_name.unique'=>"اسم القسم مكرر من فضلك ادخل اسم جديد",
                'description.required'=>"يرجي ادخال الملاحظات",
        ]);

        Sections::create([
            'section_name' =>$request['section_name'],
            'description'  =>$request['description'],
            'created_by'  =>(Auth::user()->name),
        ]);

        session()->flash('Add','تم اضافة القسم بنجاح');
        return redirect('/sections');
//
//      $input = $request->all();
//            //للتأكد من التسجيل مسبقا الطريقة الاولي لل validation
//        $intext=Sections::where('section_name','=',$input['section_name'])->exists();
//
//
//        if ($intext){
//        session()->flash('Error','هذا القسم مستخدم مسبقا');
//        return redirect('/sections');
//        }
//
//        else{
//            Sections::create([
//                'section_name' =>$request['section_name'],
//                'description'  =>$request['description'],
//                'created_by'  =>(Auth::user()->name),
//            ]);
//
//            session()->flash('Add','تم اضافة القسم بنجاح');
//            return redirect('/sections');
//
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Sections $sections)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Sections $sections)
    {
        //
    }


    public function update(Request $request)
    {
        return $request;
//        $id = $request->id;
//
//        $this->validate($request, [
//            'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
//            'description' => 'required',
//        ],[
//
//            'section_name.required' =>'يرجي ادخال اسم القسم',
//            'section_name.unique' =>'اسم القسم مسجل مسبقا',
//            'description.required' =>'يرجي ادخال البيان',
//
//        ]);
//
//        $sections = sections::find($id);
//        $sections->update([
//            'section_name' => $request->section_name,
//            'description' => $request->description,
//        ]);
//
//        session()->flash('edit','تم تعديل القسم بنجاج');
//        return redirect('/sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        sections::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/sections');
    }
}
