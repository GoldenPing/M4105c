<template>
    <div>
        Login


        <form @submit.prevent="form.post($route('login'))">

<div>
            <label for="email">email</label>
            <input type="email" v-model="form.email" id="email">
            <b v-if="form.errors.email" class="text-danger">{{form.errors.email}}</b>
            </div>

<div>
            <label for="password">Mot de passe</label>
            <input type="password" v-model="form.password" id="password">
            <b v-if="form.errors.password" class="text-danger">{{form.errors.password}}</b>
            
            </div> 

           <div> <input type="submit" value="Login">
           
           </div>
            
        </form>
    </div>
</template>

<script>
export default {
    name:"Login",
    data(){
        return{
            form: this.$inertia.form({
                email: "",
                password: ""
            })
        }
    }
}
</script>