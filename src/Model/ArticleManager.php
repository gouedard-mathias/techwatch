<?php


namespace App\Model;


class ArticleManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'article';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function getTechnologyWatchOfWeek(): array
    {
        $query = "SELECT * FROM article WHERE week(created_at)=week(curdate()) ORDER BY star DESC LIMIT 1";
        return $this->pdo->query($query)->fetch();
    }

    public function getTechnologyWatchRand(): array
    {
        $query = "SELECT * FROM article ORDER BY RAND()";
        return $this->pdo->query($query)->fetchAll();
    }

    public function getTechnologyWatchByDate(): array
    {
        $query = "SELECT * FROM article ORDER BY created_at DESC";
        return $this->pdo->query($query)->fetchAll();
    }

    public function getTechnologyWatchByStar(): array
    {
        $query = "SELECT * FROM article ORDER BY star DESC";
        return $this->pdo->query($query)->fetchAll();
    }
}
