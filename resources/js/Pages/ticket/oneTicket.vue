<template>
    <div>
        <div>
        <h1>Ticket n° {{tickets.id_tik}} </h1>
        <table border="1">
            <thead>
                <th>Emeteur</th>
                <th>Date Ticket</th>
                <th>Type problème</th>
                <th>Précision problème</th>
                <th>Niveau d'urgence</th>
                <th>N°poste</th>
                <th class="desc">Description</th>
                
            </thead>
            <tr>
                <td>{{ tickets.personnel.login_pers }}</td>
                <td>{{ tickets.date_tik }}</td>
                <td>{{ tickets.type_probleme.libelle_tpb }}</td>
                <td>{{ tickets.precision_tik }}</td>
                <td>{{ tickets.etat_tik }}</td>
                <td>{{ tickets.poste_tik }}</td>
                <td class="desc">{{ tickets.desc_tik }}</td>
               
            </tr>
        </table>


        <Link :href="$route('ShowPJ',{path:tickets.path_tik})" v-if="tickets.path_tik != null">
        <button>Accéder à la Pièce Jointe </button>
        </Link>

        
        <Link :href="$route('testo')">
        <button>Retour Accueil</button>
        </Link>
        </div>

        <div>
            <table border="1">
            <thead>
                <th>Date Ticket</th>
                <th>Type problème</th>
                <th>Précision problème</th>
                <th>Niveau d'urgence</th>
                <th class="desc">Description</th>
                <th>Remis à :</th>
            </thead>
            <tr>
                <td>{{ tickets.date_tik }}</td>
                <td>{{ tickets.type_probleme.libelle_tpb }}</td>
                <td>{{ tickets.precision_tik }}</td>
                <td>{{ tickets.etat_tik }}</td>
                <td class="desc">{{ tickets.desc_tik }}</td>
                <td>{{ spec.login_spec }}</td>
            </tr>
        </table>
        </div>

    </div>
</template>

<script>
export default {
    props:{
        tickets: Object,
        spec: Object,
        inter: Object,
        specs: Array
    },
    name:"addTicket",
    data(){
        return{
            form: this.$inertia.form({
                specialiste:null,
            })
        }
    }
}
</script>