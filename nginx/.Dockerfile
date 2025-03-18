# Imagen base
FROM nginx:latest

# Instalar gettext (para usar envsubst)
RUN apt-get update && apt-get install -y gettext

# Copiar plantilla de configuración de Nginx
COPY nginx.conf.template /etc/nginx/nginx.conf.template

# Reemplazar variables de entorno en la plantilla y moverla a nginx.conf
CMD envsubst '$NGINX_HOST $NGINX_PORT' < /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf && nginx -g 'daemon off;'
