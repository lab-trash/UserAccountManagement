dev-from-scratch: composer

composer:
	-rm -rf ./vendor
	-a | composer install

pretty:
	./vendor/bin/pretty

pretty-fix:
	./vendor/bin/pretty fix

stan:
	./vendor/bin/phpstan analyse -l 7 src

test:
	./vendor/bin/phpunit

infection:
	./vendor/bin/infection --threads=4

test-CI:
	./vendor/bin/phpunit --coverage-clover=coverage.clover

CI: stan test-CI

release:
	git add CHANGELOG.md && git commit -m "release($(VERSION))" && git tag $(VERSION) && git push && git push --tags

.PHONY: dev-from-scratch composer pretty pretty-fix stan test infection test-CI CI release
