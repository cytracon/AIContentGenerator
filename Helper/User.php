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

namespace Cytracon\AIContentGenerator\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class User extends AbstractHelper
{
    /**
     * @var \Magento\Backend\Model\Auth\Session
     */
    protected $authSession;

    /**
     * @var \Cytracon\AIContentGenerator\Helper\Data
     */
    protected $dataHelper;

    public function __construct(
        Context $context,
        \Magento\Backend\Model\Auth\Session $authSession,
        \Cytracon\AIContentGenerator\Helper\Data $dataHelper

    ) {
        parent::__construct($context);
        $this->authSession = $authSession;
        $this->dataHelper = $dataHelper;
    }

    public function getSettings()
    {
        $currentUser = $this->authSession->getUser();
        $extra = $currentUser->getExtra();
        return [
            'apiKey' => $this->dataHelper->getApiKey(),
            'textSettings' => isset($extra['textSettings']) ? $extra['textSettings'] : []
        ];
    }
}