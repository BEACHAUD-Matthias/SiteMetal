docker exec -it sitemetal_mysql mysql -u root -proot -e 'CREATE DATABASE DB_PHP;'
docker exec -it sitemetal_mysql bash -c 'mysql -u root -proot DB_PHP < /DB_PHP.sql'
