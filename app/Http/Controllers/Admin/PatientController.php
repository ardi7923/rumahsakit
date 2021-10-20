<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ardi7923\Laravelcms\CrudAjax;
use App\Models\Patient;
use App\Models\Room;
use DataTables;
use App\Http\Requests\PatientRequest;

class PatientController extends CrudAjax
{
    protected $model  = Patient::class;
    protected $url    = "admin/patient/";
    protected $folder = "pages.admin.patient.";

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->datatable();
        }

        return view($this->folder . "index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        return renderToJson($this->folder."create",compact("rooms"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        return $this->save();   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->findOrFail($id);
        $rooms = Room::all();
        return renderToJson($this->folder."edit",compact("data","rooms"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, $id)
    {
        return $this->setParams($id)->change();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->setParams($id)->delete();
    }
    /**
     * json data for datatable.
     *
     * 
     * @return DataTables
     */
    public function datatable()
    {
        $data = $this->model->query();
        
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn("gender_show",function($data){
            return ($data->gender == "M") ? "L" : "P";
        })
        ->addColumn("birthday_show",function($data){
            return ($data->birthday) ? date_indo($data->birthday) : "-";
        })
        ->addColumn('action', function ($data) {
            return view('components.datatables.action', [
                'data'        => $data,
                'size'        => "lg",
                'url_edit'    => url($this->url . $data->id . '/edit'),
                'url_destroy' => url($this->url . $data->id),
                'delete_text' => view($this->folder . 'delete', compact('data'))->render()
            ]);
        })
        ->make(true); 
    }
}
