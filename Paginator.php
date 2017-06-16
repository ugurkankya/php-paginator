<?php
/**
 * @author : Ugurkan Kaya
 * @date   : 16.06.2017
 * @PHP Pagination Implementation
 */
class Paginator implements PaginatorInterface
{
    /**
     * @var $_config
     */
    protected $_config = [];
    /**
     * @var $_perPage
     */
    protected $_perPage;
    /**
     * @var $_pageIndex
     */
    protected $_pageIndex;
    /**
     * @var $_totalResults
     */
    protected $_totalResults;
    /**
     * @var $_currentPage
     */
    protected $_currentPage;
    /**
     * @var $_totalPages
     */
    protected $_totalPages;
    /**
     * @var $_range
     */
    protected $_range;
    /**
     * @var $_start
     */
    protected $_start;
    /**
     * @var $_minRange
     */
    protected $_minRange;
    /**
     * @var $_maxRange
     */
    protected $_maxRange;

    /**
     * Build the __construct()
     * @param array $_config
     */
    public function __construct(array $_config)
    {
        $this->_config = $_config;
        $this->_perPage = $this->_config["perPage"];
        $this->_pageIndex = $this->_config["pageIndex"];
        $this->_totalResults = $this->_config["totalResults"];
        $this->_currentPage = $this->_config["currentPage"];
        $this->_totalPages = ceil($this->_totalResults / $this->_perPage);
        $this->_range = range($this->_currentPage - $this->_pageIndex, $this->_currentPage + $this->_pageIndex);
        $this->_start = ($this->_currentPage * $this->_perPage) - $this->_perPage;
        $this->_minRange = min($this->_range);
        $this->_maxRange = max($this->_range);
    }

    /**
     * Get the page offset and return it.
     * @return string
     */
    public function getOffset(): string
    {
        return $this->_start . "," . $this->_perPage;
    }

    /**
     * Check if the next page is available.
     * @return bool
     */
    public function hasNextPage(): bool
    {
        return ($this->_currentPage < $this->_totalPages);
    }

    /**
     * Check if the previous page is available.
     * @return bool
     */
    public function hasPreviousPage(): bool
    {
        return ($this->_currentPage - 1 > 0 && $this->_currentPage <= $this->_totalPages);
    }

    /**
     * Paginate the results.
     * @return array
     */
    public function paginate(): array
    {
        $arrayPages = [];

        if ($this->_currentPage > 0 && $this->_currentPage <= $this->_totalPages) {
            for ($i = $this->_currentPage >= $this->_pageIndex && $this->_minRange > 0 ? $this->_minRange : 1, $u = $this->_maxRange; $i <= $u; $i++) {
                $arrayPages[] = $i;
            }
        }

        return $arrayPages;
    }
}
