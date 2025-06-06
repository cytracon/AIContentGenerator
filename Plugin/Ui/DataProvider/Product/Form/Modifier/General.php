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

namespace Cytracon\AIContentGenerator\Plugin\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Api\Data\ProductAttributeInterface;
use Magento\Framework\Stdlib\ArrayManager;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\General as CatalogGeneral;

class General
{
    /**
     * @var ArrayManager
     */
    protected $arrayManager;

    /**
     * @var \Cytracon\AIContentGenerator\Helper\Data
     */
    protected $dataHelper;

    /**
     * @param ArrayManager $arrayManager
     * @param \Cytracon\AIContentGenerator\Helper\Data $dataHelper
     */
    public function __construct(
        ArrayManager $arrayManager,
        \Cytracon\AIContentGenerator\Helper\Data $dataHelper
    ) {
        $this->arrayManager = $arrayManager;
        $this->dataHelper = $dataHelper;
    }

    public function prepareTextarea($meta, $code)
    {
        $path = $this->arrayManager->findPath(
            $code,
            $meta,
            null,
            'children'
        );
        $config = [
            'component' => 'Cytracon_AIContentGenerator/js/form/element/textarea',
            'elementTmpl' => 'Cytracon_AIContentGenerator/form/element/textarea',
        ];

        if ($code === ProductAttributeInterface::CODE_SEO_FIELD_META_KEYWORD) {
            $config['component'] = 'Cytracon_AIContentGenerator/js/form/element/meta-keywords';
        }
        if ($code === ProductAttributeInterface::CODE_SEO_FIELD_META_DESCRIPTION) {
            $config['component'] = 'Cytracon_AIContentGenerator/js/form/element/meta-description';
        }

        return $this->arrayManager->merge($path . CatalogGeneral::META_CONFIG_PATH, $meta, $config);
    }

    public function afterModifyMeta(
        $subject,
        $result
    ) {
        if ($this->dataHelper->isEnabled()) {
            $metaTitlePath = $this->arrayManager->findPath(
                ProductAttributeInterface::CODE_SEO_FIELD_META_TITLE,
                $result,
                null,
                'children'
            );
            $urlKeyConfig = [
                'component' => 'Cytracon_AIContentGenerator/js/form/element/product-meta-title'
            ];
            $result = $this->arrayManager->merge($metaTitlePath . CatalogGeneral::META_CONFIG_PATH, $result, $urlKeyConfig);

            $result = $this->prepareTextarea($result, ProductAttributeInterface::CODE_SEO_FIELD_META_KEYWORD);
            $result = $this->prepareTextarea($result, ProductAttributeInterface::CODE_SEO_FIELD_META_DESCRIPTION);
        }

        return $result;
    }
}