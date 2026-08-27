<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $categories = Faq::where('is_active', true)->pluck('category')->unique()->values();
        $faqs = Faq::where('is_active', true)->orderBy('order')->get();

        return view('faq.index', compact('categories', 'faqs'));
    }
}
