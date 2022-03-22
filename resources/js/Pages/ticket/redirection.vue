<template>
    <div>
        {{ticket}}
        {{inter}}
        {{spec}}
    </div>
</template>

<script>
export default {
    props:{
        ticket: Object,
        spec: Object,
        inter: Object,
    }
}
</script>

