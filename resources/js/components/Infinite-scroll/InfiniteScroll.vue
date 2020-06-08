<template>
    <div>

            <slot></slot>


        <div v-if="items.length" v-observe-visibility="handleScrolledBottom" />
    </div>
</template>


<script>
    export default {
        name: "infite-scroll",
        props: {
          items: {type: Array, required: true},
        },
        data: () => ({
            page: 1,
        }),
        methods: {
            handleScrolledBottom(isVisible) {
                if(!isVisible) {return;}
                this.page++
                this.$emit('fetch', this.page)
            },
        }
    }
</script>
