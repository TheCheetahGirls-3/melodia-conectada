<template>
    <div class="chat-container">
      <h1 class="chat-title">Contactos</h1>
      <div v-if="chats.length > 0" class="chat-list">
        <div v-for="chat in chats" :key="chat.id_emisor" class="chat-item">
          <img
            :src="`images/imagenes_perfil/${chat.foto_perfil}`"
            alt="Foto de perfil"
            class="chat-avatar"
          />
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
  </template>


<script>
export default {
  props: {
    usuarioId: {
      type: Number,
    },
  },
  data() {
    return {
      chats: [],
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
  max-width: 500px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
}

.chat-title {
  color: #000;
  text-align: left;
  padding: 100px 0 20px 10px;
  font-size: 22px;
  font-weight: bold;
}

.chat-list {
  display: flex;
  flex-direction: column;
}

.chat-item {
  display: flex;
  align-items: center;
  padding: 12px 10px;
  border-bottom: 1px solid #ccc;
  cursor: pointer;
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

</style>
