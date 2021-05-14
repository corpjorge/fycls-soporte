<template>
    <div class="card card-body blur shadow-blur my-4">
        <div class="row gx-4">
            <div class="col-auto my-auto">
                <div class="card-header pb-0 p-3" data-v-a7feaa40=""><div class="row" data-v-a7feaa40=""><div class="col-md-3 d-flex align-items-center" data-v-a7feaa40=""><h6 class="mb-0" data-v-a7feaa40="">Usuarios</h6></div><div class="col-md-3 d-flex align-items-center" data-v-a7feaa40=""></div><div class="col-md-3 text-right ms-md-auto pe-md-3 d-flex align-items-end" data-v-a7feaa40=""><div class="input-group" data-v-a7feaa40=""><span class="input-group-text text-body" data-v-a7feaa40=""><i class="fas fa-search" aria-hidden="true" data-v-a7feaa40=""></i></span><input type="text" class="form-control" placeholder="Buscar..." data-v-a7feaa40=""></div></div><div class="col-md-3 text-right" data-v-a7feaa40=""><button class="btn bg-gradient-dark mb-0" href="javascript:;" data-v-a7feaa40=""><i class="fas fa-plus" aria-hidden="true" data-v-a7feaa40=""></i>&nbsp;&nbsp;Añadir usuario</button></div></div></div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <h6 class="mb-0">Payment Method</h6>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New Card</a>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "User",
    data(){
        return {
            user: {},
            device: null,
            service: null
        }
    },
    mounted() {
        this.getUser();
        //this.deviceCurrent();
        //this.serviceCurrent();
    },
    methods: {
        async getUser() {
            await axios.get('/user/'+this.$route.params.id).then(response => { this.user = response.data })
        },
        async deviceCurrent() {
            //await axios.get('').then()
        },
        async serviceCurrent() {
            //await axios.get('').then()
        }

    }
}
</script>

<style scoped>

</style>
