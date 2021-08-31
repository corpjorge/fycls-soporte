<template>
    <div class="col-12">
        <div class="multisteps-form mb-5">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto my-5">
                    <div class="multisteps-form__progress">
                        Soporte FYCLS
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 m-auto">
                    <form @submit.prevent="createService" class="multisteps-form__form mb-8" style="height: 410px;">
                        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                            <h5 class="font-weight-bolder mb-0">Crear servicio</h5>
                            <p class="mb-0 text-sm">Ingresa la información</p>
                            <div class="multisteps-form__content">
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Cliente</label>
                                        <select class="form-control" id="exampleFormControlSelect1" v-model="workplace_id" @change="getUsers">
                                            <option v-for="workplace in workplaces" :value="workplace.id">{{workplace.name}}</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Usuario</label>
                                        <select class="form-control" id="users"  v-model="service.user_id">
                                            <option v-for="user in users" :value="user.id" >{{user.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Solicitud</label>
                                        <input class="multisteps-form__input form-control" type="text" v-model="service.reason">
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Tipo de Atención</label>
                                        <select v class="form-control" id="exampleFormControlSelect1"  v-model="service.type_attention">
                                            <option>Remoto</option>
                                            <option>En sitio</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Tipo de Servicio</label>
                                        <select class="form-control" id="exampleFormControlSelect1" v-model="service.type_service">
                                            <option value="PC">PC</option>
                                            <option value="Portátil">Portátil</option>
                                            <option value="Correo">Correo</option>
                                            <option value="Office">Office</option>
                                            <option value="Impresión">Impresión</option>
                                            <option value="Telefonía">Telefonía</option>
                                            <option value="VPN">VPN</option>
                                            <option value="Publica">Publica</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label>Ingeniero </label>
                                        <select class="form-control" id="exampleFormControlSelect1" v-model="service.agent_id">
                                            <option v-for="agent in agents" :value="agent.id" >{{agent.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="button-row d-flex mt-4">
                                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="submit" title="Next">Crear</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Numero de caso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h3 style="#bb3123">{{ caso }}</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from "axios";

export default {
    data() {
        return {
            workplaces: null,
            workplace_id: null,
            users: null,
            caso: null,
            service: {},
            caso_create: {},
            agents: {}
        }
    },
    mounted() {
        this.getWorkplaces();
        this.getAgents();
    },
    methods: {
        getWorkplaces() {
            axios.get('/workplaces').then(response => { this.workplaces = response.data })
        },
        getUsers(){
            axios.get('/workplace/'+this.workplace_id+'/users').then( response => { this.users = response.data })
        },
        getAgents(){
            axios.get('/agents').then( response => { this.agents = response.data })
        },
        createService(){
            axios.post('/service', this.service ).then(response => {
                this.caso_create = this.service
                this.caso = response.data;
                this.service = {}
                var myModal = new bootstrap.Modal(document.getElementById('myModal'), options)
                myModal.show();
            })
        }
    }

}
</script>

<style scoped>

</style>
