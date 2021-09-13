<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use CrudAjax;
use App\Services\AccountConsultationtService;
use App\Models\User;
use DataTables;
use App\Http\Requests\AccountConsultationRequest;

class AccountConsultation extends CrudAjax
{
    protected $model  = User::class;
    protected $url    = "admin/account-consultation/";
    protected $folder = "pages.admin.account-consultation.";

    public function __construct(AccountConsultationtService $facade)
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
        return renderToJson($this->folder."create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountConsultationRequest $request)
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
    public function update(AccountConsultationRequest $request, $id)
    {
        return $this->setFacade($this->facade)->setParams($id)->change();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->setFacade($this->facade)->setParams($id)->delete();
    }

        /**
     * json data for datatable.
     *
     * 
     * @return DataTables
     */
    public function datatable()
    {
        $data = $this->model->query()->where("role","patient");

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<center>

                <button class="btn btn-circle btn-sm btn-warning btn_edit" data-size="lg" data-url="'. url("admin/account-consultation/$data->id/edit").'" data-toggle="tooltip" title="Ubah Data">
                    <i class="fa fa-edit"> </i>
                </button>
            
            
                <button class="btn btn-circle btn-sm btn-danger btn_delete" data-url="'.url("admin/account-consultation/$data->id").'" data-text="" data-toggle="tooltip" title="Hapus Data">
                    <i class="fa fa-trash"> </i>
                </button>
            </center>';
            })
            ->rawColumns(["image_show","action"])
            ->make(true);
    }
}
