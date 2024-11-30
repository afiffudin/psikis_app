<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\SessionReminder;


class UserController extends Controller
{
    public function sendReminder(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = $request->user();

        // Kirim notifikasi ke pengguna
        $user->notify(new SessionReminder());

        return response()->json(['message' => 'Notification sent!'], 200);
    }
}
