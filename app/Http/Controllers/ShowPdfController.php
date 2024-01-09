<?php

namespace App\Http\Controllers;

use App\Models\ShowPdfModel;

class ShowPdfController extends Controller
{
    public function index(ShowPdfModel $slug)
    {
        return  view('view-showpdf', [
            'title' => 'test',
            'datapdf' => $slug
        ]);
    }

    public function link()
    {
        return response()->json([
            'ok' => view('view-link', [])->render()
        ]);
    }
}
