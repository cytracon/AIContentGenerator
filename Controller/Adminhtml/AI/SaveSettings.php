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

class SaveSettings extends Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Cytracon_AIContentGenerator::ai';

    /**
     * @var \Magento\Backend\Model\Auth\Session
     */
    protected $authSession;

    /**
     * @var \Magento\Framework\App\Config\Storage\WriterInterface
     */
    protected $configWriter;

    /**
     * @var \Cytracon\AIContentGenerator\Helper\User
     */
    protected $userHelper;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Backend\Model\Auth\Session $authSession
     * @param \Magento\Framework\App\Config\Storage\WriterInterface $configWriter
     * @param \Cytracon\AIContentGenerator\Helper\User $userHelper
     */
    public function __construct(
        Context $context,
        \Magento\Backend\Model\Auth\Session $authSession,
        \Magento\Framework\App\Config\Storage\WriterInterface $configWriter,
        \Cytracon\AIContentGenerator\Helper\User $userHelper
    ) {
        parent::__construct($context);
        $this->authSession = $authSession;
        $this->configWriter = $configWriter;
        $this->userHelper = $userHelper;

        $post = $this->getRequest()->getPostValue();
    }

    public function execute()
    {
        $post = $this->getRequest()->getPostValue();

        $this->configWriter->save('mgzaicg/general/secret_key', isset($post['apiKey']) ? $post['apiKey'] : '');

        $currentUser = $this->authSession->getUser();
        $extra = (array) $currentUser->getExtra();
        $extra['textSettings'] = isset($post['textSettings']) ? $post['textSettings'] : [];
        $currentUser->saveExtra($extra);

        $this->getResponse()->representJson(
            $this->_objectManager->get(\Magento\Framework\Json\Helper\Data::class)->jsonEncode($this->userHelper->getSettings())
        );
    }
}
