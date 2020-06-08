<template>

        <input type="text"
                v-model="inputValue"
               class="flex flex-1 focus:outline-none px-4 py-1 "
               name="search" id="search" placeholder="search for friends" required>

</template>

<script>

    export default {
        data: () => ({
            inputValue: "",
        }),
        created () {
            this.inputValue = window.localStorage.getItem('inputval')
        },

        watch: {
            inputValue: function() {

                window.localStorage.setItem('inputval', this.inputValue);


            }
        },

        methods: {
            openStorage () {
                return localStorage.getItem('inputValue')
            },
            saveStorage (inputValue) {
                localStorage.setItem('inputValue',inputValue)
            },
        }
    }
</script>
