<template>
    <div>
        <div>
            <Link :href="$route('testo')"> <button>Home</button></Link>
        </div>

        
        <div>
            <h3>Mes Interventions</h3>
            <table border="1">
                <thead>
                    <th>Nom de l'intervention</th>
                    <th>Date de l'intervention</th>
                    <th>Nom du ticket</th>
                    <th>N°poste</th>
                    <th>Piece jointe</th>
                    <th>Commentaire</th>
                    <th>Ajouter un commentaire</th>
                    <th>Rejeter Le ticket</th>

                </thead>
                
                <tr v-for="item in inter_list" :key="item.id_inter">
                    
                    <td>{{item.type_inter}}</td>
                    <td>{{item.date_inter}}</td>
                    <td >{{item.ticket.precision_tik}}</td>
                    <td>{{item.ticket.poste_tik}}</td>
                     <td><a  v-if="item.ticket.path_tik !=null" :href="item.ticket.path_tik">Pièce jointe</a></td>
                    <td><div  v-if="item.commentaire != null">{{item.commentaire.content_com}}</div></td>
                    <td  v-if="item.commentaire == null">
                      <form @submit.prevent="form.post($route('commentaireAdd',{id: item.id_inter}))">
                        <div>
                           
                            <label for="comments">Entrer un commentaire</label>
                            <textarea name="content_com"  id="comments" v-model="form.content_com"></textarea>
                            <b v-if="form.errors.content_com">{{form.errors.content_com}}</b>
                        </div>

                        <div>
                            <input type="submit" value="Valider">
                        </div>

                      </form>
                    </td>
                    <td v-if="item.commentaire == null">
                     <Link :href="$route('rejetInter',{ id: item.id_inter})">
                        Rejeter le ticket
                     </Link>
                    </td>




                </tr>


            </table>

        </div>


    </div>
</template>


<script>
export default {
    name: "Bonjours",
    props:{
       user: {
           type: Object
           },
        inter_list: Array,  
       
    },

     data(){
        return{
            form: this.$inertia.form({
                content_com: "",
                id_inter: "item.id_inter",
            })
        }
   

     }
}
</script>