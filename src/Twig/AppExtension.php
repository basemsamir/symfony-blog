<?php


namespace App\Twig;


use Carbon\Carbon;
use Twig\TwigFilter;

class AppExtension extends \Twig\Extension\AbstractExtension
{

    public function getFilters(): array
    {
        return [
            new TwigFilter('duration',[$this, 'getDuration'])
        ];
    }

    public function getDuration($date): string
    {
        $date = Carbon::parse($date);
        return $date->diffForHumans();
    }
}