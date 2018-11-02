all: vendor

vendor: composer.lock composer.phar
	env COMPOSER_ALLOW_SUPERUSER=1 php composer.phar install --prefer-dist
	touch -r $< $@

composer.lock: composer.json composer.phar
	env COMPOSER_ALLOW_SUPERUSER=1 php composer.phar update -vvv

composer.json: composer.json5
	./vendor/bin/json5 $< | json_reformat > $@
	touch -r $< $@

composer.phar:
	curl -sS 'https://getcomposer.org/installer' | php -- --stable
	touch -r composer.json $@

clean:
	rm -rf vendor composer.phar

.PHONY: all clean
