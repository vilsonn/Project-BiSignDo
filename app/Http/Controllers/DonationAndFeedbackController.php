<?php

namespace App\Http\Controllers;

use App\Models\DonationAndFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DonationAndFeedbackController extends Controller
{
    /**
     * Display a listing of the resource for admin management.
     */
    public function index()
    {
        $donationsAndFeedbacks = DonationAndFeedback::with('user')->latest()->paginate(10);
        return view('admin.donation_feedback.index', compact('donationsAndFeedbacks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'donation_amount' => 'nullable|numeric|min:1',
            'payment_method' => 'required|string|max:50',
            'proof_of_payment' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'developer_message' => 'nullable|string',
            'feedback_content' => 'nullable|string',
            'feedback_type' => 'required|string|max:50',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        // Upload image jika ada
        $proofOfPaymentPath = $request->file('proof_of_payment') ? $request->file('proof_of_payment')->store('proof_of_payments', 'public') : null;

        DonationAndFeedback::create(array_merge($data, ['proof_of_payment' => $proofOfPaymentPath]));

        return redirect()->back()->with('success', 'Donasi dan Feedback berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    
    {
        $donationAndFeedback = DonationAndFeedback::with('user')->findOrFail($id);
        return view('admin.donation_feedback.show', compact('donationAndFeedback'));
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $donationAndFeedback = DonationAndFeedback::findOrFail($id);
        return view('admin.donation_feedback.edit', compact('donationAndFeedback'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $donationAndFeedback = DonationAndFeedback::findOrFail($id);
    
        // Validasi input dari form
        $validatedData = $request->validate([
            'donation_amount'    => 'nullable|numeric|min:1',
            'payment_method'     => 'required|string|max:50',
            'proof_of_payment'   => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'developer_message'  => 'nullable|string|max:1000',
            'feedback_content'   => 'nullable|string|max:2000',
            'feedback_type'      => 'required|string|max:50',
        ]);
    
        // Proses upload gambar proof_of_payment jika ada file yang diupload
        if ($request->hasFile('proof_of_payment')) {
            // Hapus file lama jika ada
            if ($donationAndFeedback->proof_of_payment && Storage::disk('public')->exists($donationAndFeedback->proof_of_payment)) {
                Storage::disk('public')->delete($donationAndFeedback->proof_of_payment);
            }
    
            // Simpan file baru dan ambil path-nya
            $proofOfPaymentPath = $request->file('proof_of_payment')->store('proof_of_payments', 'public');
        } else {
            // Jika tidak ada gambar baru, gunakan gambar yang lama
            $proofOfPaymentPath = $donationAndFeedback->proof_of_payment;
        }
    
        // Update data di database
        $donationAndFeedback->update(array_merge($validatedData, ['proof_of_payment' => $proofOfPaymentPath]));
    
        // Redirect setelah update sukses
        return redirect()->route('donation_feedback.index')->with('success', 'Data donasi dan feedback berhasil diperbarui!');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $donationAndFeedback = DonationAndFeedback::findOrFail($id);
        
        if ($donationAndFeedback->proof_of_payment) {
            \Storage::disk('public')->delete($donationAndFeedback->proof_of_payment);
        }
    
        $donationAndFeedback->delete();
    
        return redirect()->route('donation_feedback.index')->with('success', 'Data berhasil dihapus!');
    }
    
}
