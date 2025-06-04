<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Agenda::with('user')->latest();
        if (auth()->user()->role !== 'administrator') {
            $query->where('user_id', auth()->id());
        }
        $agendas = $query->paginate(5);

        return view('backend.agenda.index', compact('agendas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'place' => 'required|string|max:255',
                'time' => 'required|string|max:255',
                'note' => 'nullable|string',
            ]);

            Agenda::create([
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'place' => $request->place,
                'time' => $request->time,
                'note' => $request->note,
                'author' => Auth::user()->name,
                'user_id' => Auth::id(),
            ]);

            $this->logActivity('Menambahkan agenda baru: ' . $request->name);

                return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan.');
            } catch (\Exception $e) {
                return redirect()->back()  ->with('error', 'Terjadi kesalahan saat menambahkan agenda. Silakan coba lagi.'. $e->getMessage());
        }
     }


    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
                $request->validate([
                    'author' => 'required|string|max:255',
                    'start_date' => 'required|date',
                    'end_date' => 'required|date|after_or_equal:start_date',
                    'place' => 'required|string|max:255',
                    'time' => 'required|string|max:50',
                    'description' => 'required|string',
                ]);

                // Cari data agenda berdasarkan ID
                $agenda = Agenda::findOrFail($id);

                // Update data agenda
                $agenda->name = $request->author;
                $agenda->start_date = $request->start_date;
                $agenda->end_date = $request->end_date;
                $agenda->place = $request->place;
                $agenda->time = $request->time;
                $agenda->description = $request->description;

                // Jika ada relasi user_id, misalnya dari auth user
                if (auth()->check()) {
                    $agenda->user_id = auth()->id();
                }

                $agenda->save();

                $this->logActivity('Memperbarui agenda: ' . $agenda->name);

                // Redirect kembali dengan pesan sukses
                return redirect()->back()->with('success', 'Agenda berhasil diperbarui.');
            } catch (\Exception $e) {
                return redirect()->back()   ->with('error', 'Terjadi kesalahan saat memperbarui agenda. Silakan coba lagi.' . $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $agenda = Agenda::findOrFail($id);
            $agenda->delete();

            $this->logActivity('Menghapus agenda: ' . $agenda->name);

            return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus Agenda: ' . $e->getMessage());
        }
    }

}
