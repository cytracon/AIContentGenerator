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

class Languages implements OptionSourceInterface
{

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = [
            'label' => __('Arabic'),
            'value' => 'arabic'
        ];
        $options[] = [
            'label' => __('Chinese'),
            'value' => 'chinese'
        ];
        $options[] = [
            'label' => __('Czech'),
            'value' => 'czech'
        ];
        $options[] = [
            'label' => __('Danish'),
            'value' => 'danish'
        ];
        $options[] = [
            'label' => __('Dutch'),
            'value' => 'dutch'
        ];
        $options[] = [
            'label' => __('English'),
            'value' => 'english'
        ];
        $options[] = [
            'label' => __('Finnish'),
            'value' => 'finnish'
        ];
        $options[] = [
            'label' => __('French'),
            'value' => 'french'
        ];
        $options[] = [
            'label' => __('German'),
            'value' => 'german'
        ];
        $options[] = [
            'label' => 'Greek',
            'value' => 'greek'
        ];
        $options[] = [
            'label' => 'Greek',
            'value' => 'greek'
        ];

        $options[] = [
            'label' => 'Hebrew',
            'value' => 'hebrew'
        ];
        $options[] = [
            'label' => 'Hindi',
            'value' => 'hindi'
        ];
        $options[] = [
            'label' => 'Hungarian',
            'value' => 'hungarian'
        ];
        $options[] = [
            'label' => 'Indonesian',
            'value' => 'indonesian'
        ];
        $options[] = [
            'label' => 'Italian',
            'value' => 'italian'
        ];


        $options[] = [
            'label' => 'Japanese',
            'value' => 'japanese'
        ];
        $options[] = [
            'label' => 'Korean',
            'value' => 'korean'
        ];
        $options[] = [
            'label' => 'Malay',
            'value' => 'malay'
        ];
        $options[] = [
            'label' => 'Norwegian',
            'value' => 'norwegian'
        ];
        $options[] = [
            'label' => 'Persian',
            'value' => 'persian'
        ];
        $options[] = [
            'label' => 'Polish',
            'value' => 'polish'
        ];

        $options[] = [
            'label' => 'Portuguese',
            'value' => 'portuguese'
        ];
        $options[] = [
            'label' => 'Russian',
            'value' => 'russian'
        ];
        $options[] = [
            'label' => 'Spanish',
            'value' => 'spanish'
        ];
        $options[] = [
            'label' => 'Swedish',
            'value' => 'swedish'
        ];
        $options[] = [
            'label' => 'Slovak',
            'value' => 'slovak'
        ];
        $options[] = [
            'label' => 'Thai',
            'value' => 'thai'
        ];

        $options[] = [
            'label' => 'Turkish',
            'value' => 'turkish'
        ];
        $options[] = [
            'label' => 'Vietnamese',
            'value' => 'vietnamese'
        ];


        
        return $options;
    }
}
