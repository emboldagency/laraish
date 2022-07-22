dev:
	# install dependencies
	composer install
	composer update
	yarn install

	# .env setup
	cp .env.example .env
	php artisan key:generate

	# update /storage permissions
	sudo chmod -R 777 storage

	# remove .git directory so no starter files aren't overwritten
	# moving it to a different directory so it can be restored for developing
	mv .git ~/.git.bak

prod:
	# install dependencies
	composer install
	composer update

	# .env setup
	cp .env.example .env
	php artisan key:generate

	# update /storage permissions
	sudo chmod -R 777 storage

	# remove .git directory so no starter files aren't overwritten
	rm -rf .git

git:
	if [ -d ~/.git.bak ]; then mv ~/.git.bak .git; fi