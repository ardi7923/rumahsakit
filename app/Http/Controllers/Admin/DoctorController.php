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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAttachment($id)
    {
        $data = $this->model->findOrFail($id);
        return renderToJson($this->folder."edit-attachment",compact("data"));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAttachment(Request $request, $id)
    {
        return $this->facade->updateAttachment($request,$id);
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
                return '<center>
                <button class="btn btn-circle btn-sm btn-success btn_edit_attachment" data-size="md" data-url="'. url("admin/doctor/$data->id/edit-attachment").'" data-toggle="tooltip" title="Ubah Gambar">
                    <i class="fa fa-image"> </i>
                </button>

                <button class="btn btn-circle btn-sm btn-warning btn_edit" data-size="lg" data-url="'. url("admin/doctor/$data->id/edit").'" data-toggle="tooltip" title="Ubah Data">
                    <i class="fa fa-edit"> </i>
                </button>
            
            
                <button class="btn btn-circle btn-sm btn-danger btn_delete" data-url="'.url("admin/doctor/$data->id").'" data-text="" data-toggle="tooltip" title="Hapus Data">
                    <i class="fa fa-trash"> </i>
                </button>
            </center>';
            })
            ->rawColumns(["image_show","action"])
            ->make(true);
    }
}
