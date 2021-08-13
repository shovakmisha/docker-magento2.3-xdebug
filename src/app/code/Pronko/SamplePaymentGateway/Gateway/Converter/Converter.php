<?php


namespace Pronko\SamplePaymentGateway\Gateway\Converter;

use Magento\Payment\Gateway\Http\ConverterInterface;

class Converter
{

    /**
     * @var ConverterInterface
     */
    private $converter;

    /**
     * Converter constructor.
     * @param ConverterInterface $converter
     */
    public function __construct(
        ConverterInterface $converter
    ) {
        $this->converter = $converter;
    }

    public function convert(array $request)
    {
        return $this->converter->convert($request);
    }
}
