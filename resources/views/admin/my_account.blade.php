@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الإعدادات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إعدادات الحساب</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">رقم الهاتف</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="address">العنوان</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}">
                        </div>
                        <div class="form-group">
                            <label for="city">المدينة</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ Auth::user()->city }}">
                        </div>
                        <div class="form-group">
                            <label for="country">الدولة</label>
                            <input type="text" class="form-control" id="country" name="country" value="{{ Auth::user()->country }}">
                        </div>
                        <div class="form-group">
                            <label for="gender">الجنس</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>ذكر</option>
                                <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>أنثى</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">تاريخ الميلاد</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ Auth::user()->birth_date }}">
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
