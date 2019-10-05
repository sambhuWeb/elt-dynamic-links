<?php
namespace ELT\AssetLink;

class CloudinaryLinkGenerator implements AssetLinkGenerator
{
    const BASE_PATH = 'https://res.cloudinary.com/elt/image/upload/';

    /**
     * Generate Cloudinary Path
     *
     * Input:
     * $spaceNames: ['cloudinary']
     * $spacePath: 'assets/keyboard/bangla/bengali_keyboard.php'
     * $additionalUrlParts: ''
     * $version: 'v1569962666/'
     *
     * Output:
     * https://res.cloudinary.com/elt/image/upload/v1569962666/assets/keyboard/bangla/bengali_keyboard.php
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
        return self::BASE_PATH . $additionalUrlParts . $version . $spacePath;
    }
}
