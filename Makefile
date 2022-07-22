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

test:
	sed -i "s|APP_URL=|APP_URL=${DEVURL}|g" .env