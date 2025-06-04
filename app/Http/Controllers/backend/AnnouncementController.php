<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Announcement::with('user')->orderBy('created_at', 'desc');

        if (auth()->user()->role !== 'administrator') {
            $query->where('user_id', auth()->id());
        }

        $announcements = $query->paginate(5);

        return view('backend.announcement.index', compact('announcements'));
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
            $validate = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            Announcement::create([
                'title' => $validate['title'],
                'content' => $validate['content'],
                'user_id' => Auth::id(),
            ]);

            $this->logActivity('Menambahkan pengumuman baru: ' . $request->name);

            return redirect()->route('announcement.index')->with('success', 'Pengumuman berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        try {
            $validate = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            $announcement->update([
                'title' => $validate['title'],
                'content' => $validate['content'],
            ]);

            $this->logActivity('Memperbarui pengumuman: ' . $announcement->title);

            return redirect()->route('announcement.index')->with('success', 'Pengumuman berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        try {
            $announcement->delete();
            $this->logActivity('Menghapus pengumuman: ' . $announcement->title);
            return redirect()->route('announcement.index')->with('success', 'Pengumuman berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
