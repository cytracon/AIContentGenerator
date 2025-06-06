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
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Module\ModuleResource;
use Magento\Framework\AuthorizationInterface;

class Data extends AbstractHelper
{
    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @var ModuleResource
     */
    protected $moduleResource;

    /**
     * @var AuthorizationInterface
     */
    protected $authorization;

    /**
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        ModuleResource $moduleResource,
        AuthorizationInterface $authorization
    ) {
        parent::__construct($context);
        $this->storeManager = $storeManager;
        $this->moduleResource = $moduleResource;
        $this->authorization = $authorization;
    }

    /**
     * @param  string $key
     * @param  null|int $store
     * @return null|string
     */
    public function getConfig($key, $store = null)
    {
        $store = $this->storeManager->getStore($store);
        $websiteId = $store->getWebsiteId();
        $result = $this->scopeConfig->getValue(
            'mgzaicg/' . $key,
            ScopeInterface::SCOPE_STORE,
            $store
        );
        return $result;
    }

    /**
     * @return string|null
     */
    public function isEnabled()
    {
        return $this->authorization->isAllowed('Cytracon_AIContentGenerator::ai') && $this->getConfig('general/enabled');
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->getConfig('text_settings/language');
    }

    /**
     * @return string
     */
    public function getTone()
    {
        return $this->getConfig('text_settings/tone');
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->getConfig('general/secret_key');
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->getConfig('general/model');
    }

    public function getAppVersion()
    {
        return $this->moduleResource->getDataVersion('Cytracon_AIContentGenerator');
    }
}
