<template>
    <div>
        <button @click="openModel = true" class="absolute flex inset-0 left-auto h-0 focus:outline-none my-3 mx-2">
            <svg class="text-gray-600 w-6 hover:text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 5L12 5.01M12 12L12 12.01M12 19L12 19.01M12 6C11.4477 6 11 5.55228 11 5C11 4.44772 11.4477 4 12 4C12.5523 4 13 4.44772 13 5C13 5.55228 12.5523 6 12 6ZM12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12C13 12.5523 12.5523 13 12 13ZM12 20C11.4477 20 11 19.5523 11 19C11 18.4477 11.4477 18 12 18C12.5523 18 13 18.4477 13 19C13 19.5523 12.5523 20 12 20Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
            <div v-if="openModel === true">
                <button
                    @click="openModel = false"
                    class="fixed w-full h-full inset-0 opacity-0 cursor-default
                    focus:outline-none z-50 bg-red-200">
                </button>
                <tweet-editor-model @deleteTweet="deleteTweet" @updateTweet="updateTweet" :tweetId="tweetId">

                </tweet-editor-model>
            </div>
            </div>

</template>


<script>

    export default {
        name: 'edit-modal',
        props: {
            tweetId: {required:true},
            tweetBody: {  required: true}
        },
        data: () => ({
            openModel: false
         }),


        methods: {
            deleteTweet(id) {
                this.$emit('deleteTweet' , id)
            },
            updateTweet(id) {
                this.openModel=false
              this.$emit('updateTweet', id, this.tweetBody)
            }
        }
    }

</script>
