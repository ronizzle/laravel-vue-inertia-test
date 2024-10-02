<script setup>
defineProps({
    post: Object
})
</script>
<template>
    <div>
        <div>
            <div>
                <h2>Post Details</h2>
            </div>
            <div>
                <h4><strong>Title: {{post.title}}</strong></h4>
            </div>
            <div>
                <p>Body: {{post.body}}</p>
            </div>
            <div>
                <h2>Author details</h2>
            </div>
            <div>
                <p>Username: {{post.user.username}}</p>
            </div>
            <div>
                <p>Name: {{post.user.name}}</p>
            </div>
            <div>
                <p>Email: {{post.user.email}}</p>
            </div>
            <div>
                <p>Phone: {{post.user.phone}}</p>
            </div>
            <div>
                <p>Website: {{post.user.website}}</p>
            </div>
            <div>
                <p>Company Name: {{post.user.company_name}}</p>
            </div>
            <div>
                <p>Catch Phrase: {{post.user.company_catch_phrase}}</p>
            </div>
            <div>
                <p>BS: {{post.user.company_bs}}</p>
            </div>
            <div>
                <p>Address: {{post.user.address_street}} {{post.user.address_suite}} {{post.user.address_city}} {{post.user.address_zipcode}} </p>
            </div>
            <div>
                <p>Coordinates: {{post.user.address_geo_lat}}, {{post.user.address_geo_lng}}</p>
            </div>
        </div>
    </div>
</template>
