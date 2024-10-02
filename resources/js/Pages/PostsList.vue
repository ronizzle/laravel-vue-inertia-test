<script setup>
import {router} from '@inertiajs/vue3';
defineProps({
    posts: Array
})

const deletePostById = (postId) => {
    router.delete(`/posts/${postId}`)
}
const handleDeleteButtonClicked = (postId) => {
    deletePostById(postId)
}
</script>
<template>
    <div>
        <div>
            <h1>Posts</h1>
        </div>
        <div>
            <table>
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Username</td>
                    <td></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="post in posts">
                    <td>
                        <span>{{post.id}}</span>
                    </td>
                    <td>
                        <span>{{post.title}}</span>
                    </td>
                    <td>
                        <span>{{post.user.username}}</span>
                    </td>
                    <td>
                        <a :href="'/posts/' + post.id">View</a>
                    </td>
                    <td>
                        <button v-on:click="handleDeleteButtonClicked(post.id)">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
