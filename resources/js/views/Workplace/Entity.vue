<template>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Usuarios</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ totalUsers }}
                                    <span class="text-success text-sm font-weight-bolder">ver</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Equipos</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ totalDevices }}
                                    <span class="text-success text-sm font-weight-bolder">ver</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-laptop text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Otros</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ totalProducts }}
                                    <span class="text-success text-sm font-weight-bolder">ver</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <router-view />
</template>

<script>
import axios from "axios";

export default {
    name: "Entity",
    data() {
        return {
            totalUsers: null,
            totalDevices: null,
            totalProducts: null,
        }
    },
    mounted() {
        this.getTotalUsers();
        this.getTotalDevices();
        this.getTotalProducts();
    },
    methods: {
        async getTotalUsers() {
            await axios.get('workplace/'+this.$route.params.id+'/users/total').then(response => { this.totalUsers = response.data })
        },
        async getTotalDevices() {
            await axios.get('workplace/'+this.$route.params.id+'/devices/total').then(response => { this.totalDevices = response.data })
        },
        async getTotalProducts() {
            await axios.get('workplace/'+this.$route.params.id+'/products/total').then(response => { this.totalProducts = response.data })
        }
    }
}
</script>

<style scoped>

</style>
