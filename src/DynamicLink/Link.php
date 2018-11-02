<?php
namespace ELT\DynamicLink;

abstract class Link implements LinkInterface
{
    protected $link = [];

    public function getLink(String $countryCode): array
    {   
        return $this->links()[$countryCode];
    }

    protected abstract function links(): array;
}
