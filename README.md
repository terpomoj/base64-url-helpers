# 🥔 `terpomoj/base64-url-helpers`

This package provides two global functions: `base64_url_encode` and `base64_url_decode`. I found myself using these helpers in a lot of my projects.

## What is Base64 URL?

In [RFC 3548](https://tools.ietf.org/html/rfc3548), Base64 URL is a variant of Base64 that uses the URL-safe alphabet. Which replaces the `+` and `/` characters in standard base64 with `-` and `_`. Padding character (`=`) can be optionally removed or retained.

## Usage

Install with composer:

```bash
$ composer require terpomoj/base64-url-helpers
```

### Encode

To encode:

```php
$encoded = base64_url_encode('🏳️‍⚧️🏳️‍🌈');

// $encoded is now '8J-Ps--4j-KAjeKap--4j_Cfj7PvuI_igI3wn4yI'
```

There is also a second optional parameter to `base64_url_encode` that allow you to specify weather you want to remove padding characters or not. Which is default to `true`, that will remove padding characters.

```php
$encode = base64_url_encode('🏳️‍⚧️');
// $encode = '8J-Ps--4j-KAjeKap004jw'

$encode = base64_url_encode('🏳️‍⚧️', removePadding: false);
// $encode = '8J-Ps--4j-KAjeKap004jw=='
```

### Decode

To decode:

```php
$decoded = base64_url_decode('8J-Ps--4j-KAjeKap--4j_Cfj7PvuI_igI3wn4yI');

// $decoded is now '🏳️‍⚧️🏳️‍🌈'
```

Just like PHP's native `base64_decode`, by default, it allows you to pass a string that is not a valid base64 string.

```php
$decoded = base64_url_decode('8J-Ps--4j-KAjeKap--4j_Cfj7PvuI_igI3wn4yI!!!!!');
// $decoded is now '🏳️‍⚧️🏳️‍🌈'

$decoded = base64_url_decode('8J-Ps--4j-KAjeKap--4j_Cfj7PvuI_igI3wn4yI!!!!!', strict: true);
// $decodes is now false
```

## Why?

The main reason I use URL-safe base64 is to encode binary UUID, so that the UUID in URL can be shorter than HEX-encoded UUID:
```php
$uuid = base64_url_encode(Uuid::uuid4()->getBytes());
// $uuid is now 'oRZS8dRtR-GfBdCbaHwtkw'
```

## License

Licensed under `MIT`. See [LICENSE](LICENSE) file more details.
