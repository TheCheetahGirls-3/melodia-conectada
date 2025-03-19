# Melodia Connectada

Melodia Connectada es una plataforma diseñada para conectar músicos independientes con restaurantes y bares, creando experiencias únicas y enriquecedoras para todos. Este proyecto combina tecnología moderna y un enfoque en la experiencia del usuario para transformar la manera en que los músicos y los negocios interactúan.

## Tecnologías Utilizadas

### Frontend
- **Vue.js**: Desarrollo de interfaces de usuario interactivas y responsivas.
- **Bootstrap** (o similar): Diseño responsivo siguiendo principios de UX/UI y accesibilidad.

### Backend
- **Laravel**: Creación de una API RESTful para la gestión de datos y funcionalidades.

### Base de Datos
- **MySQL**: Diseño y optimización de una base de datos para usuarios, contenido multimedia y ubicaciones.

### Servicios y Funcionalidades
- **Chat en tiempo real**: Implementación de un sistema de mensajería dentro de la aplicación.
- **Mapbox**: Integración de mapas interactivos para localizar músicos y restaurantes.
- **Elementos predesarrollados**: Uso de iframes para facilitar el desarrollo de componentes.

### Despliegue
- **Docker Compose**: Automatización del despliegue con configuraciones optimizadas.
- **NGINX**: Servidor web configurado para alto rendimiento.

## Características Clave

### Para Músicos
- Perfil personalizado con información, videos y canciones.
- Gestión de eventos próximos y disponibilidad.

### Para Restaurantes
- Búsqueda con filtros avanzados para encontrar músicos ideales.
- Contratación directa y comunicación a través del chat.

### Para Administradores
- Backoffice para gestión de usuarios, informes y moderación de contenido.

## Instalación

### Requisitos Previos
- **Docker y Docker Compose** instalados.
- **Node.js** y **npm** para el desarrollo frontend.
- **Composer** para la gestión de dependencias en Laravel.

### Pasos de Instalación
1. Clona el repositorio:
   ```bash
   git clone https://github.com/tu-usuario/melodia-connectada.git
   ```
2. Configura el entorno:
   - Copia el archivo `.env.example` y renómbralo como `.env`.
   - Configura las variables de entorno necesarias (base de datos, API keys, etc.).
3. Construye y levanta los contenedores:
   ```bash
   docker-compose up --build
   ```
4. Instala las dependencias del frontend y backend:
   - Frontend:
     ```bash
     cd frontend
     npm install
     npm run serve
     ```
   - Backend:
     ```bash
     cd backend
     composer install
     php artisan migrate --seed
     ```

## Contribución

1. Haz un fork del repositorio.
2. Crea una rama nueva para tu funcionalidad:
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```
3. Haz tus cambios y sube los commits.
4. Envía un Pull Request.

## Licencia
Este proyecto está licenciado bajo la [MIT License](LICENSE).

---

¡Gracias por ser parte de Melodia Connectada y contribuir a llevar la música más lejos!

