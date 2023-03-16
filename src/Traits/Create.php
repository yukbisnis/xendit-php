<?php

namespace Hasandotprayoga\Xendit\Traits;

trait Create
{
    public function create($params = [])
    {
        $this->validateParams($params, $this->requiredCreateParams);

        $url = $this->endpoint;

        return $this->request('POST', $url, $params);
    }
}
