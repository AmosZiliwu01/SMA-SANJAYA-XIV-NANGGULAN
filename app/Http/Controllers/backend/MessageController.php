<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::paginate(5);
        return view('backend.message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Kosong karena belum digunakan
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string|max:255',
        ]);

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'is_read' => 0,
        ]);

        return redirect()->route('message.index')->with('success', 'Data pesan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        // Kosong karena belum digunakan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        // Kosong karena belum digunakan
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Message $message)
    {
        // Kosong karena belum digunakan
    }

    /**
     * Remove the specified resource from storage.
     */
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

        // Kirim email ke pengirim pesan
        Mail::raw($request->reply, function ($mail) use ($message) {
            $mail->to($message->email)
                ->subject('Balasan dari Admin');
        });

        $message->is_read = 1;
        $message->save();

        return redirect()->back()->with('success', 'Balasan berhasil dikirim lewat email.');
    }
}
