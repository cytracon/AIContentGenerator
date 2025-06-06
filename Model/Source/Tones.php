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

class Tones implements OptionSourceInterface
{

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = [
            'label' => __('Neutral'),
            'value' => 'neutral'
        ];
        $options[] = [
            'label' => __('Professional'),
            'value' => 'professional'
        ];
        $options[] = [
            'label' => __('Casual'),
            'value' => 'casual'
        ];
        $options[] = [
            'label' => __('Straightforward'),
            'value' => 'straightforward'
        ];
        $options[] = [
            'label' => __('Confident'),
            'value' => 'confident'
        ];
        $options[] = [
            'label' => __('Friendly'),
            'value' => 'friendly'
        ];
        $options[] = [
            'label' => __('Creative'),
            'value' => 'creative'
        ];
        $options[] = [
            'label' => __('Funny'),
            'value' => 'funny'
        ];
        $options[] = [
            'label' => __('Informative'),
            'value' => 'informative'
        ];
        $options[] = [
            'label' => 'Persuasive',
            'value' => 'persuasive'
        ];
        return $options;
    }
}
