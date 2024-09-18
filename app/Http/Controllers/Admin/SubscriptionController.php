<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the subscriptions.
     */
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new subscription.
     */
    public function create()
    {
        return view('admin.subscriptions.create');
    }

    /**
     * Store a newly created subscription in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'card_number' => 'required',
            'name' => 'required',
            'expiry_date' => 'required',
            'cvc' => 'required',
            'amount' => 'required',
        ]);

        $subscriptions = Subscription::create([
            'card_number' => $validatedData['card_number'],
            'name' => $validatedData['name'],
            'expiry_date' => $validatedData['expiry_date'],
            'cvc' => $validatedData['cvc'],
            'amount' => $validatedData['amount'],
        ]);

        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription created successfully.');
    }

    /**
     * Display the specified subscription.
     */
    public function show(string $id)
    {
        $subscriptions = Subscription::findOrFail($id);
        return view('admin.subscriptions.show', compact('subscriptions'));
    }

    /**
     * Show the form for editing the specified subscription.
     */
    public function edit(string $id)
    {
        $subscriptions = Subscription::findOrFail($id);
        return view('admin.subscriptions.edit', compact('subscriptions'));
    }

    /**
     * Update the specified subscription in the database.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'card_number' => 'required',
            'name' => 'required',
            'expiry_date' => 'required',
            'cvc' => 'required',
            'amount' => 'required',
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription->card_number = $validatedData['card_number'];
        $subscription->name = $validatedData['name'];
        $subscription->expiry_date = $validatedData['expiry_date'];
        $subscription->cvc = $validatedData['cvc'];
        $subscription->amount = $validatedData['amount'];
        $subscription->save();

        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription updated successfully.');
    }

    /**
     * Remove the specified subscription from the database.
     */
    public function destroy(string $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription deleted successfully.');
    }
}
