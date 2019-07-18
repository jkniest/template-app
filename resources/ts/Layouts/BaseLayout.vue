<template>
    <main>
        <slot/>
    </main>
</template>

<script lang="ts">
import Vue from 'vue';
import Component from 'vue-class-component';
import {Prop, Watch} from 'vue-property-decorator';

@Component
export default class BaseLayout extends Vue {
    @Prop({default: null})
    private title!: string | null;

    @Watch('title', {immediate: true})
    private onTitleChanged(): void {
        document.title = this.title ? this.title : 'ABC';
    }
}
</script>