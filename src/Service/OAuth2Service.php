<?php

declare(strict_types=1);

namespace App\Service;

use Defuse\Crypto\Exception\BadFormatException;
use Defuse\Crypto\Exception\EnvironmentIsBrokenException;
use Defuse\Crypto\Key;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface;
use League\OAuth2\Server\Repositories\ClientRepositoryInterface;
use League\OAuth2\Server\Repositories\RefreshTokenRepositoryInterface;
use League\OAuth2\Server\Repositories\ScopeRepositoryInterface;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;

class OAuth2Service
{
    private AuthorizationServer $authorizationServer;

    /**
     * @throws EnvironmentIsBrokenException
     * @throws BadFormatException
     */
    public function __construct(
        private ClientRepositoryInterface $clientRepository,
        private AccessTokenRepositoryInterface $accessTokenRepository,
        private ScopeRepositoryInterface $scopeRepository,
        private UserRepositoryInterface $userRepository,
        private RefreshTokenRepositoryInterface $refreshTokenRepository,
        private string $privateKeyPath,
        private string $encryptionKey,
    ) {
        $key = Key::loadFromAsciiSafeString($this->encryptionKey);

        $this->authorizationServer = new AuthorizationServer(
            $this->clientRepository, $this->accessTokenRepository, $this->scopeRepository, $this->privateKeyPath, $key
        );
    }


}
