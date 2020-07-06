<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Note;

class PdfController extends Controller
{
    public function index(){

        $notes = Note::all();

        $pdf = PDF::loadView('invoice',['notes'=>$notes]);
        return $pdf->download('invoice.pdf');
    }
}
