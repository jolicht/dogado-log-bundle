<?php

namespace Jolicht\DogadoLogBundle;

use Monolog\LogRecord;
use Monolog\Processor\ProcessorInterface;
use Symfony\Component\HttpKernel\KernelInterface;

final class DefaultContextProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly KernelInterface $kernel,
        private readonly string $serviceName
    ) {
    }

    public function __invoke(LogRecord $record): LogRecord
    {
        $extra = [
            'php_version' => (string) phpversion(),
            'environment' => $this->kernel->getEnvironment(),
            'service' => $this->serviceName,
        ];

        $record->offsetSet('extra', $extra);

        return $record;
    }


}
