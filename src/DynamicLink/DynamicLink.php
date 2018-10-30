<?php

namespace ELT\DynamicLink;

class DynamicLink
{
    public function getLink(array $dynamicLinks, String $countryCode): array
    {
        return $dynamicLinks[$countryCode];
    }
}
