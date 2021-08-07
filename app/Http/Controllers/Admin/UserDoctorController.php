<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use CrudAjax;
use App\Models\User;
use DataTables;
use App\Http\Requests\UserDoctorRequest;
use App\Services\UserDoctorService;

class UserDoctorController extends CrudAjax
{
    protected $model  = User::class;
    protected $url    = "admin/user-doctor/";
    protected $folder = "pages.admin.user-doctor.";

    public function __construct(UserDoctorService $facade)
    {
        $this->facade = $facade;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->datatable();
        }
        return view($this->folder."index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        return renderToJson($this->folder."create",compact("doctors"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserDoctorRequest $request)
    {
        return $this->setFacade($this->facade)->save();
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
        return renderToJson($this->folder."edit",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->setParams($id)->setFacade($this->facade)->change();
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
        $data = $this->model->query()->where("role","doctor")->with("doctor");
        
        return DataTables::of($data)
        ->addIndexColumn()
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
