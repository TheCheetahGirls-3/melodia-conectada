<template>
    <div class="contenedor-chat">
        <!-- Lista de chats a la izquierda -->
        <div class="lista-chats">
            <h1 class="titulo-chat">Contactos</h1>
            <div v-if="chats.length > 0">
                <div v-for="chat in chats" :key="chat.id_emisor" class="item-chat" @click="openChat(chat.id_emisor)">
                    <img :src="`images/imagenes_perfil/${chat.foto_perfil}`" alt="Foto de perfil" class="avatar-chat" />
                    <div class="contenido-chat">
                        <div class="cabecera-chat">
                            <h3 class="nombre-chat">{{ chat.emisor_nombre }}</h3>
                            <span class="hora-chat">{{ formatFecha(chat.fecha_hora) }}</span>
                        </div>
                        <p class="mensaje-chat">{{ chat.mensaje_texto }}</p>
                    </div>
                </div>
            </div>
            <div v-else class="sin-chats">
                <p>No tienes chats disponibles.</p>
            </div>
        </div>

        <!-- Mensajes del chat seleccionado a la derecha -->
        <div class="detalles-chat" v-if="selectedChat">
            <div class="chat-completo">
                <h2> {{ selectedChat.emisor_nombre }}</h2>
                <div v-if="mensajes.length > 0" class="contenedor-mensajes">
                    <ul>
                        <li v-for="mensaje in mensajes" :key="mensaje.id"
                            :class="['item-mensaje', mensaje.id_emisor === usuarioId ? 'mensaje-propio' : 'mensaje-otro']">
                            <span class="burbuja-mensaje">{{ mensaje.contenido }}</span>
                            <div class="hora-mensaje">{{ formatFecha(mensaje.fecha_hora) }}</div>
                        </li>
                    </ul>
                </div>
                <div v-else>
                    <p>No hay mensajes en este chat.</p>
                </div>

                <!-- Campo para escribir mensajes -->
                <div class="campo-escribir">
                    <input type="text" placeholder="Escribe un mensaje..." class="input-mensaje" />
                    <button class="boton-enviar">Enviar</button>
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
            required: true,
        },
    },
    data() {
        return {
            chats: [],
            selectedChat: null,
            mensajes: [],
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
            axios.get(`/mensajes/${this.usuarioId}/${chatId}`)
                .then((response) => {
                    this.mensajes = response.data;
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
                return `Ayer, ${date.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' })}`;
            } else if (isToday) {
                return `Hoy, ${date.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' })}`;
            } else {
                return `${date.toLocaleDateString([], { weekday: 'long' })}, ${date.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' })}`;
            }
        },
    },
};
</script>

<style scoped>
.contenedor-chat {
    display: flex;
    flex-direction: row;
    max-width: 100%;
    margin: 0 auto;
    font-family: Arial, sans-serif;
    height: 100vh; /* Asegura que ocupe toda la altura de la pantalla */
}

.titulo-chat {
    color: #000;
    text-align: left;
    padding: 20px 10px;
    font-size: 22px;
    font-weight: bold;
}

.lista-chats {
    padding-top: 60px;
    width: 30%;
    border-right: 1px solid #ccc;
    overflow-y: auto;
    height: 100vh;
}

.detalles-chat {
    flex: 1;
    display: flex;
    flex-direction: column;
    height: 100vh;
}

.chat-completo {
    padding-top: 70px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.item-chat {
    display: flex;
    align-items: center;
    padding: 12px 10px;
    border-bottom: 1px solid #ccc;
    cursor: pointer;
    transition: background-color 0.3s;
}

.item-chat:hover {
    background-color: #f0f0f0;
}

.avatar-chat {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    margin-right: 12px;
    object-fit: cover;
}

.contenido-chat {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.cabecera-chat {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nombre-chat {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
    color: #000;
}

.hora-chat {
    font-size: 12px;
    color: #999;
    margin-left: auto;
}

.mensaje-chat {
    margin: 4px 0 0 0;
    font-size: 14px;
    color: #666;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.sin-chats {
    padding: 20px;
    text-align: center;
    color: #888;
}

.contenedor-mensajes {
    flex: 1;
    overflow-y: auto;
    display: flex;
    flex-direction: column-reverse; /* Muestra los mensajes desde abajo */
    padding: 10px;
}

.item-mensaje {
    display: flex;
    flex-direction: column;
    margin: 10px;
}

.mensaje-propio {
    align-items: flex-end;
}

.mensaje-otro {
    align-items: flex-start;
}

.burbuja-mensaje {
    display: inline-block;
    padding: 10px 15px;
    border-radius: 20px;
    font-size: 14px;
    background-color: #e0e0e0;
    color: #000;
    max-width: 70%;
    width: fit-content;
    word-wrap: break-word;
    white-space: pre-wrap;
}

.mensaje-propio .burbuja-mensaje {
    background-color: #2e726e;
    color: #fff;
}

.hora-mensaje {
    font-size: 12px;
    color: #999;
    margin-top: 5px;
}

.campo-escribir {
    display: flex;
    align-items: center;
    padding: 10px;
    border-top: 1px solid #ccc;
    background-color: #f9f9f9;
    position: sticky;
    bottom: 0;
}

.input-mensaje {
    flex: 1;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 20px;
    outline: none;
    margin-right: 10px;
}

.boton-enviar {
    padding: 10px 20px;
    font-size: 14px;
    background-color: #2e726e;
    color: #fff;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.boton-enviar:hover {
    background-color: #245a54;
}
</style>
