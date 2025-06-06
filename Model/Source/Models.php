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

namespace Cytracon\AIContentGenerator\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Models implements OptionSourceInterface
{

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = [
            'label' => 'GPT-4o',
            'value' => 'gpt-4o'
        ];
        $options[] = [
            'label' => 'GPT-4 Turbo',
            'value' => 'gpt-4-turbo'
        ];
        $options[] = [
            'label' => 'GPT-3.5 Turbo',
            'value' => 'gpt-3-5-turbo'
        ];
        return $options;
    }
}
