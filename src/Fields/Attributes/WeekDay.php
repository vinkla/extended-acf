<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait WeekDay
{
    public function weekStartsOn(int $day): self
    {
        $this->config->set('first_day', $day);

        return $this;
    }
}
