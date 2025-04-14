<template>
    <div v-if="usuario" class="banner">
        <img class="bannerPic" :src="'/melodia-conectada/app2/public/images/bannerMusico.png'" alt="foto del banner">
        <div class="bannerContent">
            <div class="profilePicDivBg m-5 rounded-circle">
                <div class="profilePicDiv rounded-circle">
                    <img class="profilePic" :src="'/melodia-conectada/app2/public/images/imagenes_perfil/' + usuario.clientes.foto_perfil" alt="foto de perfil">
                </div>
            </div>
            <div class="bannerText ms-2">
                <h1>{{ usuario.clientes.nombre }}</h1>
                <h4 class="mb-0">
                    {{ usuario.clientes.musicos?.instrumentos?.map(i => i.nombre).join(', ') || usuario.clientes.locales?.tipo_local?.nombre }}
                </h4>
                <h4>{{ usuario.clientes.ubicacion }}</h4>
            </div>
        </div>
    </div>

    <p class="mt-4 mb-4">{{ usuario.clientes.descripcion }}</p>
    <div class="tagRow" v-if="usuario.clientes.musicos?.instrumentos?.length || usuario.clientes.locales?.tipo_local?.nombre || usuario.clientes.musicos?.generos?.length || (usuario.clientes.locales && usuario.clientes.locales.es_accesible !== null)">
        <div 
            class="badge text-bg-danger rounded-pill p-2 px-3 mx-1" 
            v-if="usuario.clientes.musicos?.instrumentos?.length"
        >
            {{ usuario.clientes.musicos.instrumentos.map(i => i.nombre).join(', ') }}
        </div>
        <div 
            class="badge text-bg-danger rounded-pill p-2 px-3 mx-1" 
            v-if="usuario.clientes.locales?.tipo_local?.nombre"
        >
            {{ usuario.clientes.locales.tipo_local.nombre }}
        </div>
        <div 
            class="badge text-bg-danger rounded-pill p-2 px-3 mx-1" 
            v-if="usuario.clientes.musicos?.generos?.length"
        >
            {{ usuario.clientes.musicos.generos.map(g => g.nombre).join(', ') }}
        </div>
        
        <div 
            class="badge text-bg-danger rounded-pill p-2 px-3 mx-1" 
            v-if="usuario.clientes.locales && usuario.clientes.locales.es_accesible !== null"
        >
            {{ usuario.clientes.locales.es_accesible === 1 ? 'Accesible' : 'No accesible' }}
        </div>
    </div>

    <h5 class="mt-5 redText">Teléfono</h5>
    <h6>{{ usuario.clientes.telefono }}</h6>
</template>

<script>
export default {
    props: {
        usuarioId: Number,
        usuario: {
            type: Object,
        },
    }
};
</script>