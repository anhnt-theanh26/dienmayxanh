<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::orderBy('id', 'desc')->get();
        return view('admin.page.voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      
    }

    public function delete(string $id)
    {
        
    }

    public function deleted()
    {
        
    }

    public function restore(string $id)
    {
       
    }

    public function search(Request $request, string $keyword)
    {
        $status = $request->status;
        if ($status == 'index') {
            $results = Voucher::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Voucher::orderBy('id', 'desc')->get();
            }
        }
        if ($status == 'delete') {
            $results = Voucher::onlyTrashed()->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Voucher::onlyTrashed()->orderBy('id', 'desc')->get();
            }
        }
        return view('admin.page.voucher.search', compact('results', 'status'));
    }
}
