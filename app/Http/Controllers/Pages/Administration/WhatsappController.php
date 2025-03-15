<?php

namespace App\Http\Controllers\Pages\Administration;

use Exception;
use App\Models\Mail\MailLog;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Repositories\Administration\MailTrackingRepo;

class WhatsappController extends Controller
{
    protected $modelName = 'Whatsapp';

    public function index(Request $request)
    {
        return  $this->toSendWhatsapp('971502848071');
    }

    public static function toSendWhatsapp($recipientMobile, $message = '')
    {
        if (!$recipientMobile) {
            return 'Rrecipient Mobile number not found';
        }

        $url = 'https://wa.mytime2cloud.com/send-message';

        $data = [
            'clientId' => "38_alarm_xtremeguard",
            'recipient' =>  $recipientMobile,
            'text' => 'test',
        ];

        return  Http::withoutVerifying()->timeout(30)->post($url, $data);
    }
}
