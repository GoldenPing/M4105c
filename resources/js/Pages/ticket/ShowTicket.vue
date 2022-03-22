<template>
  <div>
    <h1>Liste des tickets</h1>
    <table border="1">
      <thead>
        <th>Emeteur</th>
        <th>Date Ticket</th>
        <th>Type problème</th>
        <th>Précision problème</th>
        <th>Niveau d'urgence</th>
        <th>N°poste</th>
        <th>Description</th>
      </thead>

      <tr v-for="item in tickets" :key="item.id_tik">
        <td>{{ item.personnel.login_pers }}</td>
        <td>{{ item.date_tik }}</td>
        <td>{{ item.id_tpb }}</td>
        <td>{{ item.precision_tik }}</td>
        <td>{{ item.etat_tik }}</td>
        <td>{{ item.poste_tik }}</td>
        <td>{{ item.desc_tik }}</td>
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
                  v-for="item in specs"
                  :key="item.id"
                  :value="item.id_spec">
                  {{ item.login_spec }}
                </option>
              </select>
              <div>
                <input type="submit" value="Valider">
              </div>
            </form>
          </div>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  props: {
      tickets:Array,
      specs:Array,
  },
  name: "addTicket",
  data() {
    return {
      form: this.$inertia.form({
        specialiste: null,
      }),
    };
  },
};
</script>