<template>
    <div class="absolute inset-0 left-auto z-50 ">
        <div
            class="rounded border-2 border-gray-200
                bg-gray-100 absolute transition -translate-x-32
                my-3 w-24 h-20 rounded-lg flex flex-col px-2 justify-center space-y-2  mx-1">

            <button @click="updateTweet(tweetId)" class="flex items-center space-x-1 btn-link focus:outline-none">
                <svg class="text-gray-500 w-4 hover:text-blue-500" width="20" height="20" viewBox="0 0 20 20" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">

                    <path
                        d="M17.4142 2.58579C16.6332 1.80474 15.3668 1.80474 14.5858 2.58579L7 10.1716V13H9.82842L17.4142 5.41421C18.1953 4.63316 18.1953 3.36683 17.4142 2.58579Z"
                        fill="currentColor"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M2 6C2 4.89543 2.89543 4 4 4H8C8.55228 4 9 4.44772 9 5C9 5.55228 8.55228 6 8 6H4V16H14V12C14 11.4477 14.4477 11 15 11C15.5523 11 16 11.4477 16 12V16C16 17.1046 15.1046 18 14 18H4C2.89543 18 2 17.1046 2 16V6Z"
                          fill="currentColor"/>
                </svg>
                <p class="text-gray-700 text-sm hover:text-blue-700">Edit</p>
            </button>

            <button @click="deleteTweet(tweetId)" class="flex items-center space-x-1 btn-link focus:outline-none hover:text-blue-500">
                <svg class="text-gray-500 w-4 " width="20" height="20" viewBox="0 0 20 20" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">

                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z"
                          fill="currentColor"/>
                </svg>
                <p class="text-gray-700 text-sm ">Remove</p>
            </button>

        </div>
    </div>

</template>

<script>
    export default {
        props: {
            tweetId: {required:true}
        },

        methods: {
            deleteTweet(id) {

                this.$emit('deleteTweet', id)
            },
            updateTweet(id) {
                this.$emit('updateTweet', id)
            }
        }

    }
</script>


