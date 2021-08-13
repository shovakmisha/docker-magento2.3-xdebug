<?php

namespace Pronko\SamplePaymentGateway\Gateway\Http;

use Magento\Payment\Gateway\Http\TransferBuilder;
use Magento\Payment\Gateway\Http\TransferFactoryInterface;
use Pronko\SamplePaymentGateway\Gateway\Converter\Converter;

class TransferFactory implements TransferFactoryInterface
{
    /**
     * @var TransferBuilder
     */
    private $transferBuilder;

    /**
     * @var Converter
     */
    private $converter;

    /**
     * TransferFactory constructor.
     * @param TransferBuilder $transferBuilder
     * @param Converter $converter
     */
    public function __construct(
        TransferBuilder $transferBuilder,
        Converter $converter
    )
    {
        $this->transferBuilder = $transferBuilder;
        $this->converter = $converter;
    }

    /**
     * @param array $request
     * @return \Magento\Payment\Gateway\Http\Transfer|\Magento\Payment\Gateway\Http\TransferInterface
     */
    public function create(array $request)
    {
        return $this->transferBuilder->setUri('https://apitest.authorize.net/xml/v1/request.api')
                                     ->setMethod('POST')
                                     ->setBody($this->converter->convert($request))
                                     ->setHeaders(['Content-type' => 'application/json'])
                                     ->build();
    }
}
