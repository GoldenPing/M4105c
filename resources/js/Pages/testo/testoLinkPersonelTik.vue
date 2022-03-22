<template>
<div>
    <h1>Ticket en fonction des billy</h1>

    <ul> 
        <li  v-for="items in tickets" :key="items.id"> {{items.desc_tik}}   </li>
        
    </ul>
</div>
</template>


<script>
export default {
    name: "Bonjour"
}
</script>