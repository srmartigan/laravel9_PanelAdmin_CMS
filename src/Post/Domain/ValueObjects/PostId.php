<?php

declare(strict_types=1);

namespace Src\Post\Domain\ValueObjects;


use InvalidArgumentException;

final class PostId
{
    private int $value;

    /**
     * UserId constructor.
     * @param int $id
     * @throws InvalidArgumentException
     */
    public function __construct(int $id)
    {
        $this->validate($id);
        $this->value = $id;
    }

    /**
     * @param int $id
     * @throws InvalidArgumentException
     */
    private function validate(int $id): void
    {
        if ($id < 1) {
            throw new InvalidArgumentException('PostId must be greater than 0');
        }

        if ($id > PHP_INT_MAX) {
            throw new InvalidArgumentException('PostId must be less than PHP_INT_MAX');
        }


    }

    public function value(): int
    {
        return $this->value;
    }

}
