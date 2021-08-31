<template>
    <div class="col-12">
        <div class="multisteps-form mb-5">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto my-3">
                    <div class="multisteps-form__progress">
                        Soporte FYCLS
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8 m-auto">
                <div class="rating">
                    <span class="rating__result"></span>
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                </div>
            </div>

            <template v-if="empty">
                <div class="col-12 col-lg-8 m-auto">
                    <div class="multisteps-form__form" style="height: 327px;">
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                            <div class="multisteps-form__content">
                                <h5>Error al obtener datos del servicio: <b style="color: #ff4f4f;"> {{ $route.params.id }} </b></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <template v-else >

            <div class="row">
                <div class="col-12 col-lg-8 m-auto my-3">
                    <div class="multisteps-form__form">
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                            <h5 class="font-weight-bolder mb-0">Servicio numero: {{ service.id }}</h5>
                            <p class="mb-0 text-sm">Consulte la información</p>
                            <div class="multisteps-form__content">
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Cliente: </label>
                                        <label style="font-weight: 400;">
                                            <template v-for="workplace in workplaces">
                                                <template v-if="workplace.id === service.user.workplace_id" > {{ workplace.name }} </template>
                                            </template>
                                        </label>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Usuario</label>
                                        <label style="font-weight: 400;"> {{ service.user.name }} </label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Solicitud</label>
                                        <label style="font-weight: 400;"> {{ service.reason }} </label>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Tipo de Atención</label>
                                        <label style="font-weight: 400;"> {{ service.type_attention }} </label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Tipo de Servicio</label>
                                        <label style="font-weight: 400;"> {{ service.type_service }} </label>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label>Fecha Solicitud</label>
                                        <label style="font-weight: 400;"> {{ service.created_at }} </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div v-if="service.closing_date || close" class="col-12 col-lg-8 m-auto my-3">
                    <div class="multisteps-form__form">
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                            <h5 class="font-weight-bolder mb-0">Servicio cerrado</h5>
                            <p class="mb-0 text-sm">Información</p>
                            <div class="multisteps-form__content">
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Fecha Atención: </label>
                                        <label style="font-weight: 400;"> {{service.attention_date}} </label>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Solución</label>
                                        <label style="font-weight: 400;"> {{ service.solution }} </label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Observaciones</label>
                                        <label style="font-weight: 400;"> {{ service.observations }} </label>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Fecha cierre</label>
                                        <label style="font-weight: 400;"> {{ service.closing_date }} </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else class="col-12 col-lg-8 m-auto my-3  ">
                    <form @submit.prevent="updateService" class="multisteps-form__form mb-8">
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                            <h5 class="font-weight-bolder mb-0">Cerrar servicio</h5>
                            <p class="mb-0 text-sm">Ingresa la información</p>
                            <div class="multisteps-form__content">
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Fecha Atención</label>
                                        <input class="form-control" type="datetime-local" id="meeting-time" v-model="service.attention_date">
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Solución</label>
                                        <input class="multisteps-form__input form-control" type="text" v-model="service.solution">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Observaciones</label>
                                        <input class="multisteps-form__input form-control" type="text" v-model="service.observations">
                                    </div>
                                </div>
                                <div class="button-row d-flex mt-4">
                                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Next">Cerrar servicio</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</template>

        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ServiceShow",
    data() {
        return {
            service: { user: {} },
            workplaces: null,
            close: false,
            empty: null
        }
    },
    mounted() {
        this.getService()
        this.getWorkplaces();
        this.rating();
    },
    methods: {
        getService() {
            axios.get('/service/'+this.$route.params.id+'/edit').then(response => { this.service = response.data  }).catch(error =>  this.empty = error)
        },
        getWorkplaces() {
            axios.get('/workplaces').then(response => { this.workplaces = response.data  })
        },
        updateService() {
            axios.put('/service/'+this.$route.params.id, this.service).then(() => this.close = true);
        },
        rating(){
            const ratingStars = [...document.getElementsByClassName("rating__star")];
            const ratingResult = document.querySelector(".rating__result");

            printRatingResult(ratingResult);

            function executeRating(stars, result) {
                const starClassActive = "rating__star fas fa-star";
                const starClassUnactive = "rating__star far fa-star";
                const starsLength = stars.length;
                let i;
                stars.map((star) => {
                    star.onclick = () => {
                        i = stars.indexOf(star);

                        if (star.className.indexOf(starClassUnactive) !== -1) {
                            printRatingResult(result, i + 1);
                            for (i; i >= 0; --i) stars[i].className = starClassActive;
                        } else {
                            printRatingResult(result, i);
                            for (i; i < starsLength; ++i) stars[i].className = starClassUnactive;
                        }
                    };
                });
            }

            function printRatingResult(result, num = 0) {
                result.textContent = `${num}/5`;

                console.log(result.textContent)
            }

            executeRating(ratingStars, ratingResult);

        }
    }
}
</script>

<style scoped>
.rating {
    position: relative;
    width: 180px;
    background: transparent;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: .3em;
    padding: 5px;
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 0 2px #b3acac;
}

.rating__result {
    position: absolute;
    top: 0;
    left: 0;
    transform: translateY(-10px) translateX(-5px);
    z-index: -9;
    font: 3em Arial, Helvetica, sans-serif;
    color: #ebebeb8e;
    pointer-events: none;
}

.rating__star {
    font-size: 1.3em;
    cursor: pointer;
    color: #dabd18b2;
    transition: filter linear .3s;
}

.rating__star:hover {
    filter: drop-shadow(1px 1px 4px gold);
}


</style>
