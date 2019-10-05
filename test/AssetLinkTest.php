<?php
namespace test;

use ELT\AssetLink\AssetLink;
use PHPUnit\Framework\TestCase;

class AssetLinkTest extends TestCase
{
    private $assetLink;

    public function setUp()
    {
        $this->assetLink = new AssetLink();
    }

    public function tearDown()
    {
        $this->assetLink = null;
    }

    /**
     * @test
     */
    public function asset_link_class_returns_local_link()
    {
        $_SERVER['HTTP_HOST'] = 'easynepalityping.com';

        $this->assertEquals(
            'http://www.easynepalityping.com/public/assets/keyboard/bangla/bengali_keyboard.php',
            $this->assetLink->generate(
                ['local'], 'assets/keyboard/bangla/bengali_keyboard.php'
            )
        );
    }

    /**
     * @test
     * @dataProvider differentHttpHostProvider
     * @param string $httpHost
     */
    public function different_http_host_should_return_uniform_local_link(string $httpHost)
    {
        $_SERVER['HTTP_HOST'] = $httpHost;

        $this->assertEquals(
            'http://www.easyhindityping.com/public/assets/keyboard/bangla/bengali_keyboard.php',
            $this->assetLink->generate(
                ['local'], 'assets/keyboard/bangla/bengali_keyboard.php'
            )
        );
    }

    public function differentHttpHostProvider()
    {
        return [
            ['easyhindityping.com'],
            ['www.easyhindityping.com'],
            ['http://www.easyhindityping.com'],
            ['http://easyhindityping.com'],
        ];
    }

    /**
     * @test
     * @dataProvider invalidSpaceNameProvider
     * @param array $spaceNames
     */
    public function invalid_spaces_names_returns_local_link(array $spaceNames)
    {
        $_SERVER['HTTP_HOST'] = 'http://www.easyhindityping.com';

        $this->assertEquals(
            'http://www.easyhindityping.com/public/assets/keyboard/bangla/bengali_keyboard.php',
            $this->assetLink->generate(
                $spaceNames, 'assets/keyboard/bangla/bengali_keyboard.php'
            )
        );
    }

    /**
     * @test
     * @dataProvider spaceNameProvider
     * @param array $spaceNames
     * @param string $cloudinaryConfigStatus
     * @param string $digitalOceanSpaceConfigStatus
     * @param string $expectedLink
     */
    public function fetch_link_based_on_first_valid_space_name_that_has_config_enable_to_true(
        array $spaceNames,
        string $cloudinaryConfigStatus,
        string $digitalOceanSpaceConfigStatus,
        string $expectedLink
    ){
        if ($cloudinaryConfigStatus === 'CLOUDINARY_ENABLED') {
            define('USE_CLOUDINARY_CDN', true);
        }

        if ($cloudinaryConfigStatus === 'CLOUDINARY_DISABLED') {
            define('USE_CLOUDINARY_CDN', false);
        }

        if ($digitalOceanSpaceConfigStatus === 'DIGITAL_OCEAN_SPACE_ENABLED') {
            define('USE_DIGITAL_OCEAN_CDN', true);
        }

        if ($digitalOceanSpaceConfigStatus === 'DIGITAL_OCEAN_SPACE_DISABLED') {
            define('USE_DIGITAL_OCEAN_CDN', false);
        }

        $this->assertEquals(
            $expectedLink,
            $this->assetLink->generate(
                $spaceNames, 'assets/keyboard/bangla/bengali_keyboard.php', '', 'v1569962666/'
            )
        );
    }

    /**
     * @return array
     */
    public function invalidSpaceNameProvider()
    {
        return [
            [[]], // If space name is empty
            [['non_existent_space_name']]
        ];
    }

    /**
     * @return array
     */
    public function spaceNameProvider()
    {
        return[
            [
                [
                    'cloudinary',
                    'digital_ocean_space',
                    'local'
                ],
                'CLOUDINARY_ENABLED',
                'DIGITAL_OCEAN_SPACE_ENABLED',
                'https://res.cloudinary.com/elt/image/upload/v1569962666/assets/keyboard/bangla/bengali_keyboard.php'
            ],
            [
                [
                    'digital_ocean_space',
                    'cloudinary',
                    'local'
                ],
                'CLOUDINARY_ENABLED',
                'DIGITAL_OCEAN_SPACE_ENABLED',
                'https://everest-space.ams3.cdn.digitaloceanspaces.com/assets/keyboard/bangla/bengali_keyboard.php'
            ]
        ];
    }
}
