<?php

namespace App\Http\Controllers;

use App\Models\InputNewsModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class InputNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function home()
    {
        return view(
            'view-news',
            [
                "title" => "News",
                "news" => InputNewsModel::latest()->filter()->paginate(4)
            ]
        );
    }

    public function index()
    {
        return view('view-inputnews', [
            "title" => "InputNews",
            "news" => InputNewsModel::latest()->filter()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'ok' => view('InputNews/create-inputnews', [])->render()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validasi($request);
            InputNewsModel::create([
                'name'   => $request->name,
                'title'   => $request->title,
                'descriptions'   => $request->descriptions,
            ]);
            return response()->json([
                'ok' => 'Data berhasil disimpan',
            ]);
        }
    }

    public function datanews()
    {
        if (request()->ajax()) {
            return DataTables::of(InputNewsModel::get())
                ->addIndexColumn()
                ->rawColumns(['action', 'descriptions'])
                ->addColumn('action', function ($r) {
                    return '
                    <button type="button" class="btn btn-warning btn-xs rounded-1" title="Edit" onclick=edit_news(' . $r->id . ')><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger btn-xs rounded-1" title="Delete" onclick=hapus_news(' . $r->id . ')><i class="fas fa-trash-alt"></i></button>
                ';
                })
                ->toJson();
        }
    }

    public function show(InputNewsModel $inputNewsModel)
    {
        //
    }

    public function validasi(Request $request, $id = null)
    {
        $rules =  [
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255', Rule::unique('tb_news', 'title')->ignore($id, 'id')],
            'descriptions' => ['required'],

        ];
        $messages = [
            'name.required'       => 'Name harus diisi',
            'title.required'       => 'Judul harus diisi',
            'descriptions.required'       => 'Descriptions harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            echo json_encode([
                'errors'    => [
                    'name' => $validator->errors()->get('name'),
                    'title' => $validator->errors()->get('title'),
                    'descriptions' => $validator->errors()->get('descriptions'),
                ],
            ]);
            exit();
        }
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            return response()->json([
                'ok' => view('InputNews/edit-inputnews', [
                    'news' => InputNewsModel::findOrFail($id)
                ])->render()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InputNewsModel $inputNewsModel, string $id)
    {
        if ($request->ajax()) {
            $this->validasi($request, $id);
            InputNewsModel::findorfail($id)->update([
                'name'   => $request->name,
                'title'   => $request->title,
                'descriptions'   => $request->descriptions,
            ]);
            return response()->json([
                'ok' => 'Data berhasil ubah',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (request()->ajax()) {
            InputNewsModel::destroy($id);
            return response()->json([
                'ok' => 'Data berhasil dihapus'
            ]);
        }
    }
}
