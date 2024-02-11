<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        return view('admin.currency.index', compact('currencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:currencies,name',
            'code' => 'required|unique:currencies,code',
            'symbol' => 'required|unique:currencies,symbol',
        ]);

        Currency::create($request->post());

        Alert::success('Success', 'Currency created!');

        return redirect()->route('admin.currency-list');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:currencies,name,' . $request->input('currency_id'),
            'code' => 'required|unique:currencies,code,' . $request->input('currency_id'),
            'symbol' => 'required|unique:currencies,symbol,' . $request->input('currency_id'),
        ], [
            'name.unique' => 'Currency name already exists',
            'code.unique' => 'Currency code already exists',
            'symbol.unique' => 'Currency symbol already exists',
        ]);

        $currency = Currency::find($request->input('currency_id'));
        $currency->update([
            'name' => $validated["name"],
            'code' => $validated["code"],
            'symbol' => $validated["symbol"],
        ]);

        Alert::success('Success', 'Currency updated!');

        return redirect()->route('admin.currency-list');
    }

    public function getCurrency($id)
    {
        $currency = Currency::find($id);
        return response()->json($currency);
    }
}
