FROM thecodingmachine/php:8.3-v4-apache-node20

COPY --chown=docker . .

ENV APACHE_DOCUMENT_ROOT="public" \
    APACHE_EXTENSIONS_HTTP2=1 \
    PHP_EXTENSION_XDEBUG=0 \
    PHP_INI_ALLOW_URL_FOPEN=0 \
    PHP_INI_EXPOSE_PHP=0 \
    PHP_INI_DISPLAY_STARTUP_ERRORS=0 \
    PHP_INI_MEMORY_LIMIT="512M" \
    PHP_EXTENSION_GD=1 \
    PHP_INI_UPLOAD_MAX_FILESIZE="10M" \
    PHP_INI_POST_MAX_SIZE="15M"

RUN sudo apt-get update
RUN sudo apt-get install -y mysql-client

RUN composer install

RUN npm install
RUN npm run build
