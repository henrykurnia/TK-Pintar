<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;

class HeroController extends Controller
{
    public function getHeroImages()
    {
        return HeroSection::oldest()->get(['id', 'image_path', 'created_at']);
    }
}