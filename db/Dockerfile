FROM mysql:5.7
ENV MYSQL_ROOT_PASSWORD=1234
ENV MYSQL_USER=usuario
ENV MYSQL_PASSWORD=1234
ENV MYSQL_DATABASE=base
RUN rm -f /docker-entrypoint-initdb.d/base.sql
ADD base.sql /docker-entrypoint-initdb.d/base.sql