.PHONY: serve


serve:
	(php artisan serve) & (npm run watch)

