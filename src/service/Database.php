<?php
declare(strict_types=1);

/**
 * Class Database
 */
class Database implements DatabaseInterface
{
    private const COLUMN_TASK = 'task';
    private const COLUMN_TASK_INDEX = 1;

    private const TABLE_BIANNUAL = 'biannual';
    private const TABLE_MONTH = 'month';
    private const TABLE_ANNUAL = 'annual';
    private const TABLE_QUARTER = 'quarter';
    private const TABLE_WEEK = 'week';

    /**
     * @var PDO
     */
    private $connection;

    /**
     * Database constructor.
     *
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function getWeek(): array
    {
        return $this->fetch(self::TABLE_WEEK);
    }

    /**
     * @return array
     */
    public function getMonth(): array
    {
        return $this->fetch(self::TABLE_MONTH);
    }

    /**
     * @return array
     */
    public function getQuarter(): array
    {
        return $this->fetch(self::TABLE_QUARTER);
    }

    /**
     * @return array
     */
    public function getBiannual(): array
    {
        return $this->fetch(self::TABLE_BIANNUAL);
    }

    /**
     * @return array
     */
    public function getAnnual(): array
    {
        return $this->fetch(self::TABLE_ANNUAL);
    }

    /**
     * @return PDO
     */
    private function getConnection(): PDO
    {
        return $this->connection;
    }

    /**
     * @param string $table
     *
     * @return array
     */
    private function fetch(string $table): array
    {
        $query = $this->getConnection()->query(sprintf('SELECT * FROM %s ORDER BY %s', $table, self::COLUMN_TASK));

        return $query->fetchAll(PDO::FETCH_COLUMN, (string)self::COLUMN_TASK_INDEX);
    }
}
