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

namespace Cytracon\AIContentGenerator\Plugin\Model\Wysiwyg;

class Config
{
    /**
     * @var \Cytracon\AIContentGenerator\Model\AI\ConfigProvider
     */
    protected $configProvider;

    /**
     * @var \Cytracon\AIContentGenerator\Helper\Data
     */
    protected $dataHelper;

    /**
     * @param \Cytracon\AIContentGenerator\Model\AI\ConfigProvider $configProvider
     * @param \Cytracon\AIContentGenerator\Helper\Data $dataHelper
     */
    public function __construct(
        \Cytracon\AIContentGenerator\Model\AI\ConfigProvider $configProvider,
        \Cytracon\AIContentGenerator\Helper\Data $dataHelper
    ) {
        $this->configProvider = $configProvider;
        $this->dataHelper = $dataHelper;
    }

    public function afterGetConfig(
        $subject,
        $result
    ) {
        if ($this->dataHelper->isEnabled()) {
            return $this->configProvider->getConfig($result);
        }
        return $result;
    }
}