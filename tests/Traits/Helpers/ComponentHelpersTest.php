<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Helpers;

use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class ComponentHelpersTest extends TestCase
{
    /** @test */
    public function can_get_current_theme(): void
    {
        $this->assertEquals('tailwind', $this->basicTable->getTheme());
    }

    /** @test */
    public function can_get_empty_message(): void
    {
        $this->assertEquals('No items found. Try to broaden your search.', $this->basicTable->getEmptyMessage());
    }

    /** @test */
    public function can_get_offline_status(): void
    {
        $this->assertTrue($this->basicTable->getOfflineIndicatorStatus());

        $this->assertTrue($this->basicTable->offlineIndicatorIsEnabled());

        $this->basicTable->setOfflineIndicatorDisabled();

        $this->assertTrue($this->basicTable->offlineIndicatorIsDisabled());

        $this->assertFalse($this->basicTable->getOfflineIndicatorStatus());
    }

    /** @test */
    public function can_get_default_sorting_labels(): void
    {
        $this->assertSame('A-Z', $this->basicTable->getDefaultSortingLabelAsc());
        $this->assertSame('Z-A', $this->basicTable->getDefaultSortingLabelDesc());
    }

    /** @test */
    public function can_get_query_string_status(): void
    {
        $this->assertTrue($this->basicTable->getQueryStringStatus());

        $this->assertTrue($this->basicTable->queryStringIsEnabled());

        $this->basicTable->setQueryStringDisabled();

        $this->assertTrue($this->basicTable->queryStringIsDisabled());

        $this->assertFalse($this->basicTable->getQueryStringStatus());
    }

    /** @test */
    public function can_get_table_name(): void
    {
        $this->assertSame('table', $this->basicTable->getTableName());

        $this->basicTable->setTableName('table2');

        $this->assertSame('table2', $this->basicTable->getTableName());
    }

    /** @test */
    public function can_get_table_query_alias(): void
    {
        $this->assertSame('t', $this->basicTable->getTableQueryAlias());

        $this->basicTable->setTableQueryAlias('q');

        $this->assertSame('q', $this->basicTable->getTableQueryAlias());
    }

    /** @test */
    public function can_get_page_name(): void
    {
        $this->assertNull($this->basicTable->getPageName());

        $this->basicTable->setPageName('page2');

        $this->assertSame('page2', $this->basicTable->getPageName());
    }

    /** @test */
    public function can_check_if_table_equals_name(): void
    {
        $this->assertTrue($this->basicTable->isTableNamed('table'));
        $this->assertFalse($this->basicTable->isTableNamed('table2'));

        $this->basicTable->setTableName('table2');

        $this->assertTrue($this->basicTable->isTableNamed('table2'));
    }

    /** @test */
    public function can_check_if_table_has_page_name(): void
    {
        $this->assertFalse($this->basicTable->hasPageName());

        $this->basicTable->setPageName('page2');

        $this->assertTrue($this->basicTable->hasPageName());
    }
}
