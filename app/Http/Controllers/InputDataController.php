<?php

namespace App\Http\Controllers;

use App\Models\InputDataModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Cviebrock\EloquentSluggable\Services\SlugService;

class InputDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return InputDataModel::all();
        $this->authorize('admin');
        return view('view-inputdata', [
            "title" => "Input-Data",
            'InputData' => InputDataModel::all()

        ]);
    }
    public function data()
    {
        if (request()->ajax()) {
            return DataTables::of(InputDataModel::get())
                ->addIndexColumn()
                ->rawColumns(['status', 'action'])
                ->addColumn('action', function ($r) {
                    return '
                    <button type="button" class="btn btn-warning btn-xs rounded-1" title="Edit" onclick=edit_file(' . $r->id . ')><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger btn-xs rounded-1" title="Delete" onclick=hapus_file(' . $r->id . ')><i class="fas fa-trash-alt"></i></button>
                ';
                })
                ->addColumn('status', function ($r) {
                    return $r->is_active === 1 ? '<span class="badge bg-success rounded-1">Active</span>' : '<span class="badge bg-danger rounded-1">Non Active</span>';
                })
                ->toJson();
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'ok' => view('InputFiles/create-inputfiles', [
                'jenismenu' => ['side-bar'],
                'datamenu'  => InputDataModel::where('menu_id', 0)
                    ->where('is_active', 1)->get()
            ])->render()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validasi($request);
            InputDataModel::create([
                'menu'   => $request->menu,
                'url'   => $request->url,
                'menu_id'   => $request->menu_id,
                'jenis_menu'   => $request->jenis_menu,
                'icon'   => $request->icon,
                'path_pdf'   => $request->path_pdf,
                'sort_menu'   => $request->sort_menu,
                'is_active'   => $request->is_active,

            ]);
            if ($request->file('path_pdf')) {
                $image = $request->file('path_pdf');
                $validasi['path_pdf'] = $request->file->getClientOriginalName('path_pdf')->store('file_pdf');
            }
            return response()->json([
                'ok' => 'Data berhasil disimpan',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InputDataModel $inputDataModel)
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
                'ok' => view('inputFiles/edit-inputfiles', [
                    'file' => InputDataModel::findOrFail($id),
                    'datamenu'  => InputDataModel::where('menu_id', 0)
                        ->where('is_active', 1)->get(),
                    'jenismenu' => ['nav-bar', 'side-bar'],
                ])->render()
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InputDataModel $inputDataModel)
    {
        //
    }

    public function destroy(string $id)
    {
        if (request()->ajax()) {
            InputDataModel::destroy($id);
            return response()->json([
                'ok' => 'Data berhasil dihapus'
            ]);
        }
    }

    public function validasi(Request $request, $id = null)
    {
        $rules =  [
            'menu' => ['required', 'string', 'max:255', Rule::unique('tb_sop', 'menu')->ignore($id, 'id')],
            'sort_menu' => ['required'],
            'icon' => ['required', 'string'],
        ];
        $messages = [
            'menu.required'       => 'menu harus diisi',
            'sort_menu.required'       => 'no harus diisi',
            'icon.required'       => 'icon harus diisi',

        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            echo json_encode([
                'errors'    => [
                    'menu' => $validator->errors()->get('menu'),
                    'sort_menu' => $validator->errors()->get('sort_menu'),
                    'icon' => $validator->errors()->get('icon'),
                ],
            ]);
            exit();
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'url', $request->menu);
        return response()->json(['url' => $slug]);
    }
}
