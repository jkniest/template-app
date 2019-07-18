<template>
    <base-layout title="Overview">
        <h1>Hello World!</h1>
        <br><br>
        <inertia-link :href="`/users/${user.uuid}`">Details</inertia-link>
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