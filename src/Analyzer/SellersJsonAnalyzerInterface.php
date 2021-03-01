<?php

declare(strict_types=1);

namespace App\Analyzer;

/**
 * SellersJsonAnalyzerInterface.
 */
interface SellersJsonAnalyzerInterface
{
    /**
     * Analyze and store data on sellers.json.
     * @param array $associativeSellersJson
     */
    public function analyze(array $associativeSellersJson): void;
}
