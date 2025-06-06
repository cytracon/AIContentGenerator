<?php
namespace Cytracon\AIContentGenerator\Block\Adminhtml;

class Head extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->registry = $registry;
    }

    public function getCategoryName()
    {
        $category = $this->registry->registry('category');

        if ($category) {
            return $category->getName();
        }
    }

    public function getProductName()
    {
        $product = $this->registry->registry('product');

        if ($product) {
            return $product->getName();
        }
    }

    public function getPageName()
    {
        $page = $this->registry->registry('cms_page');

        if ($page) {
            return $page->getTitle();
        }
    }
}