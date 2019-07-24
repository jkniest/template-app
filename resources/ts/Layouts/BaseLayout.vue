<template>
    <main>
        <header class="bg-blue-200 h-14 text-blue-900 flex mb-8">
            <strong class="p-4">Template application</strong>
            <a class="ml-auto p-4 bg-blue-400 text-blue-100 hover:bg-blue-500"
               href="https://github.com/jkniest/template-app"
               target="_blank"
            >
                Find on github
            </a>
        </header>

        <section class="px-4">
            <slot/>
        </section>
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
