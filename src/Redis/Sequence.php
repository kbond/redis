<?php

namespace Zenstruck\Redis;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 *
 * @method self ping($message = null)
 * @method self echo($message)
 * @method self get($key)
 * @method self set($key, $value, $timeout = null)
 * @method self setEx($key, $ttl, $value)
 * @method self pSetEx($key, $ttl, $value)
 * @method self setNx($key, $value)
 * @method self del($key1, ...$otherKeys)
 * @method self delete($key1, $key2 = null, $key3 = null)
 * @method self unlink($key1, $key2 = null, $key3 = null)
 * @method self discard()
 * @method self watch($key)
 * @method self unwatch()
 * @method self subscribe($channels, $callback)
 * @method self psubscribe($patterns, $callback)
 * @method self publish($channel, $message)
 * @method self pubsub($keyword, $argument)
 * @method self unsubscribe($channels = null)
 * @method self punsubscribe($patterns = null)
 * @method self exists($key)
 * @method self incr($key)
 * @method self incrByFloat($key, $increment)
 * @method self incrBy($key, $value)
 * @method self decr($key)
 * @method self decrBy($key, $value)
 * @method self lPush($key, ...$value1)
 * @method self rPush($key, ...$value1)
 * @method self lPushx($key, $value)
 * @method self rPushx($key, $value)
 * @method self lPop($key)
 * @method self rPop($key)
 * @method self blPop($keys, $timeout)
 * @method self brPop($keys, $timeout)
 * @method self lLen($key)
 * @method self lSize($key)
 * @method self lIndex($key, $index)
 * @method self lGet($key, $index)
 * @method self lSet($key, $index, $value)
 * @method self lRange($key, $start, $end)
 * @method self lGetRange($key, $start, $end)
 * @method self lTrim($key, $start, $stop)
 * @method self listTrim($key, $start, $stop)
 * @method self lRem($key, $value, $count)
 * @method self lRemove($key, $value, $count)
 * @method self lInsert($key, $position, $pivot, $value)
 * @method self sAdd($key, ...$value1)
 * @method self sRem($key, ...$member1)
 * @method self sRemove($key, ...$member1)
 * @method self sMove($srcKey, $dstKey, $member)
 * @method self sIsMember($key, $value)
 * @method self sContains($key, $value)
 * @method self sCard($key)
 * @method self sPop($key, $count = 1)
 * @method self sRandMember($key, $count = 1)
 * @method self sInter($key1, ...$otherKeys)
 * @method self sInterStore($dstKey, $key1, ...$otherKeys)
 * @method self sUnion($key1, ...$otherKeys)
 * @method self sUnionStore($dstKey, $key1, ...$otherKeys)
 * @method self sDiff($key1, ...$otherKeys)
 * @method self sDiffStore($dstKey, $key1, ...$otherKeys)
 * @method self sMembers($key)
 * @method self sGetMembers($key)
 * @method self sScan($key, $iterator, $pattern = null, $count = 0)
 * @method self getSet($key, $value)
 * @method self randomKey()
 * @method self select($dbIndex)
 * @method self move($key, $dbIndex)
 * @method self rename($srcKey, $dstKey)
 * @method self renameKey($srcKey, $dstKey)
 * @method self renameNx($srcKey, $dstKey)
 * @method self expire($key, $ttl)
 * @method self pExpire($key, $ttl)
 * @method self setTimeout($key, $ttl)
 * @method self expireAt($key, $timestamp)
 * @method self pExpireAt($key, $timestamp)
 * @method self keys($pattern)
 * @method self getKeys($pattern)
 * @method self dbSize()
 * @method self auth($password)
 * @method self bgrewriteaof()
 * @method self slaveof($host = '127.0.0.1', $port = 6379)
 * @method self slowLog($operation, $length = null)
 * @method self object($string = '', $key = '')
 * @method self save()
 * @method self bgsave()
 * @method self lastSave()
 * @method self wait($numSlaves, $timeout)
 * @method self type($key)
 * @method self append($key, $value)
 * @method self getRange($key, $start, $end)
 * @method self substr($key, $start, $end)
 * @method self setRange($key, $offset, $value)
 * @method self strlen($key)
 * @method self bitpos($key, $bit, $start = 0, $end = null)
 * @method self getBit($key, $offset)
 * @method self setBit($key, $offset, $value)
 * @method self bitCount($key)
 * @method self bitOp($operation, $retKey, $key1, ...$otherKeys)
 * @method self flushDB()
 * @method self flushAll()
 * @method self sort($key, $option = null)
 * @method self info($option = null)
 * @method self resetStat()
 * @method self ttl($key)
 * @method self pttl($key)
 * @method self persist($key)
 * @method self mset($array)
 * @method self getMultiple($keys)
 * @method self mGet($array)
 * @method self mSetNx($array)
 * @method self rPopLPush($srcKey, $dstKey)
 * @method self bRPopLPush($srcKey, $dstKey, $timeout)
 * @method self zAdd($key, $options, $score1, $value1 = null, $score2 = null, $value2 = null, $scoreN = null, $valueN = null)
 * @method self zRange($key, $start, $end, $withscores = null)
 * @method self zRem($key, $member1, ...$otherMembers)
 * @method self zDelete($key, $member1, ...$otherMembers)
 * @method self zRevRange($key, $start, $end, $withscore = null)
 * @method self zRangeByScore($key, $start, $end, $options = [])
 * @method self zRevRangeByScore($key, $start, $end, $options = [])
 * @method self zRangeByLex($key, $min, $max, $offset = null, $limit = null)
 * @method self zRevRangeByLex($key, $min, $max, $offset = null, $limit = null)
 * @method self zCount($key, $start, $end)
 * @method self zRemRangeByScore($key, $start, $end)
 * @method self zDeleteRangeByScore($key, $start, $end)
 * @method self zRemRangeByRank($key, $start, $end)
 * @method self zDeleteRangeByRank($key, $start, $end)
 * @method self zCard($key)
 * @method self zSize($key)
 * @method self zScore($key, $member)
 * @method self zRank($key, $member)
 * @method self zRevRank($key, $member)
 * @method self zIncrBy($key, $value, $member)
 * @method self zUnionStore($output, $zSetKeys, $weights = null, $aggregateFunction = 'SUM')
 * @method self zUnion($Output, $ZSetKeys, $Weights = null, $aggregateFunction = 'SUM')
 * @method self zInterStore($output, $zSetKeys, $weights = null, $aggregateFunction = 'SUM')
 * @method self zInter($Output, $ZSetKeys, $Weights = null, $aggregateFunction = 'SUM')
 * @method self zScan($key, $iterator, $pattern = null, $count = 0)
 * @method self bzPopMax($key1, $key2, $timeout)
 * @method self bzPopMin($key1, $key2, $timeout)
 * @method self zPopMax($key, $count = 1)
 * @method self zPopMin($key, $count = 1)
 * @method self hSet($key, $hashKey, $value)
 * @method self hSetNx($key, $hashKey, $value)
 * @method self hGet($key, $hashKey)
 * @method self hLen($key)
 * @method self hDel($key, $hashKey1, ...$otherHashKeys)
 * @method self hKeys($key)
 * @method self hVals($key)
 * @method self hGetAll($key)
 * @method self hExists($key, $hashKey)
 * @method self hIncrBy($key, $hashKey, $value)
 * @method self hIncrByFloat($key, $field, $increment)
 * @method self hMSet($key, $hashKeys)
 * @method self hMGet($key, $hashKeys)
 * @method self hScan($key, $iterator, $pattern = null, $count = 0)
 * @method self hStrLen($key, $field)
 * @method self geoAdd($key, $longitude, $latitude, $member)
 * @method self geoHash($key, ...$member)
 * @method self geoPos($key, $member)
 * @method self geoDist($key, $member1, $member2, $unit = null)
 * @method self geoRadius($key, $longitude, $latitude, $radius, $unit, $options = null)
 * @method self geoRadiusByMember($key, $member, $radius, $units, $options = null)
 * @method self config($operation, $key, $value)
 * @method self eval($script, $args = [], $numKeys = 0)
 * @method self evaluate($script, $args = [], $numKeys = 0)
 * @method self evalSha($scriptSha, $args = [], $numKeys = 0)
 * @method self evaluateSha($scriptSha, $args = [], $numKeys = 0)
 * @method self script($command, $script)
 * @method self getLastError()
 * @method self clearLastError()
 * @method self client($command, $value = '')
 * @method self dump($key)
 * @method self restore($key, $ttl, $value)
 * @method self migrate($host, $port, $key, $db, $timeout, $copy = false, $replace = false)
 * @method self time()
 * @method self scan($iterator, $pattern = null, $count = 0)
 * @method self pfAdd($key, $elements)
 * @method self pfCount($key)
 * @method self pfMerge($destKey, $sourceKeys)
 * @method self rawCommand($command, $arguments)
 * @method self getMode()
 * @method self xAck($stream, $group, $messages)
 * @method self xAdd($key, $id, $messages, $maxLen = 0, $isApproximate = false)
 * @method self xClaim($key, $group, $consumer, $minIdleTime, $ids, $options = [])
 * @method self xDel($key, $ids)
 * @method self xGroup($operation, $key, $group, $msgId = '', $mkStream = false)
 * @method self xInfo($operation, $stream, $group)
 * @method self xLen($stream)
 * @method self xPending($stream, $group, $start = null, $end = null, $count = null, $consumer = null)
 * @method self xRange($stream, $start, $end, $count = null)
 * @method self xRead($streams, $count = null, $block = null)
 * @method self xReadGroup($group, $consumer, $streams, $count = null, $block = null)
 * @method self xRevRange($stream, $end, $start, $count = null)
 * @method self xTrim($stream, $maxLen, $isApproximate)
 * @method self sAddArray($key, $values)
 */
final class Sequence
{
    /**
     * @internal
     */
    public function __construct(
        private \Redis|\RedisArray|\RedisCluster $redis,
        private bool $transaction,
        private ?self $nested = null
    ) {
    }

    /**
     * @param list<mixed> $arguments
     */
    public function __call(string $method, array $arguments): self
    {
        $this->redis->{$method}(...$arguments);

        return $this;
    }

    public function multi(): self
    {
        if ($this->transaction) {
            throw new \LogicException('Cannot create nested transaction.');
        }

        return new self($this->redis->multi(), true, $this);
    }

    /**
     * @return list<mixed>|self
     */
    public function exec(): array|self
    {
        if ($this->nested) {
            $this->redis->exec();

            return $this->nested;
        }

        return \is_array($result = $this->redis->exec()) ? $result : [];
    }
}
