<?php

namespace Mikielis\CookieCompliance\Model;

use \Magento\Cms\Model\ResourceModel\Page\CollectionFactory;

class PageList implements \Magento\Framework\Option\ArrayInterface
{
    private $pageCollectionFactory;

    public function __construct(CollectionFactory $pageCollectionFactory)
    {
        $this->pageCollectionFactory = $pageCollectionFactory;
    }

    /**
     * Returns list of pages
     *
     * @return array
     */
    public function toOptionArray()
    {
        $pageCollection = $this->pageCollectionFactory->create();
        $pageList = array();

        foreach ($pageCollection as $page) {
            $pageList[] = [
                'label' => $page->getTitle(),
                'value' => $page->getIdentifier(),
            ];
        }

        return $pageList;
    }
}
