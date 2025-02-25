@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الإعدادات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الإعدادات العامة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="site_name_ar">اسم الموقع بالعربية</label>
                            <input type="text" class="form-control @error('site_name_ar') is-invalid @enderror" id="site_name_ar" name="site_name_ar" value="{{ $settings->site_name_ar ?? '' }}" dir="rtl">
                            @error('site_name_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="site_name_fr">اسم الموقع بالفرنسية</label>
                            <input type="text" class="form-control @error('site_name_fr') is-invalid @enderror" id="site_name_fr" name="site_name_fr" value="{{ $settings->site_name_fr ?? '' }}">
                            @error('site_name_fr')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="site_description_ar">وصف الموقع بالعربية</label>
                            <textarea class="form-control @error('site_description_ar') is-invalid @enderror" id="site_description_ar" name="site_description_ar" rows="3">{{ $settings->site_description_ar ?? '' }}</textarea>
                            @error('site_description_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="site_description_fr">وصف الموقع بالفرنسية</label>
                            <textarea class="form-control @error('site_description_fr') is-invalid @enderror" id="site_description_fr" name="site_description_fr" rows="3">{{ $settings->site_description_fr ?? '' }}</textarea>
                            @error('site_description_fr')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="site_email">البريد الإلكتروني للموقع</label>
                            <input type="email" class="form-control @error('site_email') is-invalid @enderror" id="site_email" name="site_email" value="{{ $settings->site_email ?? '' }}">
                            @error('site_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="site_phone">رقم الهاتف</label>
                            <input type="text" class="form-control @error('site_phone') is-invalid @enderror" id="site_phone" name="site_phone" value="{{ $settings->site_phone ?? '' }}">
                            @error('site_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="site_phone2">رقم الهاتف الثاني</label>
                            <input type="text" class="form-control @error('site_phone2') is-invalid @enderror" id="site_phone2" name="site_phone2" value="{{ $settings->site_phone2 ?? '' }}">
                            @error('site_phone2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="site_whatsapp">رقم الواتساب</label>
                            <input type="text" class="form-control @error('site_whatsapp') is-invalid @enderror" id="site_whatsapp" name="site_whatsapp" value="{{ $settings->site_whatsapp ?? '' }}">
                            @error('site_whatsapp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="site_address_ar">عنوان الاكاديمية بالعربية</label>
                            <input type="text" class="form-control @error('site_address_ar') is-invalid @enderror" id="site_address_ar" name="site_address_ar" value="{{ $settings->site_address_ar ?? '' }}">
                            @error('site_address_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="site_address_fr">عنوان الاكاديمية بالفرنسية</label>
                            <input type="text" class="form-control @error('site_address_fr') is-invalid @enderror" id="site_address_fr" name="site_address_fr" value="{{ $settings->site_address_fr ?? '' }}">
                            @error('site_address_fr')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="site_logo">شعار الموقع</label>
                            <input type="file" class="form-control @error('site_logo') is-invalid @enderror" id="site_logo" name="site_logo">
                            @error('site_logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if($settings->site_logo ?? '')
                                <img src="{{ asset($settings->site_logo) }}" alt="Site Logo" style="max-width: 200px; margin-top: 10px;">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="localisation">رابط خريطة جوجل</label>
                            <input type="text" class="form-control @error('localisation') is-invalid @enderror" id="localisation" name="localisation" value="{{ $settings->localisation ?? '' }}">
                            @error('localisation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="facebook">رابط فيسبوك</label>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ $settings->facebook ?? '' }}">
                            @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="instagram">رابط انستغرام</label>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ $settings->instagram ?? '' }}">
                            @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="twitter">رابط تويتر</label>
                            <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{ $settings->twitter ?? '' }}">
                            @error('twitter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="linkedin">رابط لينكد إن</label>
                            <input type="text" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" value="{{ $settings->linkedin ?? '' }}">
                            @error('linkedin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="youtube">رابط يوتيوب</label>
                            <input type="text" class="form-control @error('youtube') is-invalid @enderror" id="youtube" name="youtube" value="{{ $settings->youtube ?? '' }}">
                            @error('youtube')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tiktok">رابط تيك توك</label>
                            <input type="text" class="form-control @error('tiktok') is-invalid @enderror" id="tiktok" name="tiktok" value="{{ $settings->tiktok ?? '' }}">
                            @error('tiktok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telegram">رابط تيليجرام</label>
                            <input type="text" class="form-control @error('telegram') is-invalid @enderror" id="telegram" name="telegram" value="{{ $settings->telegram ?? '' }}">
                            @error('telegram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
@endsection
