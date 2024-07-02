<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // Tampilkan halaman pembayaran
        return view('layouts.payment');
    }

    public function processPayment(Request $request)
    {
        // Proses pembayaran berdasarkan data dari $request
        // Misalnya: validasi pembayaran, simpan transaksi, dll.
        // Contoh sederhana: simpan transaksi ke database

        // Ambil data dari form pembayaran
        $data = $request->all();

        // Proses validasi, misalnya:
        // $this->validate($request, [
        //     'nama' => 'required',
        //     'jumlah' => 'required|numeric',
        // ]);

        // Simpan transaksi ke database
        // Transaksi::create([
        //     'nama' => $data['nama'],
        //     'jumlah' => $data['jumlah'],
        // ]);

        // Redirect dengan pesan sukses atau error
        return redirect()->back()->with('success', 'Pembayaran berhasil diproses.');
    }
}
