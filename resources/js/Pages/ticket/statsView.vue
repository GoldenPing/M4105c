<template>
    <div>
        <h1>Statistique</h1>

        <p>Nombre total de ticket : <b>{{stats.ttxTik}}</b></p>
        <p>Nombre de ticket non-attribué : <b>{{stats.nonAttrib}} ({{stats.pourTikNone}}%)</b></p>

        <table border="1">
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
</template>

<script>
    export default {
  props: {
      stats: Array,
  },
    }
</script>
