<template>
    <div class="contenedor-chat">

        <div class="lista-chats" :class="{ ocultar: selectedChat }">
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

        <div class="detalles-chat" :class="{ mostrar: selectedChat }" v-if="selectedChat">

            <div class="encabezado-chat">
                <h1 class="nombre-contacto">{{ selectedChat.emisor_nombre }}</h1>
            </div>

            <div class="chat-completo">
                <div class="contenedor-mensajes" ref="scrollMensajes">
                    <ul>
                        <li v-for="mensaje in mensajes" :key="mensaje.id"
                            :class="['item-mensaje', mensaje.id_emisor === usuarioId ? 'mensaje-propio' : 'mensaje-otro']">
                            <span class="burbuja-mensaje">{{ mensaje.contenido }}</span>
                            <div class="hora-mensaje">{{ formatFecha(mensaje.fecha_hora) }}</div>
                        </li>
                    </ul>
                </div>

                <div class="campo-escribir">
                    <input type="text" v-model="nuevoMensaje" placeholder="Escribe un mensaje..."
                        class="input-mensaje" />
                    <button class="boton-enviar" @click="enviarMensaje"><img :src="`images/enviar.png`" alt="Enviar"
                            class="icono-enviar"></button>
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
        tipoUsuario: {
            type: Number,
            required: true,
        }
    },
    data() {
        return {
            chats: [],
            selectedChat: null,
            mensajes: [],
            nuevoMensaje: "",
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
        enviarMensaje() {
            if (!this.nuevoMensaje.trim()) {
                return;
            }

            const insertMensaje = {
                contenido: this.nuevoMensaje,
                id_emisor: this.usuarioId,
                id_receptor: this.selectedChat.id_emisor,
                es_leido: 0,
                tipo_usuario: this.tipoUsuario,
            };

            axios.post(`/mensajes`, insertMensaje)
                .then((response) => {
                    this.mensajes.push(response.data);
                    this.nuevoMensaje = "";
                })
                .catch((error) => {
                    console.error("Error al enviar el mensaje:", error);
                });
        },
        formatFecha(fecha) {
            const date = new Date(fecha);
            const now = new Date();
            const isToday = date.toDateString() === now.toDateString();
            const yesterday = new Date();
            yesterday.setDate(now.getDate() - 1);

            if (date.toDateString() === yesterday.toDateString()) {
                return `ayer, ${date.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' })}`;
            } else if (isToday) {
                return `hoy, ${date.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' })}`;
            } else {
                return `${date.toLocaleDateString([], { weekday: 'long' })}, ${date.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' })}`;
            }
        },
        scrollToBottom() {
            this.$nextTick(() => {
                const contenedor = this.$refs.scrollMensajes;
                if (contenedor) {
                    contenedor.scrollTop = contenedor.scrollHeight;
                }
            });
        }
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
    height: 100vh;
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
    display: flex;
    flex-direction: column;
    flex: 1;
    overflow: hidden;
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
    max-width: calc(100% - 60px);
    overflow: hidden;
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
    max-width: 100%;
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
    flex-direction: column-reverse;
    padding: 10px;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.contenedor-mensajes::-webkit-scrollbar {
    display: none;
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

.encabezado-chat {
    padding-top: 75px;
    padding-left: 20px;
}

.icono-enviar {
    width: auto;
    height: 15px;
}

@media (max-width: 768px) {
    .contenedor-chat {
        flex-direction: column;
    }

    .lista-chats {
        width: 100%;
        height: 100vh;
        display: block;
    }

    .lista-chats.ocultar {
        display: none;
    }

    .detalles-chat {
        display: none;
        width: 100%;
        height: 100vh;
    }

    .detalles-chat.mostrar {
        display: flex;
        flex-direction: column;
    }

    .titulo-chat {
        padding: 10px;
        font-size: 18px;
    }

    .encabezado-chat {
        position: sticky;
        top: 0;
        z-index: 10;
        background-color: #ffffff;
        padding: 10px;
    }

    .campo-escribir {
        display: flex;
        align-items: center;
        padding: 10px;
        border-top: 1px solid #ccc;
        background-color: #f9f9f9;
        position: fixed;
        bottom: 70px;
        width: 100%;
        z-index: 10;
    }

    .lista-chats {
        padding-top: 10px;
    }

    .contenedor-mensajes{
        padding-bottom: 120px;
    }
}
</style>
