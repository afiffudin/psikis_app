<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();  // Mengambil semua data client
        return view('clients.index', compact('clients')); // Kembalikan data ke view
    }

    // Menampilkan form untuk menambahkan client baru
    public function create()
    {
        return view('clients.create');
    }

    // Menyimpan client baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'nullable|string',
        ]);

        // Menyimpan data client ke database
        Client::create($validated);

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('clients.index')->with('success', 'Client created successfully!');
    }

    // Menampilkan detail client
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    // Menampilkan form untuk mengedit client
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    // Memperbarui data client
    public function update(Request $request, Client $client)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'nullable|string',
        ]);

        // Update data client di database
        $client->update($validated);

        // Redirect ke halaman detail client setelah berhasil
        return redirect()->route('clients.show', $client)->with('success', 'Client updated successfully!');
    }

    // Menghapus client dari database
    public function destroy(Client $client)
    {
        // Menghapus data client dari database
        $client->delete();

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully!');
    }
}
