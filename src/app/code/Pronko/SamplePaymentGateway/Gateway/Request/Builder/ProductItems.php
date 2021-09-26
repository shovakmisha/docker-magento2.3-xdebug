<?php

namespace Pronko\SamplePaymentGateway\Gateway\Request\Builder;

use Magento\Payment\Gateway\Data\PaymentDataObjectInterface;
use Magento\Payment\Gateway\Request\BuilderInterface;


class ProductItems implements BuilderInterface
{

    /**
     * @param array $buildSubject
     * @return array[]
     */
    public function build(array $buildSubject)
    {
        /** @var PaymentDataObjectInterface $paymentDataObject */
        $paymentDataObject = $buildSubject['payment'];
        $order = $paymentDataObject->getOrder();

        $items = [];

        /**
         *
         * @var  $key
         * @var \Magento\Sales\Api\Data\OrderItemInterface $item
         */
        foreach ($order->getItems() as $key => $item) {
            $items['lineItem'][] = [
                'itemId' => (string) $key,
                'name' => substr($item->getName(), 0, 31),
                'description' => substr($item->getDescription(), 0, 255),
                'quantity' => $item->getQtyOrdered(),
                'unitPrice' => $item->getPrice()
            ];
        }

        return [
            'lineItems' => $items
        ];
    }
}
