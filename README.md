# Kong Certbot agent
Let's Encrypt integration with Kong

This repository provides with a cron-based certbot agent that will attempt to acquire Let's Encrypt certificates you control
for a list of subdomains you provide, and provision Kong with them.

There's an example [Kubernetes deployment configuration](kubernetes/certbot.yml) you can use as a guide to deploy wherever you need.

**This is a proof of concept!**

## How to
  - The container takes 3 environment variables to operate:
    - KONG_ENDPOINT: this will be the http endpoint your kong admin is at, without its path. ie `http://kong:8001`
    - EMAIL: this is the email address linked to your let's encrypt certificates.
    - DOMAINS: this is a comma-separated list of domains we'll be asking certificates for.
  - Deploy container in your environment.
  - It will automagically run the updater script every 24th of the month.
  - Profit!

## Command line tool

You can, alternatively, simply run the actual command yourself. This will allow you to use your own scheduling around
it.

```bash
# Get a certificate for three subdomains, and submit to kong
docker run -it --rm phpdockerio/kong-certbot \
    ./certbot-agent.php certs:update \
    http://kong-admin:8001 \
    foo@bar.com \
    bar.com,foo.bar.com,www.bar.com

# Get a TEST certificate for three subdomains, and submit to kong
docker run -it --rm phpdockerio/kong-certbot \
    ./certbot-agent.php certs:update -t \
    http://kong-admin:8001 \
    foo@bar.com \
    bar.com,foo.bar.com,www.bar.com

```

## Stuff to do:

Provide with a non-cron based container and provide with a cronjob based kubernetes example. You really should be rolling 
your own scheduling around this.
