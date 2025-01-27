<?php

namespace HackerESQ\FilterModels\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Database\Eloquent\Model;
use HackerEsq\FilterModels\FilterModels;

class FilterModelsTest extends TestCase
{
    /** 
     * Get package providers.
     * 
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [\HackerEsq\FilterModels\FilterModelsServiceProvider::class];
    }

    /** @test */
    public function it_can_set_the_query_property()
    {
        $filters = new FilterModels;

        $filters->setQuery(TestModel::query());

        $this->assertEquals(TestModel::query(), $filters->query);
    }

    // /** @test */
    // public function it_can_set_the_scopes_property()
    // {
    //     $filters = new FilterModels;

    //     $filters->setQuery(TestModel::query());
    //     $filters->setScopes(['testScope']);

    //     $reflection = new ReflectionClass($filters->getQuery());
    //     $properties = $reflection->getProperties();

    //     dd(collect($properties)->where('name', 'scopes')->first()->getValue($filters->getQuery()));

    //     $this->assertEquals(['testScope'], $properties['scopes']);
    // }
}

class TestModel extends Model {

    // public function scopeTestScope($query)
    // {
    //     return $query->where('test', 'test');
    // }
}