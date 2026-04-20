# Contributing to YOURLS

## Project Requirements

- Docker: development environment
- mkcert: generating HTTPS certificates for local development

## Development Environment

### Local HTTPS Setup

1. Install [mkcert](https://github.com/FiloSottile/mkcert)
2. Change into the ssl directory: `cd docker/web/ssl`
3. Using `mkcert`, generate a certificate and a key: `mkcert localhost`
4. Rename certificate: `mv localhost.pem localhost.crt`
5. Rename key: `mv localhost-key.pem localhost.key`

### Using Docker

This repository includes a Docker setup for local development.

To build and run the environment:

```bash
docker compose up --build
```

Ensure that all necessary configuration files are in place (e.g., `docker/web/php.ini`,
`docker/web/ssl/localhost.crt`).

## Useful Commands

### Connect to a running container's shell

```shell
docker exec -it yourls bash
```

## Accessing the Admin Panel

- URL: `https://localhost/admin`
- Username: `root`
- Password: `root`
