<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ardi7923\Laravelcms\CrudAjax;
use App\Models\Doctor;
use DataTables;
use App\Services\DoctorService;
use App\Http\Requests\DoctorRequest;

class DoctorController extends CrudAjax
{
    protected $model  = Doctor::class;
    protected $url    = "admin/doctor/";
    protected $folder = "pages.admin.doctor.";

    private $facade;

    public function __construct(DoctorService $facade)
    {
        parent::__construct();
        $this->facade = $facade;
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
        return renderToJson($this->folder . "create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
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
        return $this->setParams($id)->setFacade($this->facade)->delete();
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
            ->addColumn("image_show",function($data){
                return "<center><img  src='".asset("storage/images/".$data->image)  ."' width='130px' > </center>";
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
            ->rawColumns(["image_show","action"])
            ->make(true);
    }
}
