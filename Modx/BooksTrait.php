<?php namespace App\Modx;

use App\Books;

trait BooksTrait {

    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function bootBooksTrait()
    {
        static::addGlobalScope(new BooksScope());
    }

    /**
     * Get the name of the column for applying the scope.
     *
     * @return string
     */
    public function getParentColumn()
    {
        return defined('static::PARENT_COLUMN') ? static::PARENT_COLUMN : 'parent';
    }

    /**
     * Get the fully qualified column name for applying the scope.
     *
     * @return string
     */
    public function getQualifiedParentColumn()
    {
        return $this->getTable().'.'.$this->getParentColumn();
    }

    /**
     * Get the query builder without the scope applied.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function withDrafts()
    {
        return with(new static)->newQueryWithoutScope(new BooksScope());
    }
}