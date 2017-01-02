<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;

use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use PDF;
class PdfController extends Controller
{

    public function invoice(){
        $data=$this->getData();
        $date  = date('Y-m-d');
        $invoice="2222";
        $view=\View::make('pdf.invoice2', compact('data', 'date', 'invoice'))->render();
        //return $view;


        $pdf=\App::make('dompdf.wrapper');


        $pdf->loadHTML($view);

        //$pdf->setPaper('letter',  'landscape');

        return $pdf->stream('invoice');

        //$pdf = \PDF::loadView('pdf.invoice', $data);
        //return $pdf->download('invoice.pdf');

    }

    public function imprimir(){


        return 'UN MENSAJE';
        $view= view('lectura.print');

        $pdf=\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);

        //$pdf->setPaper('letter',  'landscape');

      return $pdf->stream('invoice');

    }
    public function getData(){
        $data=[
            'quantity' =>'1',
            'description'=> 'some random text',
            'price'=>'500',
            'total'=> '500'

        ];
        return $data;
    }
}
