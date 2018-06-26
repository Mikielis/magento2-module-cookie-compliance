<?php

namespace Mikielis\CookieCompliance\Model;

class CloseOptions implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $options = [];

        $options[] = [
            'value' => 'allowAndClose',
            'label' => __('Allow and close')
        ];

        $options[] = [
            'value' => 'close',
            'label' => __('Just close')
        ];

        return $options;
    }
}
