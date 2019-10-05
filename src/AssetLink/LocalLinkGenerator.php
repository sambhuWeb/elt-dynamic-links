<?php
namespace ELT\AssetLink;

class LocalLinkGenerator implements AssetLinkGenerator
{
    public function linkGenerate(
        array $spaceNames,
        string $spacePath,
        string $additionalUrlParts,
        string $version
    ) {
        $domainName = $_SERVER['HTTP_HOST'] . '/public/' . $spacePath;

        if(strpos($domainName, 'http://') !== 0) {
            $domainName = 'http://' . $domainName;
        }

        if(!preg_match('/www/', $_SERVER['HTTP_HOST'])) {
            $domainNameParts = explode('http://', $domainName);

            $domainNameParts[1] = 'www.' . $domainNameParts[1];

            $domainName = 'http://' . $domainNameParts[1];
        }

        return $domainName;
    }
}
