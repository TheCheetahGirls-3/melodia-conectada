<template>
    <div class="chat-container">
        <!-- Lista de chats a la izquierda -->
        <div class="chat-list">
            <h1 class="chat-title">Contactos</h1>
            <div v-if="chats.length > 0">
                <div v-for="chat in chats" :key="chat.id_emisor" class="chat-item" @click="openChat(chat.id_emisor)">
                    <img :src="`images/imagenes_perfil/${chat.foto_perfil}`" alt="Foto de perfil" class="chat-avatar" />
                    <div class="chat-content">
                        <div class="chat-header">
                            <h3 class="chat-name">{{ chat.emisor_nombre }}</h3>
                            <span class="chat-time">{{ formatFecha(chat.fecha_hora) }}</span>
                        </div>
                        <p class="chat-message">{{ chat.mensaje_texto }}</p>
                    </div>
                </div>
            </div>
            <div v-else class="no-chats">
                <p>No tienes chats disponibles.</p>
            </div>
        </div>

        <!-- Mensajes del chat seleccionado a la derecha -->
        <div class="chat-details" v-if="selectedChat">
            <div class="chat-entero">
                <h2>Mensajes con {{ selectedChat.emisor_nombre }}</h2>
                <div v-if="mensajes.length > 0" class="messages-container">
                    <ul>
                        <li v-for="mensaje in mensajes" :key="mensaje.id" class="message-item">
                            {{ mensaje.contenido }}
                        </li>
                    </ul>
                </div>
                <div v-else>
                    <p>No hay mensajes en este chat.</p>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: {
        usuarioId: {
            type: Number,
            required: true, // Asegúrate de que el usuario conectado se pase como prop
        },
    },
    data() {
        return {
            chats: [],
            selectedChat: null,
            mensajes: [], // Cambiado de messages a mensajes
        };
    },
    mounted() {
        this.fetchChats();
    },
    methods: {
        fetchChats() {
            axios.get(`/chats/${this.usuarioId}`)
                .then((response) => {
                    this.chats = response.data;
                })
                .catch((error) => {
                    console.error("Error al obtener los chats:", error);
                });
        },
        openChat(chatId) {
            // Pasa el id_emisor (chatId) y el id del usuario conectado (usuarioId)
            axios.get(`/mensajes/${this.usuarioId}/${chatId}`)
                .then((response) => {
                    this.mensajes = response.data; // Cambiado de messages a mensajes
                    this.selectedChat = this.chats.find(chat => chat.id_emisor === chatId);
                })
                .catch((error) => {
                    console.error("Error al obtener los mensajes:", error);
                });
        },
        formatFecha(fecha) {
            const date = new Date(fecha);
            const now = new Date();
            const isToday = date.toDateString() === now.toDateString();
            const yesterday = new Date();
            yesterday.setDate(now.getDate() - 1);

            if (date.toDateString() === yesterday.toDateString()) {
                return `Yesterday, ${date.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' })}`;
            } else if (isToday) {
                return `Today, ${date.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' })}`;
            } else {
                return `${date.toLocaleDateString([], { weekday: 'long' })}, ${date.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' })}`;
            }
        },
    },
};
</script>

<style scoped>
.chat-container {
    display: flex;
    flex-direction: row;
    max-width: 100%;
    margin: 0 auto;
    font-family: Arial, sans-serif;
}

.chat-title {
    color: #000;
    text-align: left;
    padding: 20px 10px;
    font-size: 22px;
    font-weight: bold;
}

.chat-list {
    padding-top: 60px;
    width: 30%;
    border-right: 1px solid #ccc;
    overflow-y: auto;
    height: 100vh;
}

.chat-details {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
}

.chat-entero{
    padding-top: 60px;
}

.chat-item {
    display: flex;
    align-items: center;
    padding: 12px 10px;
    border-bottom: 1px solid #ccc;
    cursor: pointer;
    transition: background-color 0.3s;
}

.chat-item:hover {
    background-color: #f0f0f0;
}

.chat-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    margin-right: 12px;
    object-fit: cover;
}

.chat-content {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.chat-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chat-name {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
    color: #000;
}

.chat-time {
    font-size: 12px;
    color: #999;
    margin-left: auto;
}

.chat-message {
    margin: 4px 0 0 0;
    font-size: 14px;
    color: #666;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.no-chats {
    padding: 20px;
    text-align: center;
    color: #888;
}

.messages-container {
    max-height: 80vh;
    overflow-y: auto;
}

.message-item {
    margin-bottom: 10px;
    font-size: 14px;
}
</style>
