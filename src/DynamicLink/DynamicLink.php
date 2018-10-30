<?php

namespace ELT\DynamicLink;

class DynamicLink
{
    public function getLink(String $countryCode, String $linkClass, array $inputData = []): array
    {
        $class = 'ELT\\DynamicLink\\' . $linkClass;
        
        return (new $class())->getLink($countryCode, $inputData);
    }
}
