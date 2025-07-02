# Ceptcha

Ceptcha is a simple PHP library for generating CAPTCHA images using the GD extension. It ships with a minimal demo and PHPUnit test suite.

## Getting Started

1. Copy the contents of the `ceptcha` directory to a location in your project.
2. Include `picture.php` wherever you need to display a CAPTCHA image.
3. The demo in `ceptcha/index.php` shows a basic integration example.

```php
<img src="picture.php" id="ceptcha" />
<a href="#" onclick="document.getElementById('ceptcha').src = 'picture.php?'+Math.random()">Refresh</a>
```

### Customisation

Most behaviour can be adjusted in `picture.php`. For deeper changes, modify `Ceptcha.php` or `Ceptcha_Abstract.php`.

## Requirements

- PHP with the GD extension enabled
- FreeType for rendering fonts
- (Optional) [PHPUnit](https://phpunit.de/) for running the test suite

## Running Tests

After installing PHPUnit, execute:

```bash
phpunit tests
```

This will run the PHPUnit tests found in the `tests` directory.

## License

This project is provided as-is with no specific license information.
