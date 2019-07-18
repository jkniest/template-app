<template>
    <base-layout title="User Details">
        <div>User <strong v-text="user.name"/></div>
        <br><br>
        <inertia-link href="/">Go back</inertia-link>
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