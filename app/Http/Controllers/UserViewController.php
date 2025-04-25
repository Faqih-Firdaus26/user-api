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
        //
        $response = Http::get($this->apiUrl);

        // Jika API gagal
        if ($response->failed()) {
            return back()->with('error', 'Failed to fetch users');
        }

        $users = $response->json();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'age' => 'required|integer|min:18',  // Menambahkan validasi umur minimal
        ]);

        $response = Http::post($this->apiUrl, $validated);

        if ($response->successful()) {
            return redirect()->route('users.index')->with('success', 'User created!');
        }

        return back()->withErrors($response->json())->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $response = Http::get("{$this->apiUrl}/{$id}");

        if ($response->failed()) {
            abort(404, 'User not found');
        }

        $user = $response->json();
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $response = Http::get("{$this->apiUrl}/{$id}");

        if ($response->failed()) {
            abort(404, 'User not found');
        }

        $user = $response->json();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'age' => 'required|integer|min:18',
        ]);

        $response = Http::put("{$this->apiUrl}/{$id}", $validated);

        if ($response->successful()) {
            return redirect()->route('users.index')->with('success', 'User updated!');
        }

        return back()->withErrors($response->json())->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $response = Http::delete("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            return redirect()->route('users.index')->with('success', 'User deleted!');
        }

        return back()->with('error', 'Failed to delete user.');
    }
}