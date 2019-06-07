<template>
    <div>
        <transition name="fade">
            <div class="fixed top-0 right-0 left-0 lg:left-auto lg:mr-8 mt-8 p-4 shadow-lg lg:rounded text-center lg:text-left"
                 :class="type === 'success' ? 'bg-green-300' : 'bg-red-400'"
                 v-text="message"
                 v-if="visible"/>
        </transition>
    </div>
</template>

<script>
export default {
    props: {
        message: {required: true},
        type: {required: true}
    },

    data: () => ({
        visible: true,
    }),

    created() {
        setTimeout(() => {
            this.visible = false;
        }, 5000);
    }
};
</script>
