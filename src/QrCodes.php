<?php

namespace Hasandotprayoga\Xendit;

use Hasandotprayoga\Xendit\Traits\Create;

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
