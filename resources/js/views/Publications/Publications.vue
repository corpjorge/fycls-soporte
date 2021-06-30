<template>
    <CreatePublication v-if="show" />
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-3 d-flex align-items-center">
                            <h6 class="mb-0">Listado de publicaciones</h6>
                        </div>
                        <div class="col-md-3 d-flex align-items-center">

                        </div>
                        <div class="col-md-3 text-right ms-md-auto pe-md-3 d-flex align-items-end">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" placeholder="Buscar...">
                            </div>
                        </div>
                        <div class="col-md-3 text-right">
                            <button @click="formPublication" class="btn bg-gradient-dark mb-0"> Solicitar</button>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Estado</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ver</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="publication in publications" :key="publications.id" >
                                <td>
                                    <div class="d-flex px-2">
                                        <div class="my-auto">
                                            <router-link :to="{ name: 'User', params: { id: publication.id } }">
                                                <h6 class="mb-0 text-sm">{{ publication.type }}</h6>
                                            </router-link>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2">
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">
                                                <span v-if="publication.state" class="badge badge-sm bg-gradient-success">success</span>
                                                <span v-else class="badge badge-sm bg-gradient-warning">Pendiente</span>
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <a  class="btn btn-link text-secondary mb-0">
                                        <i class="fas fa-angle-right text-xl"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import CreatePublication from "./CreatePublication";

export default {
    name: "Publications",
    components: {CreatePublication},
    data() {
        return {
            publications: {},
            show: false
        }
    },
    mounted() {
        this.getPublications();
    },
    methods: {
        async getPublications(){ await axios.get('publications/').then(response => { this.publications = response.data }) },
        formPublication() { this.show = true }
    }
}
</script>
