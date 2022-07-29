dev:
	# install dependencies
	composer install
	composer update
	yarn install

	# .env setup
	cp .env.example .env
	php artisan key:generate
	sed -i "s|APP_URL=|APP_URL=${DEVURL}|g" .env

	# update /storage permissions
	sudo chmod -R 777 storage

	# remove .git directory so none of the theme's starter files are overwritten
	# moving it to a different directory so it can be restored for developing
	mv .git ~/.git.bak

	# activate the new theme
	wp theme activate $(notdir $(CURDIR))

prod:
	# install dependencies
	composer install
	composer update

	# .env setup
	cp .env.example .env
	php artisan key:generate

	# update /storage permissions
	sudo chmod -R 777 storage

	# remove .git directory so none of the theme's starter files are overwritten
	rm -rf .git

git:
	if [ -d ~/.git.bak ]; then mv ~/.git.bak .git; fi

acf:
	@echo -n "Are you positive that these fields have not already been imported? [y/N] " && read ans && [ $${ans:-N} = y ]
	git clone https://github.com/hoppinger/advanced-custom-fields-wpcli.git ../../plugins/advanced-custom-fields-wpcli
	wp plugin activate advanced-custom-fields-wpcli
	wp acf import --json_file=acf-fields.json
	rm acf-fields.json
	wp plugin deactivate advanced-custom-fields-wpcli
	rm -rf ../../plugins/advanced-custom-fields-wpcli

perms:
	sudo chmod -R 777 storage