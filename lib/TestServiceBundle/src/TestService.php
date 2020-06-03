<?php
declare(strict_types=1);

namespace Test\TestServiceBundle;

final class TestService
{
    /**
     * @var bool
     */
    private $useExpressionLanguage;

    /**
     * @var mixed[]
     */
    private $types;

    /**
     * TestService constructor.
     *
     * @param bool $useExpressionLanguage
     * @param mixed[] $types
     */
    public function __construct(bool $useExpressionLanguage = false, array $types = [])
    {
        dump($useExpressionLanguage, $types);

        $this->useExpressionLanguage = $useExpressionLanguage;
        $this->types = $types;
    }
}
