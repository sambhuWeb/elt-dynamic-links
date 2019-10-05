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
        return $_SERVER['HTTP_HOST'] . '/' . $spacePath;
    }
}
