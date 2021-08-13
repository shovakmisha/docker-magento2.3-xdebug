<?php

namespace Pronko\SamplePaymentGateway\Gateway\Converter;

use Magento\Framework\Serialize\SerializerInterface;
use Magento\Payment\Gateway\Http\ConverterInterface;

class JsonToArray implements ConverterInterface
{

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * JsonToArray constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(
        SerializerInterface $serializer
    )
    {
        $this->serializer = $serializer;
    }

    /**
     * @param mixed $response
     * @return array|bool|float|int|string|null
     */
    public function convert($response)
    {
        // Fix json response issue
        $response = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response);

        return $this->serializer->unserialize($response);
    }
}
