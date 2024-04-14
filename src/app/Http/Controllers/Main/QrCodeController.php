<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index() : View
    {
        $from = [255, 0, 0];
        $to = [0, 0, 255];

        $qrCode = QrCode::size(400)
            ->style('dot')
            ->eye('circle')
            ->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
            ->margin(1)
            ->generate(route('main.index'));

        return view('qr.index', compact('qrCode'));
    }
}
