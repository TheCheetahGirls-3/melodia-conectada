<template lang="">
        <div class="card mt-2 mb-1">
        <div class="card-body">
            <h5 class="card-title">Instrumentos</h5>
            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                        <tr v-for="instrumento in instrumentos" :key="instrumento.id">
                            <td>{{ instrumento.nombre }}</td>
                            <td>
                                <form class="float-right ml-1"
                                    action="{{ action([App\Http\Controllers\Api\InstrumentoController::class, 'destroy'], ['instrumento' => $instrumento->id]) }}"
                                    method="POST">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Esborrar
                                    </button>
                                </form>
                                <form class="float-right" action="{{ action([App\Http\Controllers\Api\InstrumentoController::class, 'edit'], ['instrumento' => $instrumento->id]) }}">
                                    <button type="submit" class="btn btn-sm btn-secondary">
                                        <i class="fa fa-edit" aria-hidden="true"></i> Editar
                                    </button>
                                </form>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            instrumentos: []
        }
    },
    created() {
        const me = this;
        axios
            .get('/instrumento')
            .then(response => {
                me.instrumentos = response.data;
            })
    },
}
</script>
<style scoped>

</style>
