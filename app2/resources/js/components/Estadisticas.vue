<template>
    <div>
        <h5 class="mt-5 redText">Estadísticas</h5>
        <div class="estadisticasDiv">
            <canvas id="estadisticaChart"></canvas>
        </div>
    </div>
</template>

<script>
import Chart from 'chart.js/auto';

export default {
    props: {
        usuario: {
            type: Object,
            required: true,
        },
        usuarioAutenticadoId: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            estadisticas: [],
            esMusico: null,
            chart: null,
        };
    },
    mounted() {
        this.fetchEstadisticas();
    },
    methods: {
        fetchEstadisticas() {
            if (this.usuario.id_tipo_usuario === 2) {
                this.esMusico = true;
            } else if (this.usuario.id_tipo_usuario === 3) {
                this.esMusico = false;
            } else {
                console.error("Tipo de usuario no válido");
                return;
            }

            axios.get(`/estadisticas/${this.usuarioAutenticadoId}/${this.esMusico}`)
                .then(response => {
                    this.estadisticas = response.data;
                    this.generarGrafico();
                })
                .catch(error => {
                    console.error("Error cargando estadísticas", error);
                });
        },

        generarGrafico() {
            const id = this.usuarioAutenticadoId;
            const emisorCount = this.estadisticas.filter(m => m.id_emisor === id).length;
            const receptorCount = this.estadisticas.filter(m => m.id_receptor === id).length;

            if (this.chart) {
                this.chart.destroy(); // Destruir gráfico anterior si existe
            }

            const ctx = document.getElementById('estadisticaChart');
            this.chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Conversaciones iniciadas por tí', 'Conversaciones que han iniciado contigo'],
                    datasets: [{
                        label: 'Mensajes',
                        data: [emisorCount, receptorCount],
                        backgroundColor: ['#7C0023', '#406767'],
                        borderColor: ['#ffffff', '#ffffff'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: true,
                            text: 'Primeros mensajes'
                        }
                    }
                }
            });
        }
    }
};
</script>

<style scoped>
.estadisticasDiv {
    height: 400px;
    margin: auto;
    padding: 2rem;
}
</style>
