<?php

namespace App\Values;

use Illuminate\Contracts\Support\Arrayable;
use Laravel\Sanctum\NewAccessToken;

/**
 * A "composition token" consists of two tokens:
 *
 * - an API token, which has all abilities
 *
 * This approach helps prevent the API token from being logged by servers and proxies.
 */
final class CompositionToken implements Arrayable
{
    private function __construct(public string $apiToken)
    {
    }

    public static function fromAccessTokens(NewAccessToken $api): self
    {
        return new self($api->plainTextToken);
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [
            'token' => $this->apiToken
        ];
    }
}
