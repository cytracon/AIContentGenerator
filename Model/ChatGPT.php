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

namespace Cytracon\AIContentGenerator\Model;

class ChatGPT
{
    private $textURL = "https://api.openai.com/v1/chat/completions";

    protected $curl;

    /**
     * @var \Cytracon\AIContentGenerator\Helper\Data
     */
    protected $dataHelper;

    public function __construct(
        \Cytracon\AIContentGenerator\Helper\Data $dataHelper
    ) {
        $this->curl = curl_init();
        $this->dataHelper = $dataHelper;
    }

    public function initialize($requestType = "text")
    {
        $this->curl = curl_init();

        if ($requestType === 'text')
            curl_setopt($this->curl, CURLOPT_URL, $this->textURL);

        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_POST, true);

        $headers = array(
            "Content-Type: application/json",
            "Authorization: Bearer " . $this->dataHelper->getApikey()
        );

        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
    }

    public function generateText($messages, $temperature = 0.7, $maxTokens = 1000)
    {
        curl_reset($this->curl);
        $this->initialize('text');

        $data['model'] = $this->dataHelper->getModel();
        $data['messages'] = $messages;
        $data['temperature'] = $temperature;
        $data['max_tokens'] = $maxTokens;

        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($this->curl);
        $response = json_decode($response, true);

        return $response;
    }
}