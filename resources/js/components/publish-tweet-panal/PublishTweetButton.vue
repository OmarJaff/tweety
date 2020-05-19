<template>
    <div :aria-disabled="!isEnabled">
        <button :disabled="!isEnabled" @click="submitMutaion()" type="submit"
                :class="!isEnabled ? 'cursor-not-allowed' : ''"
                class=" bg-blue-500 hover:bg-blue-600 shadow px-2 py-2 rounded-full text-white disabled:bg-blue-300 focus:outline-none">
            Tweet-a-roo!
        </button>
    </div>
</template>


<script>



    export default {
        data: () => ({

        }),

        created() {


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
