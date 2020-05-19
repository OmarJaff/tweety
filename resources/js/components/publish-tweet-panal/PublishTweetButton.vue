<template>
        <button :disabled="!isEnabled" @click="submitMutaion()" type="submit"
                :class="!isEnabled ? 'cursor-not-allowed' : ''"
                class=" bg-blue-500 hover:bg-blue-600 shadow px-2 py-2 rounded-full text-white disabled:bg-blue-300 focus:outline-none">
            Tweet-a-roo!
        </button>
</template>


<script>
    import  { mapState, mapMutations } from 'vuex';

    export default {
        data: () => ({

        }),
        created() {
            this.isEnabled;
            console.log(this.isEnabled);
        },
        computed: {
            isEnabled() {
                return this.$store.state.disabled
            }
        },
        methods: {
            submitMutaion() {
            console.log(this.isEnabled)
            }
        }
    }
</script>
