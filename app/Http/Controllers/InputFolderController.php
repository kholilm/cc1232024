<?php

namespace App\Http\Controllers;

use App\Models\InputFolderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class InputFolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('view-inputdata', [
            "title" => "Input-Folder",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'ok' => view('InputFolders/create-inputfolders', [])->render()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validasi($request);
            if ($request->foldername) {
                $foldername = $request->foldername;
                if (!is_dir($foldername)) mkdir('storage/file_pdf/' . $foldername);
                foreach ($_FILES['files']['name'] as $i => $name) {
                    if (strlen($_FILES['files']['name'][$i]) > 1) {
                        move_uploaded_file($_FILES['files']['tmp_name'][$i],  'storage/file_pdf/' . $foldername . '/' . $name);
                    }
                }
            }
            $pesan = [
                'sukses'    => 'Folder Berhasil Disimpan'
            ];
            echo json_encode($pesan);
        } else {
            return redirect()->to('/inputfolder ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InputFolderModel $inputFolderModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InputFolderModel $inputFolderModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InputFolderModel $inputFolderModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InputFolderModel $inputFolderModel)
    {
        //
    }
    public function validasi(Request $request, $id = null)
    {
        $rules =  [
            'foldername' => ['required'],
        ];
        $messages = [
            'foldername.required'       => 'menu harus diisi',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            echo json_encode([
                'errors'    => [
                    'foldername' => $validator->errors()->get('foldername'),
                ],
            ]);
            exit();
        }
    }
}
