<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('questions/setting');
    }
    public function store(Request $request)
    {
        $request->validate([
            'themeColor' => 'required|string',
        ]);

        session(['themeColor' => $request->themeColor]);

        return redirect()->back()->with('success', 'Warna tema berhasil diperbarui!');
    }
    
}
