FROM mysql:5.7

ENV MYSQL_DATABASE bookedscheduler
ENV MYSQL_USER booked_user
ENV MYSQL_PASSWORD Hi
ENV MYSQL_ROOT_PASSWORD Hi
ENV TZ Europe/London
ENV explicit_defaults_for_timestamp 1
# Add the content of the sql-scripts/ directory to your image
# All scripts in docker-entrypoint-initdb.d/ are automatically
# executed during container startup
COPY ./database_schema/ /docker-entrypoint-initdb.d/
