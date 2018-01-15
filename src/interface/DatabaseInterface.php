<?php
declare(strict_types=1);

/**
 * Class Database
 */
interface DatabaseInterface
{
    /**
     * @return array
     */
    public function getWeek(): array;

    /**
     * @return array
     */
    public function getMonth(): array;

    /**
     * @return array
     */
    public function getQuarter(): array;

    /**
     * @return array
     */
    public function getBiannual(): array;

    /**
     * @return array
     */
    public function getAnnual(): array;
}
