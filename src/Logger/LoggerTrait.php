<?php

declare(strict_types=1);

namespace App\Logger;

use Psr\Log\LoggerInterface;

trait LoggerTrait
{
    protected LoggerInterface $logger;

    public function logByException(\Exception $ex, string $functionName, ?string $extraMessage = null): void
    {
        $this->logException($ex->getMessage(), $ex->getTraceAsString(), $ex->getLine(), $functionName, $extraMessage);
    }

    public function logDebug(string $message, string $functionName, ?string $extraMessage = null): void
    {
        $headerLog = $this->getHeaderLog($functionName);
        $messageLog = $headerLog.'[message]'.$message;

        if (null !== $extraMessage) {
            $this->logger->debug($headerLog.'[extraMessage]'.$extraMessage);
        }
        $this->logger->debug($messageLog);
    }

    private function logException(string $message, string $trace, int $line, string $functionName, ?string $extraMessage): void
    {
        $headerLog = $this->getHeaderLog($functionName);
        $lineLog = $headerLog.'[line]'.$line;
        $messageLog = $headerLog.'[message]'.$message;
        $traceLog = $headerLog.'[trace]'.$trace;
        if (null !== $extraMessage) {
            $this->logger->error($headerLog.'[extraMessage]'.$extraMessage);
        }
        $this->logger->error($lineLog);
        $this->logger->error($messageLog);
        $this->logger->error($traceLog);
    }

    private function getHeaderLog(string $functionName): string
    {
        $class = get_class($this);
        $appName = getenv('APP_NAME');
        if (null !== $functionName) {
            return "[$appName][$class][$functionName]";
        }

        return "[$appName][$class][$functionName]";
    }
}
