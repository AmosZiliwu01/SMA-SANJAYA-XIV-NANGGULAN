<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('backend.message.index', compact('messages'));
    }

    public function destroy($id)
    {
        try {
            $message = Message::findOrFail($id);
            $message->delete();

            $this->logActivity('Menghapus data pesan: ' . $message->name);

            return redirect()->back()->with('success', 'Pesan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus pesan: ' . $e->getMessage());
        }
    }
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $message = Message::findOrFail($id);

        $emailContent = $request->reply . "\n\n" .
            "---\n" .
            "Pesan ini adalah balasan otomatis dari admin. " .
            "Pesan Anda telah kami terima dan tidak perlu dibalas kembali.\n\n" .
            "Jika Anda memerlukan bantuan lebih lanjut, silakan hubungi kami melalui:\n" .
            "Email: sma_sanjaya14@yahoo.com\n" .
            "WhatsApp: [Nomor WA SMA]\n\n" .
            "Terima kasih atas perhatian Anda.\n" .
            "Tim Admin SMA Sanjaya";

        Mail::raw($emailContent, function ($mail) use ($message) {
            $mail->to($message->email)
                ->subject('Balasan dari Admin - SMA Sanjaya');
        });

        $message->reply = $request->reply;
        $message->is_read = 1;
        $message->save();

        return redirect()->back()->with('success', 'Balasan berhasil dikirim lewat email dengan informasi kontak.');
    }
}
