FROM nginx:latest

# Copy configuration and fix permissions
COPY nginx.conf /etc/nginx/conf.d/nginx.conf
RUN chown -R www-data:www-data /etc/nginx/conf.d/nginx.conf \
    && chmod -R 755 /etc/nginx/conf.d/nginx.conf

EXPOSE 80
