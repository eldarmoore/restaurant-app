<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Table;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $tables = Table::all();
        return view('management.table')->with('tables', $tables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('management.createTable');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:tables|max:255']);
        $table = new Table();
        $table->name = $request->name;
        $table->save();
        $request->session()->flash('status','Table '. $request->name . ' is created successfully');
        return redirect('management/table');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $table = Table::find($id);
        return view('management.editTable')->with('table', $table);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|unique:tables|max:255']);
        $table = Table::find($id);
        $table->name = $request->name;
        $table->save();
        $request->session()->flash('status', 'The table is updated to ' . $request->name. ' successfully');
        return redirect('/management/table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
