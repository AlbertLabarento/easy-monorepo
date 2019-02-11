<?php
declare(strict_types=1);

namespace StepTheFkUp\Pagination\Tests\Resolvers;

use StepTheFkUp\Pagination\Resolvers\StartSizeInQueryResolver;
use StepTheFkUp\Pagination\Tests\AbstractResolversTestCase;

final class StartSizeInQueryResolverTest extends AbstractResolversTestCase
{
    /**
     * StartSizeInQueryResolver should resolve pagination data successfully with custom config.
     *
     * @return void
     */
    public function testCustomConfigResolveSuccessfully(): void
    {
        $config = $this->createConfig('page', null, 'perPage');
        $data = (new StartSizeInQueryResolver($config))->resolve($this->createServerRequest([
            'page' => 5,
            'perPage' => 100
        ]));

        self::assertEquals(5, $data->getStart());
        self::assertEquals(100, $data->getSize());
    }

    /**
     * StartSizeInQueryResolver should return data with defaults if query attribute not set.
     *
     * @return void
     */
    public function testDefaultWhenQueryAttrNotSet(): void
    {
        $config = $this->createConfig();
        $data = (new StartSizeInQueryResolver($config))->resolve($this->createServerRequest());

        self::assertEquals($config->getStartDefault(), $data->getStart());
        self::assertEquals($config->getSizeDefault(), $data->getSize());
    }
}