<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Manufacturer;
use App\VehicleImage;
use App\VehicleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\DataTables;

class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view('vehicle_model.vehicle-model.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $vehicle_model_color = VehicleModel::vehicle_model_color();
        $manufacturers = Manufacturer::all();
        return view('vehicle_model.vehicle-model.create',compact('manufacturers','vehicle_model_color'));
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
            'model' => 'required|max:100',
            'color' => 'required|max:100',
            'registration_number' => 'required|max:100',
            'manufacturing_year' => 'required|max:100',
		]);
        $requestData = $request->all();
        
        VehicleModel::create($requestData);

        return redirect('vehicle-model')->with('save', 'VehicleModel added!');
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
        $vehiclemodel = VehicleModel::findOrFail($id);

        return view('vehicle_model.vehicle-model.show', compact('vehiclemodel'));
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
        $vehiclemodel = VehicleModel::findOrFail($id);
        $vehicle_model_color = VehicleModel::vehicle_model_color();
        $manufacturers = Manufacturer::all();

        return view('vehicle_model.vehicle-model.edit', compact('vehiclemodel','vehicle_model_color','manufacturers'));
    }

    public function images($id)
    {

        $vehiclemodel = VehicleModel::findOrFail($id);
        $vehicle_model_color = VehicleModel::vehicle_model_color();
        $manufacturers = Manufacturer::all();

        $vehicle_image = $id;
        return view('vehicle_model.vehicle-model.edit', compact('vehiclemodel','vehicle_model_color','manufacturers','vehicle_image'));

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
			'model' => 'required|max:100',
			'color' => 'required|max:100',
			'registration_number' => 'required|max:100',
			'manufacturing_year' => 'required|max:100',
		]);
        $requestData = $request->all();
        
        $vehiclemodel = VehicleModel::findOrFail($id);
        $vehiclemodel->update($requestData);

        return redirect('vehicle-model')->with('save', 'VehicleModel updated!');
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
        VehicleModel::destroy($id);

        return redirect('vehicle-model')->with('delete', 'VehicleModel deleted!');
    }

    public function datatable()
    {
        $result = VehicleModel::select('*');
        return DataTables::of ($result)
            ->editColumn('manufacturer_id', function ($datas) {
                return Manufacturer::find($datas->manufacturer_id)->manufacturer;
            })
            ->addColumn('action', function ($datas) {
                $color = VehicleModel::vehicle_model_color();
                $html = '<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mTopRight" data-registration_number="'.$datas->registration_number.'" data-manufacturing_year="'.$datas->manufacturing_year.'"  data-color="'.ucfirst($color[$datas->color]['name']).'" data-note="'.$datas->note.'"> <i class="fa fa-eye"></i>View</button>
                <a href='. url("/vehicle-model/" . $datas->id . "/edit") .' title="Edit Vehicle Model"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                <a href='. url("/vehicle-model/" . $datas->id . "/images") .' title="Images"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Images</button></a>
                <form method="POST" action='.url("/vehicle-model" . "/" . $datas->id).' accept-charset="UTF-8" style="display:inline">'.
                                                         method_field('DELETE') .
                                                         csrf_field() .'
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete VehicleModel" onclick="return confirm( \' Confirm Sell ? \' )"><i class="fa fa-trash-o" aria-hidden="true"></i> SELL</button>
                                                    </form>                
                
                ';
                return $html;
            })
            ->make(true);
    }

    public function image_upload(Request $request,$vehicle_id)
    {
        $vehicle = VehicleModel::find($vehicle_id);
        $image = $request->file('file');
        //$image = $request->image;
        if($image){
            $imageName = time(). $image->getClientOriginalName();
            $image->move('vehicles/images',$imageName);
            //$formInput['image_path'] = $imageName;
            $imagePath = "vehicles/images/$imageName";
            $vehicle->images()->create([
                'image_path' => $imagePath,
            ]);
        }

        return 'done';

       // VehicleImage::create($formInput);

    }
}
