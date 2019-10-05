<?php

namespace ELT\AssetLink;

interface AssetLinkGenerator
{
    /**
     * @param array $spaceNames
     * @param string $spacePath
     * @param string $additionalUrlParts
     * @param string $version
     * @return mixed
     */
    public function linkGenerate(
        array $spaceNames,
        string $spacePath,
        string $additionalUrlParts,
        string $version
    );
}
