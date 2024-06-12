<?php

namespace ExpressionEngine\Dependency\Aws\Exception;

use ExpressionEngine\Dependency\Aws\HasMonitoringEventsTrait;
use ExpressionEngine\Dependency\Aws\MonitoringEventsInterface;
class InvalidJsonException extends \RuntimeException implements MonitoringEventsInterface
{
    use HasMonitoringEventsTrait;
}
