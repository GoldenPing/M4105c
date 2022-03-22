<template>
    <div>
        <h1>Starto !</h1>
        <Link :href="$route('login')">Index</Link>

<div>
        <nav>
            <ul>
            <li>
                <Link :href="$route('AddTicketForm')">Ajouter un ticket</Link>
            </li>
            <li>
                <Link :href="$route('displayFormTicket')">Envoyer un Ticket</Link>
            </li>
            <li>
                <Link :href="$route('ticketList')">Liste des tickets</Link>
            </li>
            <li>
                <Link :href="$route('oneTicket',{ id:1 })">Un ticket</Link>
            </li>
            </ul>
        </nav>
</div>
    </div>
</template>

<script>
export default {
    name: "Bonjour"
}
</script>
