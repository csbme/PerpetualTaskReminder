<?php
declare(strict_types=1);

/**
 * Class Main
 */
class Main
{
    private const INTERVAL_MONTH = 4;
    private const INTERVAL_QUARTER = 13;
    private const INTERVAL_BIANNUAL = 26;
    private const INTERVAL_ANNUAL = 52;

    /**
     * @var DatabaseInterface
     */
    private $database;

    /**
     * Main constructor.
     *
     * @param DatabaseInterface $database
     */
    public function __construct(DatabaseInterface $database)
    {
        $this->database = $database;
    }

    public function execute(): void
    {
        $this->printBeginText();

        foreach ($this->numberOfWeeksInOneYear() as $weekNumber) {
            $this->mainLoop($weekNumber);
        }

        $this->printEndText();
    }

    /**
     * @return DatabaseInterface
     */
    private function getDatabase(): DatabaseInterface
    {
        return $this->database;
    }


    /**
     * @param int $weekNumber
     */
    private function mainLoop(int $weekNumber): void
    {
        $this->printCurrentWeekNumber($weekNumber);

        // prints all weekly tasks
        $this->foreachEcho($this->getDatabase()->getWeek());

        if ($weekNumber % self::INTERVAL_MONTH === 0) {
            $this->foreachEcho($this->getDatabase()->getMonth());
        }

        if ($weekNumber % self::INTERVAL_QUARTER === 0) {
            $this->foreachEcho($this->getDatabase()->getQuarter());
        }

        if ($weekNumber % self::INTERVAL_BIANNUAL === 0) {
            $this->foreachEcho($this->getDatabase()->getBiannual());
        }

        if ($weekNumber === self::INTERVAL_ANNUAL) {
            $this->foreachEcho($this->getDatabase()->getAnnual());
        }
    }

    /**
     * @param array $array
     */
    private function foreachEcho(array $array): void
    {
        foreach ($array as $key => $item) {
            echo $this->lineBreak(Constant::FORMAT_TAB_SPACE.$item);
        }

        echo $this->lineBreak();
    }

    /**
     * @param string $string
     *
     * @return string
     */
    private function lineBreak(string $string = ''): string
    {
        return $string.Constant::FORMAT_LINE_BREAK;
    }

    /**
     * @param int $weekNumber
     */
    private function printCurrentWeekNumber(int $weekNumber): void
    {
        echo $this->lineBreak(Constant::TEXT_WEEK_NUMBER.$weekNumber.':');
    }

    private function printBeginText(): void
    {
        echo $this->lineBreak(Constant::TEXT_BEGIN);
    }

    private function printEndText(): void
    {
        echo Constant::TEXT_END;
    }

    /**
     * @return array
     */
    private function numberOfWeeksInOneYear(): array
    {
        return range(Constant::WEEK_NUMBER_START, Constant::WEEK_NUMBER_END);
    }
}

