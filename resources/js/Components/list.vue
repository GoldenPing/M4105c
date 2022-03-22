<template>
    <div class="list">
        <h1>{{title}}</h1>
        <ul>
            <li v-for='element in items' :key="element">
                {{element}}
            </li>
        </ul>
    </div>
</template>

<script>

export default {
    name:"List",
    props: {
        title: {
            type: String,
            required: true
        }
    },
    data(){
        return {
            items:[
                "Elements 1",
                "Elements 2",
                "Elements 3"
            ]

        }
    }
}

</script>

<style scoped>
.list{
    background-color: crimson;
    border-color: cyan;
    padding: 1rem;
    margin-top: 1rem;
}
</style>
