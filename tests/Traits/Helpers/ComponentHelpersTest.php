<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Helpers;

use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class ComponentHelpersTest extends TestCase
{
    /** @test */
    public function can_get_current_theme(): void
    {
        $table = new PetsTable();

        $this->assertEquals('tailwind', $table->getTheme());
    }

    /** @test */
    public function can_get_empty_message(): void
    {
        $table = new PetsTable();

        $this->assertEquals('No items found. Try to broaden your search.', $table->getEmptyMessage());
    }

    /** @test */
    public function can_get_offline_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->getOfflineIndicatorStatus());

        $this->assertTrue($table->offlineIndicatorIsEnabled());

        $table->setOfflineIndicatorDisabled();

        $this->assertTrue($table->offlineIndicatorIsDisabled());

        $this->assertFalse($table->getOfflineIndicatorStatus());
    }

    /** @test */
    public function can_get_default_sorting_labels(): void
    {
        $table = new PetsTable();

        $this->assertSame('A-Z', $table->getDefaultSortingLabelAsc());
        $this->assertSame('Z-A', $table->getDefaultSortingLabelDesc());
    }

    /** @test */
    public function can_get_query_string_status(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->getQueryStringStatus());

        $this->assertTrue($table->queryStringIsEnabled());

        $table->setQueryStringDisabled();

        $this->assertTrue($table->queryStringIsDisabled());

        $this->assertFalse($table->getQueryStringStatus());
    }

    /** @test */
    public function can_get_table_name(): void
    {
        $table = new PetsTable();

        $this->assertSame('table', $table->getTableName());

        $table->setTableName('table2');

        $this->assertSame('table2', $table->getTableName());
    }

    /** @test */
    public function can_get_table_query_alias(): void
    {
        $table = new PetsTable();

        $this->assertSame('t', $table->getTableQueryAlias());

        $table->setTableQueryAlias('q');

        $this->assertSame('q', $table->getTableQueryAlias());
    }

    /** @test */
    public function can_get_page_name(): void
    {
        $table = new PetsTable();

        $this->assertNull($table->getPageName());

        $table->setPageName('page2');

        $this->assertSame('page2', $table->getPageName());
    }

    /** @test */
    public function can_check_if_table_equals_name(): void
    {
        $table = new PetsTable();

        $this->assertTrue($table->isTableNamed('table'));
        $this->assertFalse($table->isTableNamed('table2'));

        $table->setTableName('table2');

        $this->assertTrue($table->isTableNamed('table2'));
    }

    /** @test */
    public function can_check_if_table_has_page_name(): void
    {
        $table = new PetsTable();

        $this->assertFalse($table->hasPageName());

        $table->setPageName('page2');

        $this->assertTrue($table->hasPageName());
    }
}
