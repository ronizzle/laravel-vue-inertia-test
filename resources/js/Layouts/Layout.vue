<template>
    <div>
        <header>
            <nav>
                <div>
                    <a href="/users">
                        <strong>Users</strong>
                    </a>
                    <span>|||</span>
                    <a href="/posts">
                        <strong>Posts</strong>
                    </a>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot />
        </main>
    </div>
</template>
<script setup lang="ts">
</script>
