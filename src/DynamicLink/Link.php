<?php

namespace ELT\DynamicLink;

use ELT\DynamicLink\LinkInterface;

class Link implements LinkInterface
{
    protected $link = [];

    public function getLink(String $countryCode, array $inputData = []): array
    {
        if (!empty($inputData)) {
            return $inputData[$countryCode];
        }
        
        return $this->links[$countryCode];
    }
}
