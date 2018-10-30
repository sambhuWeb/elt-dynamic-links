<?php

namespace ELT\DynamicLink;

interface LinkInterface
{
    public function getLink(String $countryCode): array;
}
