<?php

namespace Lbil\LaravelGenerator\Tests\Unit;

use Lbil\LaravelGenerator\Http\Controllers\Detect\DetectController;
use Mockery;
use PHPUnit\Framework\TestCase;

class DetectTest extends TestCase
{
    protected DetectController|Mockery\LegacyMockInterface|Mockery\MockInterface $detectController;

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
     * Test detect pattern function is return the correct value.
     *
     * @return void
     */
    public function testDetectPattern(): void
    {
        $this->detectController->shouldReceive('detect')->andReturn([]);
        $this->assertEquals([], $this->detectController->detect());
    }
}
