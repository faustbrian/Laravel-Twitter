<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Twitter.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;
use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

class TwitterManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \Artisanry\Twitter\TwitterFactory
     */
    private $factory;

    /**
     * Create a new Twitter manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \Artisanry\Twitter\TwitterFactory       $factory
     */
    public function __construct(Repository $config, TwitterFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return mixed
     */
    protected function createConnection(array $config): TwitterOAuth
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName(): string
    {
        return 'laravel-twitter';
    }

    /**
     * Get the factory instance.
     *
     * @return \Artisanry\Twitter\TwitterFactory
     */
    public function getFactory(): TwitterFactory
    {
        return $this->factory;
    }
}
