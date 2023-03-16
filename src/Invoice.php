<?php

namespace Yubi\Xendit;

use Yubi\Xendit\Traits\Create;
use Yubi\Xendit\Traits\Get;

class Invoice extends Xendit
{
    use Create, Get;

    protected $endpoint = '/v2/invoices';

    protected $requiredCreateParams = [
        'external_id',
        'payer_email',
        'description',
        'amount'
    ];
}
