<?php
namespace ELT\AssetLink;

class DigitalOceanSpaceLinkGenerator implements AssetLinkGenerator
{
    const BASE_PATH = 'https://everest-space.ams3.cdn.digitaloceanspaces.com/';

    /**
     * Generate Cloudinary Path
     *
     * Input:
     * $spaceNames: ['digital_ocean_space']
     * $spacePath: 'assets/keyboard/bangla/bengali_keyboard.php'
     * $additionalUrlParts: ''
     *
     * Output:
     * https://everest-space.ams3.cdn.digitaloceanspaces.com/assets/keyboard/bangla/bengali_keyboard.php
     *
     * @param array $spaceNames
     * @param string $spacePath
     * @param string $additionalUrlParts
     * @param string $version
     * @return string
     */
    public function linkGenerate(
        array $spaceNames,
        string $spacePath,
        string $additionalUrlParts,
        string $version
    ) {
        return self::BASE_PATH . $additionalUrlParts . $spacePath;
    }
}
