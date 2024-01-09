<?php

namespace App\Http\Controllers;

use App\Models\InputNotifModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class InputNotifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('view-notif', [
            "title" => "Notif",
            "posts" => InputNotifModel::latest()->filter()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'ok' => view('InputNotif/create-inputnotif', [])->render()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  // save
    {
        if ($request->ajax()) {
            $this->validasi($request);
            InputNotifModel::create([
                'title'   => $request->title,
                'descriptions'   => $request->descriptions,
            ]);
            return response()->json([
                'ok' => 'Data berhasil disimpan',
            ]);
        }
    }

    public function datanotif()
    {
        if (request()->ajax()) {
            return DataTables::of(InputNotifModel::get())
                ->addIndexColumn()
                ->rawColumns(['action', 'descriptions'])
                ->addColumn('action', function ($r) {
                    return '
                    <button type="button" class="btn btn-warning btn-xs rounded-1" title="Edit" onclick=edit_notif(' . $r->id . ')><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger btn-xs rounded-1" title="Delete" onclick=hapus_notif(' . $r->id . ')><i class="fas fa-trash-alt"></i></button>
                ';
                })
                ->toJson();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(InputNotifModel $inputNotifModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            return response()->json([
                'ok' => view('inputNotif/edit-inputnotif', [
                    'notif' => InputNotifModel::findOrFail($id)
                ])->render()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InputNotifModel $inputNotifModel, string $id)
    {
        if ($request->ajax()) {
            $this->validasi($request, $id);
            InputNotifModel::findorfail($id)->update([
                'title'   => $request->title,
                'descriptions'   => $request->descriptions,
            ]);
            return response()->json([
                'ok' => 'Data berhasil ubah',
            ]);
        }
    }


    public function destroy(string $id)
    {
        if (request()->ajax()) {
            InputNotifModel::destroy($id);
            return response()->json([
                'ok' => 'Data berhasil dihapus'
            ]);
        }
    }

    public function validasi(Request $request, $id = null)
    {
        $rules =  [
            'title' => ['required', 'string', 'max:255', Rule::unique('tb_notif', 'title')->ignore($id, 'id')],
            'descriptions' => ['required',],

        ];
        $messages = [
            'title.required'       => 'Judul harus diisi',
            'descriptions.required'       => 'Descriptions harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            echo json_encode([
                'errors'    => [
                    'title' => $validator->errors()->get('title'),
                    'descriptions' => $validator->errors()->get('descriptions'),
                ],
            ]);
            exit();
        }
    }
}
