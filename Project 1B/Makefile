.SILENT:
default:
	mysql CS143 < ./sql/create.sql
	mysql CS143 < ./sql/load.sql

dist:
	mkdir 604670111
	cp readme.txt 604670111
	cp team.txt 604670111
	cp -r sql 604670111
	cp -r www 604670111
	zip -r -X P1B.zip 604670111
	rm -rf 604670111

reset:
	mysql --execute="DROP DATABASE IF EXISTS CS143;"
	mysql --execute="CREATE DATABASE CS143;"

clean:
	rm P1B.zip
