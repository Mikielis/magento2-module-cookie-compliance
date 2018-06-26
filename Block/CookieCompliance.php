<?php

namespace Mikielis\CookieCompliance\Block;

use \Magento\Framework\View\Element\Template\Context;
use \Mikielis\CookieCompliance\Helper\Data;
use \Magento\Theme\Block\Html\Header\Logo;

class CookieCompliance extends \Magento\Framework\View\Element\Template
{
    protected $_dataHelper;

    protected $_storeManager;

    protected $_logo;

    protected $_cookieName = 'mikielis_cookie_compliance';

    /**
     * CookieCompliance constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Mikielis\CookieCompliance\Helper\Data $dataHelper
     * @param \Magento\Theme\Block\Html\Header\Logo $logo
     * @param array $data
     */
    public function __construct(Context $context, Data $dataHelper, Logo $logo, array $data)
    {
        $this->_dataHelper = $dataHelper;
        $this->_storeManager = $context->getStoreManager();
        $this->_logo = $logo;
        parent::__construct($context, $data);
    }

    /**
     * @return $this
     */
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    /**
     * Module activation
     * @return boolean
     */
    public function isModuleActive() 
    {
        return (boolean) $this->_dataHelper->getConfig('cookiecompliance/functional/activation');
    }

    /**
     * Get position
     * @return mixed
     */
    public function getPosition()
    {
        return $this->_dataHelper->getConfig('cookiecompliance/design/position');
    }

    /**
     * Get message
     * @return string
     */
    public function getMessage() 
    {
        return $this->_dataHelper->getConfig('cookiecompliance/content/message');
    }

    /**
     * Get text of read more button
     * @return string
     */
    public function getReadMoreButtonText()
    {
        return $this->_dataHelper->getConfig('cookiecompliance/content/read_more_text');
    }

    /**
     * Get URL of webpage that should be linked by "read more" button
     * @return string
     */
    public function getReadMoreButtonLink()
    {
        return $this->_dataHelper->getConfig('cookiecompliance/content/read_more_link');
    }

    /**
     * Get text of read more button
     * @return string
     */
    public function getApproveButtonText()
    {
        return $this->_dataHelper->getConfig('cookiecompliance/content/approve_text');
    }

    /**
     * Get button's font colour
     * @param $button
     * @param null/string $state
     * @return mixed
     */
    public function getButtonColor($button, $state = null)
    {
        if ($button == 'read_more') {
            if ($state == 'hover') {
                return $this->_dataHelper->getConfig('cookiecompliance/design/read_more_button/hover_color');
            }

            return $this->_dataHelper->getConfig('cookiecompliance/design/read_more_button/color');
        } elseif ($button == 'approve') {
            if ($state == 'hover') {
                return $this->_dataHelper->getConfig('cookiecompliance/design/approve_button/hover_color');
            }

            return $this->_dataHelper->getConfig('cookiecompliance/design/approve_button/color');
        }
    }

    /**
     * Get button's background
     * @param $button
     * @param null/string $state
     * @return string
     */
    public function getButtonBackground($button, $state = null)
    {
        if ($button == 'read_more') {
            if ($state == 'hover') {
                return $this->_dataHelper->getConfig('cookiecompliance/design/read_more_button/hover_background');
            }

            return $this->_dataHelper->getConfig('cookiecompliance/design/read_more_button/background');
        } elseif ($button == 'approve') {
            if ($state == 'hover') {
                return $this->_dataHelper->getConfig('cookiecompliance/design/approve_button/hover_background');
            }

            return $this->_dataHelper->getConfig('cookiecompliance/design/approve_button/background');
        }
    }

    /**
     * Get button's border colour
     * @param $button
     * @return string
     */
    public function getButtonBorderColor($button)
    {
        if ($button == 'read_more') {
            return $this->_dataHelper->getConfig('cookiecompliance/design/read_more_button/border_color');
        } elseif ($button == 'approve') {
            return $this->_dataHelper->getConfig('cookiecompliance/design/approve_button/border_color');
        }
    }

    /**
     * Get button's border size
     * @param $button
     * @return string
     */
    public function getButtonBorderSize($button)
    {
        if ($button == 'read_more') {
            return $this->_dataHelper->getConfig('cookiecompliance/design/read_more_button/border_size');
        } elseif ($button == 'approve') {
            return $this->_dataHelper->getConfig('cookiecompliance/design/approve_button/border_size');
        }
    }

    /**
     * Get cookie lifetime
     * @return int
     */
    public function getLifeTime()
    {
        return (int) $this->_dataHelper->getConfig('cookiecompliance/functional/lifetime');
    }

    /**
     * Get cookie name
     * @return string
     */
    public function getCookieName()
    {
        return $this->_cookieName;
    }

    /**
     * Get page URL that explain cookies policy
     * @return mixed
     */
    public function getReadMoreUrl()
    {
        $url = $this->_storeManager->getStore()->getBaseUrl() . $this->_dataHelper->getConfig('cookiecompliance/content/read_more_link');
        
        return $url;
    }

    /**
     * Get info whether close button is enabled or disabled
     * @return boolean
     */
    public function isCloseButtonEnabled()
    {
        return (bool) $this->_dataHelper->getConfig('cookiecompliance/functional/close_button/enable_close_button');
    }

    /**
     * Get expected behavrious of close button (once it's clicked)
     * @return string
     */
    public function getCloseButtonBehaviour()
    {
        return $this->_dataHelper->getConfig('cookiecompliance/functional/close_button/close_button_behaviour');
    }

    /**
     * Get logo but only when it can be displayed
     * @return bool/array false when logo shouldn't be displayed, or array with logo details when it should be displayed
     */
    public function getLogo()
    {
        if ((bool) $this->_dataHelper->getConfig('cookiecompliance/design/logo/display') === true) {
            $logo = [
                'src' => $this->_logo->getLogoSrc(),
                'alt' => $this->_logo->getLogoAlt(),
                'width' => $this->_logo->getLogoWidth(),
                'height' => $this->_logo->getLogoHeight()
            ];

            return $logo;
        }

        return false;
    }
}