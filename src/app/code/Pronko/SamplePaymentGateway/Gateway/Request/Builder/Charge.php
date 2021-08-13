<?php

namespace Pronko\SamplePaymentGateway\Gateway\Request\Builder;

use Magento\Payment\Gateway\Request\BuilderInterface;

class Charge implements BuilderInterface
{
    /**
     * @param array $buildSubject
     * @return array
     */
    public function build(array $buildSubject)
    {
        $amount = $buildSubject['amount'];

        return [
            'transactionType' => 'authCaptureTransaction',
            'amount' => $amount
        ];
    }
}
