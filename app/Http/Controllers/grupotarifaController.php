<?php

namespace simuaagua\Http\Controllers;

use Illuminate\Http\Request;

use simuaagua\grupotarifa;
use simuaagua\Http\Requests;
use simuaagua\Http\Controllers\Controller;
use Mike42\Escpos\Printer;
use Mike42\Escpos;

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfiles\SimpleCapabilityProfile;

class grupotarifaController extends Controller
{


    private function title(Printer $printer, $text) {
        $printer -> selectPrintMode(Printer::MODE_EMPHASIZED);
        $printer -> text("\n" . $text);
        $printer -> selectPrintMode(); // Reset
    }


    public function index()
    {
        $conector= new WindowsPrintConnector("smb://tesoreria-pc/panasonic");
        $profile= Escpos\CapabilityProfiles\DefaultCapabilityProfile::getInstance();
        $printer= new Escpos\Printer($conector, $profile);

      //    $printer->text("Hola mundo\n");
     //   $printer->feed(2);
      //  $printer->text("Mi nombre es Julio Cesar Arce\n");
      //  $printer->cut();




        /* Initialize */
        $printer -> initialize();

        $printer->setTextSize(5,2);
        $printer->text("Hola Mundoooo");
        /* Text of various (in-proportion) sizes */
        $this->title($printer, "Change height & width\n");
        for($i = 1; $i <= 8; $i++) {
            $printer -> setTextSize($i, $i);
            $printer -> text($i);
        }
        $printer -> text("\n");

        /* Width changing only */
        $this->title($printer, "Change width only (height=4):\n");
        for($i = 1; $i <= 8; $i++) {
            $printer -> setTextSize($i, 4);
            $printer -> text($i. 'masss');
        }
        $printer -> text("\n");

        /* Height changing only */
        $this->title($printer, "Change height only (width=4):\n");
        for($i = 1; $i <= 8; $i++) {
            $printer -> setTextSize(4, $i);
            $printer -> text($i);
        }
        $printer -> text("\n");

        /* Very narrow text */
        $this->title($printer, "Very narrow text:\n");
        $printer -> setTextSize(1, 8);
        $printer -> text("The quick brown fox jumps over the lazy dog.\n");

        /* Very flat text */
        $this->title($printer, "Very wide text:\n");
        $printer -> setTextSize(4, 1);
        $printer -> text("Hello world!\n");

        /* Very large text */
        $this->title($printer, "Largest possible text:\n");
        $printer -> setTextSize(8,8);
        $printer -> text("Hello\nworld!\n");

        $printer -> cut();
        $printer -> close();


        //////


        //$printer->qrCode('Testing 123', Escpos\Printer::QR_ECLEVEL_L, 3, Escpos\Printer::QR_MODEL_1=);
        //$printer->close();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
