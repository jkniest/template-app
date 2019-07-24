<template>
    <base-layout title="Overview">
        <h1 class="text-3xl">Index page</h1>
        <p class="mb-5">Please the button below to find details about our first user:</p>
        <inertia-link class="p-3 bg-blue-300 rounded hover:bg-blue-500 text-blue-900 hover:text-blue-100"
                      :href="`/users/${user.uuid}`">
            Details
        </inertia-link>
    </base-layout>
</template>

<script lang="ts">
import Vue from 'vue';
import {Component, Prop} from 'vue-property-decorator';
import BaseLayout from '../Layouts/BaseLayout.vue';
@Component({
    components: {BaseLayout},
})
export default class Index extends Vue {
    @Prop()
    private user!: any;
}
</script>
