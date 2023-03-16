<?php

namespace Hasandotprayoga\Xendit;

use Hasandotprayoga\Xendit\Traits\Create;
use Hasandotprayoga\Xendit\Traits\Get;

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
