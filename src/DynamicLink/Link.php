<?php
namespace ELT\DynamicLink;

abstract class Link implements LinkInterface
{
    protected $link = [];

    public function getLink(String $countryCode): array
    {   
        return $this->links()[$countryCode];
    }

    public function getGroupLink(array $countriesGroup, array $groupLink): array
    {
        $groupLinks = [];

        foreach ($countriesGroup as $countryCode) {
            $groupLinks[$countryCode] = $groupLink;
        }

        return $groupLinks;
    }

    protected abstract function links(): array;
}
