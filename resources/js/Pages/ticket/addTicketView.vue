<template>
    <div>
        <h1>Ajouter un ticket</h1>

        <form @submit.prevent="form.post($route('AddTicket'))">
                <div>
                    <div>
                        <label for="Type_de_problème">Type de problème</label>
                        <select v-model="form.type_prob" id="type_prob" onChange="combo(this, 'theinput')">
                        <option :value="null"> Type de problème </option>
                        <option v-for="item in tpb" :key="item.id" :value="item.id_tpb">{{item.libelle_tpb}}</option>
                        </select>
                    </div>
                    <div>
                        <label for="precision_Probléme">Précision sur le problème :</label>
                        <input type="text" id="prec_prob" v-model="form.prec_prob" placeholder="Précision sur le problème">
                    </div>
                    <div>
                    <label for="Description_Probléme">Description du problème :</label>
                    <textarea v-model="form.desc_prob" id="desc_prob" rows="5" cols="50">Description du problème :</textarea>
                    </div>
                    <div>
                        <label for="N_Poste_Prob">Numéro du poste affecté par le problème</label>
                        <input type="text" v-model="form.poste_prob" id="poste_prob">
                    </div>
                    <div>
                        <label for="Etat_Prob">
                            Niveau de priorité du problème :
                            <select v-model="form.etat_prob" value="etat_prob">
                                <option :value="null">Selectionner niveau problème :</option>
                                <option value="Urgent">Problème urgent</option>
                                <option value="Important">Problème important</option>
                                <option value="Non urgent">Problème mineur</option>
                            </select>
                        </label>
                    </div>
                    <div>
                        <label for="PJ_Prob">Joindre une image/Capture d'écran</label>
                        <br>
                        <input type="file"   @input="form.pj = $event.target.files[0]" id="PJ">
                    </div>
                    <div>
                        <input type="submit" value="Envoyer ticket">
                    </div>
                </div>
        </form>
    </div>
</template>



<script>
export default {
    name:"addTicket",
    data(){
        return{
            form: this.$inertia.form({
                type_prob: null,
                prec_prob:"",
                desc_prob:"",
                poste_prob:"",
                pj:"",
                etat_prob:null,
            })
        }
    },
    props:{
        tpb: Array
    }
}
</script>