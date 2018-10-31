<?php

namespace ELT\DynamicLink;

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
