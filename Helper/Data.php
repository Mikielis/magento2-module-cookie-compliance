<?php

namespace Mikielis\CookieCompliance\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Get scope config by path
     * @param $path
     * @return mixed
     */
    public function getConfig($path) {
        return $this->scopeConfig->getValue($path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}