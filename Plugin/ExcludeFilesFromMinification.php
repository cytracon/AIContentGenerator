<?php

namespace Cytracon\AIContentGenerator\Plugin;
use Magento\Framework\View\Asset\Minification;

class ExcludeFilesFromMinification
{
    public function afterGetExcludes(Minification $subject, array $result, $contentType)
    {
        if ($contentType == 'js') {
            $result[] = '/Cytracon_AIContentGenerator/';
        }
        return $result;
    }
}