FROM mysql:5.7

ARG schema_name

RUN echo 'sql-mode=""' >> /etc/mysql/conf.d/docker.cnf

ADD source/$schema_name.sql.gz /docker-entrypoint-initdb.d
