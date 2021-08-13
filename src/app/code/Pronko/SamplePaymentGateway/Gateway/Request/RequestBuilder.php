<?php
/**
 * це пареннт для інших реквестів
 */
namespace Pronko\SamplePaymentGateway\Gateway\Request;

use Magento\Payment\Gateway\Request\BuilderInterface;

class RequestBuilder implements  BuilderInterface
{
    /**
     * @var BuilderInterface
     */
    private $builderComposite;

    /**
     * RequestBuilder constructor.
     * @param BuilderInterface $builder
     */
    public function __construct(BuilderInterface $builder)
    {
        $this->builderComposite = $builder;
    }

    public function build(array $buildSubject)
    {
        return [
            'createTransactionRequest' => [
                'merchantAuthentication' => [
                    'name' => '877sRXR88eZn',
                    'transactionKey' => '5HL25u852EnHnnAb'
                ],
                'transactionRequest' => $this->builderComposite->build($buildSubject) // це по ідеї наповнять класи з папки Builder
            ]
        ];
    }
}
