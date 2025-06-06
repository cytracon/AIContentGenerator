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
use Magento\Framework\App\Action\HttpPostActionInterface;

class GenerateText extends Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Cytracon_AIContentGenerator::ai';

    /**
     * @var \Cytracon\AIContentGenerator\Model\ChatGPT
     */
    protected $chatGPT;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Cytracon\AIContentGenerator\Model\ChatGPT $chatGPT
     */
    public function __construct(
        Context $context,
        \Cytracon\AIContentGenerator\Model\ChatGPT $chatGPT
    ) {
        parent::__construct($context);
        $this->chatGPT = $chatGPT;
    }

    public function execute()
    {
        $messages = $this->getRequest()->getPostValue('messages');
        $this->getResponse()->representJson(
            $this->_objectManager->get(\Magento\Framework\Json\Helper\Data::class)->jsonEncode(
                $this->chatGPT->generateText($messages)
            )
        );
    }
}
