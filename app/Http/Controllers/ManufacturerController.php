<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $manufacturer = Manufacturer::where('manufacturer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $manufacturer = Manufacturer::latest()->paginate($perPage);
        }

        return view('manufactuturer.manufacturer.index', compact('manufacturer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('manufactuturer.manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'manufacturer' => 'required|max:100'
		]);
        $requestData = $request->all();
        
        Manufacturer::create($requestData);

        return redirect('manufacturer')->with('save', 'Manufacturer added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);

        return view('manufactuturer.manufacturer.show', compact('manufacturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);

        return view('manufactuturer.manufacturer.edit', compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'manufacturer' => 'required|max:100'
		]);
        $requestData = $request->all();
        
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->update($requestData);

        return redirect('manufacturer')->with('save', 'Manufacturer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Manufacturer::destroy($id);
        return redirect('manufacturer')->with('delete', 'Manufacturer deleted!');
    }
}
