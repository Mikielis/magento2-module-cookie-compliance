<?php

namespace Mikielis\CookieCompliance\Model;

class Position implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $positions = [];

        $positions[] = [
            'value' => 'top',
            'label' => __('Top')
        ];

        $positions[] = [
            'value' => 'bottom',
            'label' => __('Bottom')
        ];

        return $positions;
    }
}
