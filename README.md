# Dogado Log Bundle

## Installation

```console
$ composer require jolicht/dogado-log-bundle
```

## Configuration

config/packages/dogado_log.yaml

```yaml
dogado_log:
  service_name: example-service # service name for creating graylog streams for each service
  gelf:
    host: example.at # graylog host
    port: 12201 # udp: 12201 (non-blocking), tcp: 5555 (blocking)
```
