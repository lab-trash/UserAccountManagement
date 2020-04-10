# BlacksmithProject UserManagementAccount

Provides logic for: 
- email/password registration
- activation
- authentication
- info update
- forgotten password declaration
- password update
- user exposition 

## Why:

This logic is re-implemented each time I start a new side-project.

## TOOLING

Contains:

- `phpcs`
- `pretty`
- `phpstan`
- `phpunit`
- `infection`
- `travisCI`
- `scrutinizer`

Use:

- `make pretty` to use `phpcs`
- `make pretty-fix` to fix
- `make stan` to use `phpstan`
- `make test` to use `phpunit`
- `make infection` to use `infection`
- `make CI` for the CI
- modify `CHANGELOG.md` and `make release VERSION=<version_number>` to make a new release
