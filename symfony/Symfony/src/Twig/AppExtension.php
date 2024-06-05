<?php
// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension {
    public function getFilters(): array {
        return [
            new TwigFilter('puissance', [$this, 'filterPuissance']),
        ];
    }

    public function filterPuissance(float $number, int $decimals = 0): string
    {
        $puissance = number_format($number, $decimals);
        $puissance = $puissance . " cv";

        return $puissance;
    }
}