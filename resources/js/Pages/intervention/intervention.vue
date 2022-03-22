<template>
    <div>
        Intervention


        <form @submit.prevent="form.post($route('doAddInter', {id: id_ticket}))">
     
            <label for="type_inter">Veuillez entrer une intervention</label>
            <input type="text" name="type_inter" id="type_inter" v-model="form.type_inter">

                  <b v-if="form.errors.type_inter" class="text-danger">{{form.errors.type_inter}}</b>

            <div><input type="submit" value="Valider"></div>
    <div v-if="form.processing">En cours ...</div>

            
        </form>
        
    </div>
</template>

<script>
export default {
    name:"AddInter",
    props:{
        id_ticket: Number 
    },
    data(){
        return{
            form: this.$inertia.form({
                type_inter: "",
            }),
            
        }
    }
}
</script>