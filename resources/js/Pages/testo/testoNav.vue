<template>
    <div>
        <h1>Utilisateur</h1>
        <h2>{{user.name}}</h2>
        <div>
            <Link :href="$route('logout')">
              <button>Déconnexion</button>
            </Link>
          </div>
        <div v-if="user.role == 'spec' ||user.role =='resp'"> 
        

          <div  >
            <Link :href="$route('myInter')">
              <button>Mes Interventions</button>
            </Link>
          </div>

       <div >
    <h3>Liste des tickets</h3>
    <table v-if="ticket_list != null">
      <thead>
        <th>Emeteur</th>
        <th>Date Ticket</th>
        <th>Type problème</th>
        <th>Précision problème</th>
        <th>Niveau d'urgence</th>
        <th>N°poste</th>
        <th class="desc">Description</th>
        <th>Pièce jointe</th>
        
      </thead>

      <tr v-for="item in ticket_list" :key="item.id_tik">
        <td>{{ item.personnel.login_pers }}</td>
        <td>{{ item.date_tik }}</td>
        <td>{{ item.type_probleme.libelle_tpb }}</td>
        <td>{{ item.precision_tik }}</td>
        <td>{{ item.urgence_tik }}</td>
        <td>{{ item.poste_tik }}</td>
        <td class="desc">{{ item.desc_tik }}</td>
         <td><a  v-if="item.path_tik !=null" :href="item.path_tik">Pièce jointe</a></td>
        <td>
          <div>
            <Link :href="$route('oneTicket', { id: item.id_tik })">
              <button>Détail Ticket</button>
            </Link>
          </div>
          <div  v-if="item.id_inter == null">
           <Link :href="$route('AddInter', { id: item.id_tik })">
              <button>Entrer une Intervention</button>
            </Link>
          </div>
        </td>
      </tr>
    </table>
  </div>
  </div>


<div v-if="user.role == 'pers'" class="center">

<div>
  
 <h4>Ajouter un ticket</h4>

        <form @submit.prevent="form.post($route('AddTicket'))">
                <div>
                    <div class="champ">
                        <label for="Type_de_probléme">Type de problème</label>
                        <select v-model="form.type_prob" id="Type_de_probléme" onChange="combo(this, 'theinput')">
                        <option  :value="null"> Type de problème :  </option>
                        <option v-for="item in tpb_list" :key="item.id" :value="item.id_tpb">{{item.libelle_tpb}}</option>
                        </select>
                        <b v-if="form.errors.type_prob" class="text-danger">{{form.errors.type_prob}}</b>
                    </div>
                    <div class="champ">
                        <label for="precision_Probléme">Précision sur le problème :</label>
                        <input type="text" id="precision_Probléme" v-model="form.prec_prob" placeholder="Précition sur le problème">
                       <b v-if="form.errors.prec_prob" class="text-danger">{{form.errors.prec_prob}}</b>

                    </div>
                    <div class="champ">
                    <label for="Description_Probléme">Description du problème :</label>
                    <textarea v-model="form.desc_prob" id="Description_Probléme" rows="5" cols="50">Description du problème :</textarea>
                     <b v-if="form.errors.desc_prob" class="text-danger">{{form.errors.desc_prob}}</b>

                    </div>
                    <div class="champ">
                        <label for="N_Poste_Prob">Numéro du poste affecté par le problème</label>
                        <input type="text" v-model="form.poste_prob" id="N_Poste_Prob">
                       <b v-if="form.errors.poste_prob" class="text-danger">{{form.errors.poste_prob}}</b>
                    </div>
                    <div class="champ">
                        <label for="Etat_Prob"></label>
                            Définissez le niveau de priorité du problème :
                            <select v-model="form.etat_prob" value="etat_prob" id="Etat_Prob">
                                <option :value="null">Selectionner urgence problème :</option>
                                <option value="Urgent">Problème urgent</option>
                                <option value="Important">Problème important</option>
                                <option value="Non urgent">Problème mineur</option>
                            </select>
                         <b v-if="form.errors.etat_prob" class="text-danger">{{form.errors.etat_prob}}</b>

                    </div>
                    <div class="champ">
                        <label for="PJ_Prob">Joindre une image/Capture d'écran</label>
                        <br>
                        <input type="file"   @input="form.pj = $event.target.files[0]" id="PJ_Prob">
                       <b v-if="form.errors.pj" class="text-danger">{{form.errors.pj}}</b>

                    </div>
                    <div class="button">
                        <input type="submit" value="Envoyer ticket">
                         <div v-if="form.processing">En cours ...</div>
                    </div>
                </div>
        </form>
       </div>

       <div>

         <h4>Mes tickets</h4>

 <table >
      <thead>
        <th>Date Ticket</th>
        <th>Type problème</th>
        <th>Précision problème</th>
        <th>Niveau d'urgence</th>
        <th>N°poste</th>
        <th class="desc">Description</th>
        <th>Pièce jointe</th>
        <th>Etat du Ticket</th>
      </thead>

      <tr v-for="item in myTicket_list" :key="item.id_tik">
        <td>{{item.date_tik}}</td>
        <td>{{item.type_probleme.libelle_tpb}}</td>
        <td>{{item.precision_tik}}</td>
        <td>{{item.urgence_tik}}</td>
        <td>{{item.poste_tik}}</td>
        <td class="desc">{{item.desc_tik}}</td>
        <td><a  v-if="item.path_tik !=null" :href="item.path_tik">Pièce jointe</a></td>
        <td>{{item.etat_tik}}</td>
      </tr>

 </table>
       </div>
</div>



<div v-if="user.role =='resp'">
<h2>Responsable</h2>
 <h3>Liste des tickets</h3>
    <table>
      <thead>
        <th>Emeteur</th>
        <th>Date Ticket</th>
        <th>Type problème</th>
       
        <th>Niveau d'urgence</th>
      
      
      </thead>

      <tr v-for="item in ticket_all" :key="item.id_tik">
        <td>{{ item.personnel.login_pers }}</td>
        <td>{{ item.date_tik }}</td>
        <td>{{ item.type_probleme.libelle_tpb }}</td>
      
        <td>{{ item.urgence_tik }}</td>
      
        <td>
          <div v-if="item.id_inter != null">
            <Link :href="$route('oneTicket', { id: item.id_tik })">
              <button>Détail Ticket</button>
            </Link>
          </div>
          <div v-else>
            <form
              @submit.prevent="
                form.post($route('rediTik', { id: item.id_tik }))">
              <select name="specialiste" v-model="form.specialiste">
                <option :value="null">Sélectionner un spécialiste</option>
                <option
                  v-for="item in specs_list"
                  :key="item.id"
                  :value="item.id_spec">
                  {{ item.login_spec }}
                </option>
              </select>
             <b v-if="form.errors.specialiste" class="text-danger">{{form.errors.specialiste}}</b>

              <div class="button">
                <input type="submit" value="Valider">
                 <div v-if="form.processing">En cours ...</div>
              </div>
            </form>
          </div>
        </td>
      </tr>
    </table>


   <div>
            <h3>Toutes Les Interventions</h3>
            <table>
                <thead>
                    <th>Nom de l'intervention</th>
                    <th>Date de l'intervention</th>
                    <th>Nom du ticket</th>
                    <th>N°poste</th>
                    <th>Commentaire</th>
                    <th>Attribué à</th>

                </thead>
                
                <tr v-for="item in inter_list" :key="item.id_inter">
                    
                    <td>{{item.type_inter}}</td>
                    <td>{{item.date_inter}}</td>
                    <td>{{item.ticket.precision_tik }}</td>
                    <td>{{item.ticket.poste_tik}}</td>
                    <td><div  v-if="item.commentaire ===''">{{item.commentaire}}</div></td>
                    <td>{{item.specialiste.login_spec}}</td>




                </tr>


            </table>

        </div>

 <div v-if="stats != null">
        <h1>Statistique</h1>

        <p>Nombre total de ticket : <b>{{stats.ttxTik}}</b></p>
        <p>Nombre de ticket non-attribué : <b>{{stats.nonAttrib}} ({{stats.pourTikNone}}%)</b></p>

        <table>
                <tr>
                    <td></td>
                    <td>Nombre de ticket selon le type de problème</td>
                </tr>
                <tr>
                    <td>Problème logiciel</td>
                    <td>{{stats.ttxTPBLogiciel}}</td>
                </tr>
                <tr>
                    <td>Problème Matériel</td>
                    <td>{{stats.ttxTPBMateriel}}</td>
                </tr>
                <tr>
                    <td>Problème utilisateur</td>
                    <td>{{stats.ttxTPBUser}}</td>
                </tr>
        </table>
    </div> 

</div>



    </div>
</template>

<script>

export default {

     
    name: "Bonjour",
    props:{
        user:{
         type: Object

        },
        stats: Array,
        ticket_list: Array,
        tpb_list: Array,
        ticket_all: Array,
        specs_list: Array,
        inter_list: Array,
        myTicket_list: Array
    },

    data(){
        return{
            form: this.$inertia.form({

               type_prob: null,
                prec_prob:"",
                desc_prob:"",
                poste_prob:"",
                pj:"",
                etat_prob:null,
                specialiste: ""
            })
        }
    }
}
</script>
