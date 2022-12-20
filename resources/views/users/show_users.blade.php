@extends('layouts.master')
@section('css')

@section('title')
    المستخدمين -ادارة الفواتير
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                المستخدمين</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

{{--@extends('sessions');--}}

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




<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">

{{--          /*******************[جدول اضافة new user]--}}

            <div class="d-flex justify-content-between">

                <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20">
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-rotate-bottom" data-toggle="modal" href="#modaldemo8">إضافة مستخدم جديد</a>
                </div>
                <div class="modal" id="modaldemo8">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">إضافة مستخدم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('users.create') }}" method="get">
                                    {{ csrf_field() }}

                                    <h6>معلومات المستخدم</h6>
                                    <div class="form-group">
                                        <label for="exampleInputName">اسم المستخدم</label>
                                        <input type="text" class="form-control" id="name" placeholder="ادخل الاسم" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">الايميل</label>
                                        <input type="email" class="form-control" id="email" placeholder="ادخل الايمل @" name="email" rows="3">
                                    </div>
                                    <div class="row mg-b-20">
                                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                            <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                                   id="password"  name="password" required="" minlength="8" type="password">
                                        </div>

{{--                                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">--}}
{{--                                            <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>--}}
{{--                                            <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"--}}
{{--                                                   id="password"  name="confirm-password" required="" type="password">--}}
{{--                                        </div>--}}
                                    </div>

                                    <div class="row row-sm mg-b-20">
                                        <div class="col-lg-6">
                                            <label class="form-label">حالة المستخدم</label>
                                            <select name="status" id="status" class="form-control  nice-select  custom-select">
                                                <option value="1">مفعل</option>
                                                <option value="0">غير مفعل</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <button class="btn ripple btn-primary" type="submit">حفظ التغييرات</button>
                                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                                <th class="wd-20p border-bottom-0">البريد الالكتروني</th>
                                <th class="wd-15p border-bottom-0"> </th>
                                <th class="wd-15p border-bottom-0">نوع المستخدم</th>
                                <th class="wd-10p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->status == 1)
                                            <span class="label text-success d-flex" >
                                                <div class="dot-label bg-success ml-2"></div>
                                            </span>
                                        @elseif($user->status ==0)
                                            <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        {{\Illuminate\Support\Facades\Auth::user()->password}}
                                    </td>

                                    <td>
{{--                                        @can('تعديل مستخدم')--}}
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info"
                                                title="تعديل"><i class="las la-pen"></i></a>
{{--                                        @endcan--}}

{{--                                        @can('حذف مستخدم')--}}
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-user_id="{{ $user->id }}" data-username="{{ $user->name }}"
                                                data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                                    class="las la-trash"></i></a>
{{--                                        @endcan--}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف المستخدم</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('users.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <input class="form-control" name="username" id="username" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

<script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var user_id = button.data('user_id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #username').val(username);
    })

</script>


@endsection
