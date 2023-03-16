<?php

namespace Yubi\Xendit;

use Yubi\Xendit\Traits\Create;

class CardlessCredit extends Xendit
{
    use Create;
    
    protected $endpoint = '/cardless-credit';

    protected $requiredCreateParams = [
        'cardless_credit_type',
        'external_id',
        'amount',
        'payment_type',
        'items',
        'customer_details',
        'shipping_address',
        'redirect_url',
        'callback_url'
    ];
}
