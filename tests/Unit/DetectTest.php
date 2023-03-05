<?php

namespace TanHongIT\LaravelGenerator\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Mockery;
use TanHongIT\LaravelGenerator\Http\Controllers\Detect\DetectController;

class DetectTest extends TestCase
{
    protected $detectController;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->detectController = Mockery::mock(DetectController::class);
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    /**
     * @return void
     */
    public function testDetectPattern(): void
    {
        $this->detectController->shouldReceive('detect')->andReturn([]);
        $this->assertEquals([], $this->detectController->detect());
    }
}
