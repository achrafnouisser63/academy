<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['site_name_ar', 'site_name_fr', 'site_description_ar', 'site_description_fr', 'site_email', 'site_phone', 'site_phone2', 'site_whatsapp', 'site_address_ar', 'site_address_fr', 'site_logo', 'localisation', 'facebook', 'instagram', 'twitter', 'linkedin', 'youtube', 'tiktok', 'telegram'];

}
