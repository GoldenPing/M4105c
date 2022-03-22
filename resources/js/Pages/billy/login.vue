<template>
    <div>
        <h1>Se connecter</h1>

        <form @submit.prevent="form.post($route('loginBilly'))">
<div class="champ">
    <label for="login">Login</label>
    <input type="text" v-model="form.name" id="login">
     <b v-if="form.errors.name" class="text-danger">{{form.errors.name}}</b>
</div>

<div class="champ">
    <label for="password">Mot de Passe</label>
    <input type="password" v-model="form.password" id="email">
      <b v-if="form.errors.password" class="text-danger">{{form.errors.password}}</b>
</div>


<div class="button">
    <input type="submit" value="connexion">
    <div v-if="form.processing">En cours ...</div>
</div>

        </form>
    </div>
</template>

<script>

export default ({
    name:"Login",
    data() {
        return{
        form: this.$inertia.form({
            name: "",
            password: ""
            })   
        }
    }
})
</script>
