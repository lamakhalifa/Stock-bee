<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

      
        return back()->with('success', 'تم إرسال رسالتك بنجاح');
    }
}
 