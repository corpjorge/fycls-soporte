<template>
    <form  @submit.prevent="createPublication" class="row g-3">
        <div v-if="success" style="color: white;" class="alert alert-success alert-dismissible fade show" role="alert">
            Datos actualizados
            <button @click="hidden" type="button" class="btn-close"></button>
        </div>

        <div class="col-md-4">
            <label for="type" class="form-label">Tipo de solicitud </label>
            <select name="type" class="form-select" id="type" v-model="publication.type">
                <option value="Tipó 1"> Tipó 1</option>
                <option value="Tipó 2"> Tipó 2</option>
                <option value="Tipó 3"> Tipó 3</option>
            </select>
            <small style="color: red">{{ errors.type ? errors.type[0] : ''}}</small>
        </div>

        <div class="col-md-4">
            <label for="achievement" class="form-label">¿Que se desea lograr?</label>
            <input type="text" class="form-control" id="achievement" v-model="publication.achievement">
            <small style="color: red">{{ errors.achievement ? errors.achievement[0] : ''}}</small>
        </div>

        <div class="col-md-4">
            <label for="message" class="form-label">¿Qué mensaje quiere comunicar?</label>
            <textarea class="form-control" id="message" rows="3" v-model="publication.message"></textarea>
            <small style="color: red">{{ errors.message ? errors.message[0] : ''}}</small>
        </div>

        <div class="col-md-4">
            <label for="information" class="form-label">¿Datos de contacto a incluir?</label>
            <textarea class="form-control" id="information" rows="3" v-model="publication.information"></textarea>
            <small style="color: red">{{ errors.information ? errors.information[0] : ''}}</small>
        </div>

        <div class="col-md-4">
            <label for="description" class="form-label">Descripción </label>
            <textarea class="form-control" id="description" rows="3" v-model="publication.description"></textarea>
            <small style="color: red">{{ errors.description ? errors.description[0] : ''}}</small>
        </div>

        <div class="col-md-4">
            <label class="form-label">Medios de publicación </label><br>
            <input class="form-check-input" type="checkbox" value="Mensaje de texto" id="Mensaje de texto" v-model="publication.media" >
            <label class="custom-control-label" for="Mensaje de texto">Mensaje de texto</label>
            <br>
            <input class="form-check-input" type="checkbox" value="Correo masivo" id="Correo masivo" v-model="publication.media" >
            <label class="custom-control-label" for="Correo masivo">Correo masivo</label>
            <br>
            <input class="form-check-input" type="checkbox" value="Redes sociales" id="Redes sociales" v-model="publication.media">
            <label class="custom-control-label" for="Redes sociales">Redes sociales</label>
            <br>
            <small style="color: red">{{ errors.media ? errors.media[0] : ''}}</small>
        </div>

        <div class="col-md-4">
            <label for="achievement" class="form-label">¿A qué publico va dirigido?</label>
            <input type="text" class="form-control" id="achievement" v-model="publication.public">
            <small style="color: red">{{ errors.achievement ? errors.achievement[0] : ''}}</small>
        </div>

        <div class="col-md-4">
            <label for="description" class="form-label">Fecha de publicación  </label>
            <input class="form-control" id="date" type="date" v-model="publication.date"  >
            <small style="color: red">{{ errors.public ? errors.public[0] : ''}}</small>
        </div>

        <div class="col-12">
            <button class="btn bg-gradient-info btn-lg w-100" type="submit">Solicitar publicación</button>
        </div>
    </form>
</template>

<script>
import axios from "axios";

export default {
    name: "CreatePublication",
    data() {
        return {
            publication: {
                media: []
            },
            errors: {},
            success: null
        }
    },
    methods: {
        createPublication() {
            axios.post('publications/create', this.publication ).then(() => { this.success = true }).catch(error => { console.log(error) })
        }
    }
}
</script>

<style scoped>

</style>
