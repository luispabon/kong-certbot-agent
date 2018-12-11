<?php
declare(strict_types=1);

namespace PhpDockerIo\KongCertbot\Certbot\Exception;

/**
 * Thrown when a cert file that should have been generated by certbot could not be found.
 *
 * @author PHPDocker.io
 */
class CertFileNotFoundException extends \RuntimeException
{
    public function __construct(string $file, array $domains)
    {
        $message = \sprintf(
            '%s not found for domains [%s] - this should not happen without a previous certbot error',
            $file,
            \implode(', ', $domains)
        );

        parent::__construct($message);
    }
}
