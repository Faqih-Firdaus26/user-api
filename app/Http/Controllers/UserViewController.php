<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserViewController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_URL', 'http://localhost:8000/api/users');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $response = Http::get($this->apiUrl);
            
            // Jika API gagal
            if ($response->failed()) {
                return back()->with('error', 'Gagal mengambil data pengguna dari API');
            }
            
            $users = $response->json();
            return view('users.index', compact('users'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:8',
                'age' => 'required|integer|min:18',
            ]);

            $response = Http::post($this->apiUrl, $validated);

            if ($response->successful()) {
                return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan!');
            }

            // Tampilkan pesan error dari API jika ada
            return back()->withErrors($response->json())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $response = Http::get("{$this->apiUrl}/{$id}");

            if ($response->failed()) {
                return redirect()->route('users.index')->with('error', 'Pengguna tidak ditemukan');
            }

            $user = $response->json();
            return view('users.show', compact('user'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $response = Http::get("{$this->apiUrl}/{$id}");

            if ($response->failed()) {
                return redirect()->route('users.index')->with('error', 'Pengguna tidak ditemukan');
            }

            $user = $response->json();
            return view('users.edit', compact('user'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'age' => 'required|integer|min:18',
            ]);

            $response = Http::put("{$this->apiUrl}/{$id}", $validated);

            if ($response->successful()) {
                return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui!');
            }

            return back()->withErrors($response->json())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $response = Http::delete("{$this->apiUrl}/{$id}");

            if ($response->successful()) {
                return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus!');
            }

            return back()->with('error', 'Gagal menghapus pengguna.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}