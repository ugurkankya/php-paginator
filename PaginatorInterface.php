<?php
/**
 * @author : Ugurkan Kaya
 * @date   : 16.06.2017
 * @PHP Pagination Implementation
 */
interface PaginatorInterface
{
    /**
     * Get the page offset and return it.
     * @return string
     */
    public function getOffset(): string;
    /**
     * Check if the next page is available.
     * @return bool
     */
    public function hasNextPage(): bool;
    /**
     * Check if the previous page is available.
     * @return bool
     */
    public function hasPreviousPage(): bool;
    /**
     * Paginate the results.
     * @return array
     */
    public function paginate(): array;
}
