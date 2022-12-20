{{--        //sessions--}}
@if (session()->has('Error'))
    <div class="alert alert-danger" role="alert">
        <strong>{{ session()->get('Error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('delete'))
    <div class="alert alert-danger" role="alert">
        <strong>{{ session()->get('delete') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>@endif
{{--    الطريقة الاولي لل validation--}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



{{--ده في ال controller--}}


{{--//      $input = $request->all();--}}
{{--//            //للتأكد من التسجيل مسبقا الطريقة الاولي لل validation--}}
{{--//        $intext=Sections::where('section_name','=',$input['section_name'])->exists();--}}
{{--//--}}
{{--//--}}
{{--//        if ($intext){--}}
{{--//        session()->flash('Error','هذا القسم مستخدم مسبقا');--}}
{{--//        return redirect('/sections');--}}
{{--//        }--}}
{{--//--}}
{{--//        else{--}}
{{--//            Sections::create([--}}
{{--//                'section_name' =>$request['section_name'],--}}
{{--//                'description'  =>$request['description'],--}}
{{--//                'created_by'  =>(Auth::user()->name),--}}
{{--//            ]);--}}
{{--//--}}
{{--//            session()->flash('Add','تم اضافة القسم بنجاح');--}}
{{--//            return redirect('/sections');--}}
{{--//--}}
{{--//        }--}}

{{--//        الطريقة الثانية لل validation--}}
{{--$validatedData = $request->validate([--}}
{{--'Product_name' => 'required|unique:Products|max:255',--}}
{{--'description' => 'required'],[--}}
{{--'Product_name.required'=>"يرجي ادخال اسم المنتج",--}}
{{--'Product_name.unique'=>"اسم المنتج مكرر من فضلك ادخل اسم جديد",--}}
{{--'description.required'=>"يرجي ادخال الملاحظات",--}}
{{--]);--}}






