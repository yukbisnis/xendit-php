<?php

namespace Yubi\Xendit;

use Yubi\Xendit\Traits\Create;

class QrCodes extends Xendit
{
    use Create;
    
    protected $endpoint = '/qr_codes';

    protected $requiredCreateParams = [
        'external_id', 
        'type', 
        'callback_url', 
        'amount'
    ];
}
