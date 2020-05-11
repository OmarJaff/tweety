<template>
    <div class="flex items-center w-full">
        <button @click="openReplyModel()">
            <div class="flex space-x-1 justify-center">
                <svg class="text-gray-600 w-5" width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M18 5V13C18 14.1046 17.1046 15 16 15H11L6 19V15H4C2.89543 15 2 14.1046 2 13V5C2 3.89543 2.89543 3 4 3H16C17.1046 3 18 3.89543 18 5ZM7 8H5V10H7V8ZM9 8H11V10H9V8ZM15 8H13V10H15V8Z"
                          fill="currentColor"/>
                </svg>
                <h1 class="text-sm text-gray-600 font-medium">Reply</h1></div>
        </button>


        <div v-if="replayModalShowed === true">
            <modal @close="handleModelClose()">
                <div class="p-1 w-full text-gray-600">
                   <h1 class="text-lg">{{tweet}}</h1>
                    <h1 class="text-sm text-gray-500">replaying to: {{userName}}</h1>
                </div>
                <div class="flex space-x-4  w-full mt-4">
                            <textarea placeholder="Type your replay" type="text" v-model="reply"
                                      class=" placeholder-gray-500 p-3 border-2 border-blue-300 focus:outline-none rounded-md w-full"></textarea>

                </div>
                <template slot="footer">

                    <div class="flex space-x-4 mx-5 px-1">
                        <button @click="addReply" class="focus:outline-none outline-none
                        border-2 rounded-full
                        py-2 px-4 text-lg bg-blue-500 text-white   font-bold">add replay
                        </button>
                        <button @click="handleModelClose()"
                                class="focus:outline-none outline-none text-gray-600 btn-link text-lg  font-bold  hover:text-blue-600">
                            Cancel
                        </button>
                    </div>

                </template>
            </modal>
        </div>
    </div>
</template>


<script>


    export default {
        props: {
            tweetID: {required: true},
            replayID: {},
            userID: {},
            userName: {},
            tweet: {},
        },
        data: () => ({
            reply: '',
            replayModalShowed: false
        }),
        methods: {
            addReply(id) {
                axios.post(`/replies/${this.tweetID}`, {body: this.reply}).then(
                    this.$emit('replyAdded'),
                    this.replayModalShowed = false,
                    this.reply='',
                    enableBodyScroll(targetElement)
                ).catch(error => console.error(error))
            },
            deleteReplay(id) {
                axios.delete(`/replies/${this.addReply()}`).then(
                    this.$emit('replyAdded')
                ).catch(error => console.error(error))
            },
            openReplyModel() {
                this.replayModalShowed = true;
                disableBodyScroll(targetElement);
            },
            handleModelClose() {

                this.replayModalShowed = false;
                enableBodyScroll(targetElement);
            }
        }
    }
</script>
