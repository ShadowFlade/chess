all: generate make-news
run-chess:
	docker-compose up
make-news:
	docker-compose exec -T db mysql -uroot -pexample chess < ./chess.sql

