<?php

namespace Zenstruck\Redis\Tests\Utility;

use PHPUnit\Framework\TestCase;
use Zenstruck\Redis;
use Zenstruck\Redis\Tests\RedisProvider;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
final class ExpiringSetTest extends TestCase
{
    use RedisProvider;

    /**
     * @test
     * @dataProvider redisProvider
     */
    public function can_add_get_remove_and_clear(Redis $redis): void
    {
        $set = $redis->expiringSet('set_key');

        $this->assertSame(0, $redis->exists('set_key'));

        $set->add('foo', 60);

        $this->assertSame(1, $redis->exists('set_key'));
        $this->assertCount(1, $set);
        $this->assertSame(['foo'], $set->all());
        $this->assertSame(['foo'], \iterator_to_array($set));
        $this->assertTrue($set->contains('foo'));

        $set->add('bar', 60)->add('baz', 60)->prune();

        $this->assertCount(3, $set);
        $this->assertSame(['foo', 'bar', 'baz'], $set->all());
        $this->assertSame(['foo', 'bar', 'baz'], \iterator_to_array($set));
        $this->assertTrue($set->contains('foo'));
        $this->assertTrue($set->contains('bar'));
        $this->assertTrue($set->contains('baz'));

        $set->remove('invalid')->remove('baz');

        $this->assertCount(2, $set);
        $this->assertSame(['foo', 'bar'], $set->all());
        $this->assertSame(['foo', 'bar'], \iterator_to_array($set));
        $this->assertTrue($set->contains('foo'));
        $this->assertTrue($set->contains('bar'));

        $this->assertEmpty($set->clear());
        $this->assertSame(0, $redis->exists('set_key'));
    }

    /**
     * @test
     * @dataProvider redisProvider
     */
    public function same_value_is_not_duplicated(Redis $redis): void
    {
        $set = $redis->expiringSet('set_key');

        $set->add('foo', 60)->add('foo', 60)->add('foo', 60);

        $this->assertCount(1, $set);
    }

    /**
     * @test
     * @dataProvider redisProvider
     */
    public function can_prune(Redis $redis): void
    {
        $set = $redis->expiringSet('set_key');

        $set->add('foo', 60)->add('bar', 60);

        $this->assertCount(2, $set);
        $this->assertSame(['foo', 'bar'], $set->all());

        $redis->zAdd('set_key', 10, 'foo'); // expire this item

        // ensure still cached
        $this->assertCount(2, $set);
        $this->assertSame(['foo', 'bar'], $set->all());

        $set->prune();

        $this->assertCount(1, $set);
        $this->assertSame(['bar'], $set->all());
    }

    /**
     * @test
     * @dataProvider redisProvider
     */
    public function all_auto_prunes(Redis $redis): void
    {
        $redis->zAdd('set_key', \time() + 60, 'foo');
        $redis->zAdd('set_key', 60, 'bar');

        $set = $redis->expiringSet('set_key');

        $this->assertCount(1, $set);
        $this->assertSame(['foo'], $set->all());
    }

    /**
     * @test
     * @dataProvider redisProvider
     */
    public function add_auto_prunes(Redis $redis): void
    {
        $redis->zAdd('set_key', \time() + 60, 'foo');
        $redis->zAdd('set_key', 60, 'bar');

        $set = $redis->expiringSet('set_key')->add('baz', 60);

        $this->assertSame(['foo', 'baz'], $set->all());
    }

    /**
     * @test
     * @dataProvider expiryValuesProvider
     */
    public function expiry_values(Redis $redis, callable $expiry): void
    {
        $set = $redis->expiringSet('set_key');

        $current = \microtime(true);
        $set->add('foo', $expiry());

        $expiry = $redis->zRange('set_key', 0, -1, true)['foo'];

        $this->assertGreaterThanOrEqual($current + 50, $expiry);
        $this->assertLessThan($current + 52, $expiry);
    }

    public static function expiryValuesProvider(): \Traversable
    {
        foreach (self::redisProvider() as [$client]) {
            yield [$client, fn() => 50];
            yield [$client, fn() => '50'];
            yield [$client, fn() => 50.0];
            yield [$client, fn() => '50.0'];
            yield [$client, fn() => \DateInterval::createFromDateString('50 seconds')];
            yield [$client, fn() => new \DateTime('+50 secs')];
            yield [$client, fn() => new \DateTimeImmutable('+50 secs')];
        }
    }
}
