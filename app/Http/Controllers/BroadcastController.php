<?php

namespace App\Http\Controllers;

use App\Mail\BroadcastMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class BroadcastController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create()
    {
        $usersCount = User::where('role', 'user')->count();
        return view('broadcast.create', compact('usersCount'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        try {
            $users = User::where('role', 'user')
                ->where('email', 'NOT LIKE', '%@example.%')
                ->get();

            if ($users->isEmpty()) {
                return redirect()->back()->with('error', 'Tidak ada user dengan email valid yang ditemukan.');
            }

            $sentCount = 0;
            $failedEmails = [];

            foreach ($users as $user) {
                try {
                    $personalizedContent = "Halo {$user->name},\n\n" . $request->content;

                    Mail::to($user->email)->send(new BroadcastMail(
                        $request->subject,
                        $personalizedContent
                    ));

                    $sentCount++;

                    Log::info("Email berhasil dikirim ke: {$user->email}");

                    // Delay kecil untuk menghindari rate limit
                    usleep(500000); // 0.5 second

                } catch (\Exception $e) {
                    $failedEmails[] = $user->email;
                    Log::error("Gagal mengirim email ke {$user->email}: " . $e->getMessage());
                }
            }

            $message = "✅ Broadcast email berhasil dikirim ke {$sentCount} users!";

            if (!empty($failedEmails)) {
                $message .= "\n❌ Gagal dikirim ke: " . implode(', ', $failedEmails);
            }

            return redirect()->route('dashboard')->with('success', $message);

        } catch (\Exception $e) {
            Log::error('Broadcast error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }
}