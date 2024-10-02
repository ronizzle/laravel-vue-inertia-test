<script setup>
import {router} from '@inertiajs/vue3';

defineProps({
    users: Array
})
const deleteUserById = (userId) => {
    router.delete(`/users/${userId}`)
}
const handleDeleteButtonClicked = (userId) => {
    deleteUserById(userId)
}
</script>
<template>
    <div>
        <div>
            <h1>Users</h1>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="user in users">
                    <td>
                        <span>{{user.id}}</span>
                    </td>
                    <td>
                        <span>{{user.username}}</span>
                    </td>
                    <td>
                        <span>{{user.email}}</span>
                    </td>
                    <td>
                        <button v-on:click="handleDeleteButtonClicked(user.id)">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
