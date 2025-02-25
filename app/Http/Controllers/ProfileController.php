<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Setting;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function my_profile()
    {

        return view('site.my_profile');
    }
    public function edit_profile()
    {
        return view('site.edit_profile');
    }
    public function update_profile(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->gender = $request->gender;
        $user->birth_date = $request->birth_date;

        $user->save();

        return redirect()->route('my_profile')->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }
    public function my_account()
    {
        return view('admin.my_account');
    }
    public function settings()
    {
        $settings = Setting::first();
        return view('admin.settings', compact('settings'));
    }
    public function update_settings(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'site_name_ar' => 'required',
            'site_name_fr' => 'required',
            'site_description_ar' => 'required',
            'site_description_fr' => 'required',
            'site_logo' => 'image|mimes:png,jpg,jpeg|max:2048'
        ], [
            'site_name_ar.required' => 'حقل اسم الموقع بالعربية مطلوب',
            'site_name_fr.required' => 'حقل اسم الموقع بالفرنسية مطلوب',
            'site_description_ar.required' => 'حقل وصف الموقع بالعربية مطلوب',
            'site_description_fr.required' => 'حقل وصف الموقع بالفرنسية مطلوب',
            'site_logo.image' => 'يجب أن يكون الملف صورة',
            'site_logo.mimes' => 'يجب أن تكون الصورة من نوع: png, jpg, jpeg',
            'site_logo.max' => 'حجم الصورة يجب أن لا يتجاوز 2 ميجابايت'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $settings = Setting::firstOrCreate(['id' => 1], [
            'site_name_ar' => $request->site_name_ar ?? '',
            'site_name_fr' => $request->site_name_fr ?? '',
            'site_description_ar' => $request->site_description_ar ?? '',
            'site_description_fr' => $request->site_description_fr ?? '',
            'site_email' => $request->site_email ?? '',
            'site_phone' => $request->site_phone ?? '',
            'site_phone2' => $request->site_phone2 ?? '',
            'site_whatsapp' => $request->site_whatsapp ?? '',
            'site_address_ar' => $request->site_address_ar ?? '',
            'site_address_fr' => $request->site_address_fr ?? '',
            'site_logo' => '',
            'localisation' => $request->localisation ?? '',
            'facebook' => $request->facebook ?? '',
            'instagram' => $request->instagram ?? '',
            'twitter' => $request->twitter ?? '',
            'linkedin' => $request->linkedin ?? '',
            'youtube' => $request->youtube ?? '',
            'tiktok' => $request->tiktok ?? '',
            'telegram' => $request->telegram ?? ''
        ]);

        $settings->site_name_ar = $request->site_name_ar;
        $settings->site_name_fr = $request->site_name_fr;
        $settings->site_description_ar = $request->site_description_ar;
        $settings->site_description_fr = $request->site_description_fr;
        $settings->site_email = $request->site_email;
        $settings->site_phone = $request->site_phone;
        $settings->site_phone2 = $request->site_phone2;
        $settings->site_whatsapp = $request->site_whatsapp;
        $settings->site_address_ar = $request->site_address_ar;
        $settings->site_address_fr = $request->site_address_fr;
        $settings->localisation = $request->localisation;
        $settings->facebook = $request->facebook;
        $settings->instagram = $request->instagram;
        $settings->twitter = $request->twitter;
        $settings->linkedin = $request->linkedin;
        $settings->youtube = $request->youtube;
        $settings->tiktok = $request->tiktok;
        $settings->telegram = $request->telegram;

        if($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $extension = strtolower($file->getClientOriginalExtension());

            if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
                $filename = time() . '.' . $extension;
                $file->move(public_path('uploads'), $filename);
                $settings->site_logo = 'uploads/' . $filename;
            }
        }

        $settings->save();

        return redirect()->route('settings')->with('success', 'تم تحديث الإعدادات بنجاح');

    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
