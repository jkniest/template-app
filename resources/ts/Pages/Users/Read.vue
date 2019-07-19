<template>
    <base-layout title="User Details">
        <h1 class="text-3xl mb-5">User <strong v-text="user.name"/></h1>
        <inertia-link class="p-3 bg-blue-300 rounded hover:bg-blue-500 text-blue-900 hover:text-blue-100"
                      :href="`/`">
            Go back
        </inertia-link>
    </base-layout>
</template>

<script lang="ts">
import Vue from 'vue';
import Component from 'vue-class-component';
import {Prop} from 'vue-property-decorator';
import BaseLayout from '../../Layouts/BaseLayout.vue';

@Component({
    components: {BaseLayout},
})
export default class Read extends Vue {
    @Prop()
    private user!: any;
}
</script>
