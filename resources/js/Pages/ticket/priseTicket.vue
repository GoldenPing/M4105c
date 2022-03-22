<template>
    <div>
        <h1>Ticket numéro : {{ticket.id_tik}}</h1>
        <label for="emetteur">
            Émetteur :
            {{emet.login_pers}}
        </label>    
        <label for="type_prob">
            Type de problème :
            {{ticket.id_tpb}}            
        </label>
        <label for="urgence">
            Niveau d'urgence :
            {{ticket.etat_tik}}
        </label>
        <br>
        <label for="date_open">
            Date d'ouverture du Ticket :
            {{ticket.date_tik}}
        </label>
        <label for="prec_prob">
            Précision du problème :
            {{ticket.precision_tik}}            
        </label>
        <br>
        <div v-if="ticket.path_tik != null">
        <Link :href="$route('ShowPJ',{path:ticket.path_tik})">
        <button>Accéder a la PJ </button>
        </Link>
        <br>
        </div>
        <div>
            <h3>Description du problème</h3>
            <p>{{ticket.desc_tik}}</p>
        </div>
        <div v-if="inter != null">
        Liste des interventions : 
        <table border="1">
            <thead>
                <th>Date de l'intervention :</th>
                <th>Type d'intervention :</th>
                <th>Opérateur :</th>
                <th>Voir les commentaires</th>
            </thead>
            <tr>
               <td>{{inter.date_inter}}</td>
               <td>{{inter.type_inter}}</td>
               <td>{{spec.login_spec}}</td>
               <td>
               <Link :href="$route('commentaireShow',{id:inter.id_inter})">
               <button>Accéder aux commentaires</button>
               </Link>    
               </td> 
            </tr>
        </table>
        </div>
        <Link :href="$route('AddInter')" v-else>
            <button>Ajouter une Intervention</button>
            <br>
        </Link>
            
        <Link>
        <button>Problème Résolu</button>
        </Link>
        <Link :href="$route('oneTicket',{id:ticket.id_tik})">
        <button>Fermer le ticket</button>
        </Link>

    </div>
</template>
<script>
export default {
    props:{
        ticket: Object,
        inter : Object,
        spec : Object,
        emet : Object,
    },
    mounted(){
        console.log(this.ticket)
    }
}

</script>