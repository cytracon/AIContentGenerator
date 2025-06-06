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

namespace Cytracon\AIContentGenerator\Controller\Adminhtml\AI;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;

class LoadSettings extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Cytracon_AIContentGenerator::ai';

    /**
     * @var \Cytracon\AIContentGenerator\Helper\User
     */
    protected $userHelper;

    /**
     * @var \Cytracon\AIContentGenerator\Model\I18n
     */
    protected $i18n;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Cytracon\AIContentGenerator\Helper\User $userHelper
     */
    public function __construct(
        Context $context,
        \Cytracon\AIContentGenerator\Helper\User $userHelper,
        \Cytracon\AIContentGenerator\Model\I18n $i18n
    ) {
        parent::__construct($context);
        $this->userHelper = $userHelper;
        $this->i18n = $i18n;
    }

    public function execute()
    {
        $this->getResponse()->representJson(
            $this->_objectManager->get(\Magento\Framework\Json\Helper\Data::class)->jsonEncode([
                'settings' => $this->userHelper->getSettings(),
                'i18n' => $this->i18n->getI18n()
            ])
        );
    }
}
