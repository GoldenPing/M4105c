<template>
<div>
    <h1>Hello World</h1>
    <input v-model="title">    {{list}}
    <list v-if="list !== undefined" :title="title" :items="lists"></list>

</div>
</template>

<script>
import List from "../../Components/list.vue";

export default {

    name: "Index",
    components: {
        List
    },
    props:{
        lists:{
            type: Array,
        }
    },
    data(){
        return{
        }
    }
}
</script>