<?php
/**
 * Cytracon
 *
 * This source file is subject to the Cytracon Software License, which is available at https://www.cytracon.com/license
 * Do not edit or add to this file if you wish to upgrade the to newer versions in the future.
 * If you wish to customize this module for your needs.
 * Please refer to https://www.cytracon.com for more information.
 *
 * @category  Cytracon
 * @package   Cytracon_AIContentGenerator
 * @copyright Copyright (C) 2024 Cytracon (https://www.cytracon.com)
 */

namespace Cytracon\AIContentGenerator\Block\Adminhtml\Renderer\Config;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Config\Block\System\Config\Form\Field;

class Version extends Field
{
    /**
     * @var \Cytracon\AIContentGenerator\Helper\Data
     */
    protected $dataHelper;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Cytracon\AIContentGenerator\Helper\Data $dataHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        \Cytracon\AIContentGenerator\Helper\Data $dataHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->dataHelper = $dataHelper;
    }

    /**
     * @param  AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->dataHelper->getAppVersion();
    }
}
