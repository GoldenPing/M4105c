<template>
    <div>
        <div v-if="comm">
        <h2>Liste des commentaires</h2>
        <table border="1">
            <thead>
                <th>Date du commentaire :</th>
                <th>Commentaire :</th>
                <th>Opérateur :</th>
            </thead>
            <tr>
                <td>{{inter.date_inter}}</td>
                <td>{{comm.content_com}}</td>
                <td>{{spec.login_spec}}</td>
            </tr>
        </table>
        </div>
        <div v-else>
        <h2>Ajouter un commentaire</h2>
        <form @submit.prevent="form.post($route('commentaireAdd'))">
        <div>
            <label for="commentaireAdd">Veuillez entrer un commentaire</label>
            <input type="text" id="content_com" name="content_com" v-model="form.content_com">
        </div>
        <div>
            <input type="submit" value="Valider">
        </div>
        </form>
        </div>
    </div>
</template>
<script>
export default {
    name:"content_com",
    props:{
        inter : Object,
        comm : Object,
        spec : Object,
    },
    data(){
        return{
            form: this.$inertia.form({
                content_com: "",
                id_inter: this.inter.id_inter,
            })
        }
    }
}
</script>