<?php
declare(strict_types=1);

namespace StepTheFkUp\Pagination;

use StepTheFkUp\Pagination\Interfaces\PagePaginationDataInterface;

final class PagePaginationData implements PagePaginationDataInterface
{
    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $perPage;

    /**
     * PagePaginationData constructor.
     *
     * @param int $page
     * @param int $perPage
     */
    public function __construct(int $page, int $perPage)
    {
        $this->page = $page;
        $this->perPage = $perPage;
    }

    /**
     * Get page number.
     *
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * Get number of items per page.
     *
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }
}