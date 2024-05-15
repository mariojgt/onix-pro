# Onix - Laravel Page Builder

Onix is a powerful page builder that integrates seamlessly with Laravel. It provides a flexible and efficient way to create reusable blocks and manage pages.

## Getting Started

To get started with Onix, you need to install it via composer:

```sh
composer require mariojgt/onix
```

After installation, run the Onix installation command:

```sh
php artisan install:onix
```

Add the following line to your `.env` file to avoid unwanted requests to the API:

```sh
VITE_ONIX_API_KEY=any_value
```

## Creating Reusable Blocks

To create a new block, run the following command and follow the instructions:

```sh
php artisan onix:block
```

This will create a new block class and blade template in the `resources/onix/blocks` folder. The PHP class will be located in the `app/Onix/Blocks` folder.

### Accessing the Page Builder Settings

To access the page builder, navigate to the path `onix/settings` in your application.
You can protect the acess using the config `onix.middleware` by default its web(public)

## Commands

Onix provides several commands to help manage your application:

- Republish: `Mariojgt\Onix\Commands\Republish`
- Install: `Mariojgt\Onix\Commands\Install`
- CreateOnixBlock: `Mariojgt\Onix\Commands\CreateOnixBlock`

## Controllers

Onix includes several controllers for handling various aspects of your application:

- OnixApiController: `Mariojgt\Onix\Controllers\OnixApiController`
- OnixApiDeployController: `Mariojgt\Onix\Controllers\OnixApiDeployController`
- OnixBlockController: `Mariojgt\Onix\Controllers\OnixBlockController`
- OnixController: `Mariojgt\Onix\Controllers\OnixController`
- OnixDeployController: `Mariojgt\Onix\Controllers\OnixDeployController`
- OnixPageController: `Mariojgt\Onix\Controllers\OnixPageController`
- OnixSettingsController: `Mariojgt\Onix\Controllers\OnixSettingsController`
- OnixSitePageController: `Mariojgt\Onix\Controllers\OnixSitePageController`

## Contributing

Contributions are welcome!

## License

This project is licensed under the terms of the MIT License.
