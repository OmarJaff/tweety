<template>
    <div>
        <div class="p-4 flex">
            <a href="/tweets" class="flex items-center space-x-2">
                <svg class="text-gray-600" width="20" height="20" viewBox="0 0 20 20" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M7.70711 14.7071C7.31658 15.0976 6.68342 15.0976 6.29289 14.7071L2.29289 10.7071C1.90237 10.3166 1.90237 9.68342 2.29289 9.29289L6.29289 5.29289C6.68342 4.90237 7.31658 4.90237 7.70711 5.29289C8.09763 5.68342 8.09763 6.31658 7.70711 6.70711L5.41421 9L17 9C17.5523 9 18 9.44771 18 10C18 10.5523 17.5523 11 17 11L5.41421 11L7.70711 13.2929C8.09763 13.6834 8.09763 14.3166 7.70711 14.7071Z"
                          fill="currentColor"/>
                </svg>
                <h1 class="text-gray-600">Back to tweets</h1></a>
        </div>

        <div
             class="flex p-8 border border-gray-300 rounded-lg my-4 relative">
            <div class="mr-2  flex-shrink-0">
                <a :href="'/profiles/'+user.username">
                    <img :src="user.avatar"
                         alt=""
                         class="rounded-full mr-2 w-12 h-12"/>
                </a>
            </div>

            <div class="space-y-2 w-full ">
                <a :href="'/profiles/'+user.username"><h5 class="font-bold ">
                    {{user.name}}
                </h5>
                </a>
                <p class="text-lg pb-4 ">{{tweet.body}}</p>

                <div v-if="isEditing"
                     class=" bg-white rounded-lg w-full inset-0 z-10">
                    <form @submit.prevent="submitUpdateRequest(tweet.id)">
                        <div class="mx-8 my-2">
                                <textarea name="body"  v-model="tweetBody"
                                          class="w-full border-b-2 focus:outline-none focus:border-blue-300"></textarea>
                        </div>
                        <div class="flex flex-row justify-end w-full space-x-4 -mx-8 my-3">
                            <button
                                type="submit"
                                class="rounded-full bg-blue-400 text-white px-3 py-1 font-bold text-sm focus:outline-none hover:bg-blue-600 fo">
                                Update Tweet
                            </button>
                            <button @click="isEditing = false">Cancel</button>
                        </div>
                    </form>
                </div>


                <div v-if="user.id === tweet.user_id">
                    <edit-modal
                        :tweetId="tweet.id"
                        :tweetBody="tweet.body"
                        @deleteTweet="handleTweetRemove"
                        @updateTweet="showEditingForm"
                    >
                    </edit-modal>
                </div>

                <div class="flex space-x-4 mb-6">
<!--                    <like-button :likesNumber="tweetLikes.likes"-->
<!--                                 @getTweets="getData()"-->
<!--                                 :dislikesNumber="tweet.dislikes"-->
<!--                                 @like="like"-->
<!--                                 @dislike="dislike"-->
<!--                                 :tweetID="tweet.id"-->
<!--                                 :userLikes="tweet.likes"-->
<!--                                 :userId=""-->
<!--                    >-->
<!--                    </like-button>-->



                </div>
                <div class="p-4 border-2 border-gray-300 rounded-lg  space-y-2 my-4" v-for="(reply,index) in replies" :key="reply.id">
                        <div class="flex flex-col w-full">
                            <div class="mr-2   flex space-x-1">
                                <a class="flex-shrink-0" :href="'/profiles/'+reply.user.username">
                                    <img :src="reply.user.avatar"
                                         alt=""
                                         class="rounded-full mr-2 w-8 h-8"/>
                                </a>
                                <div class="flex-col"><a :href="'/profiles/'+reply.user.username"><h5 class="font-bold ">
                                    {{reply.user.name}}
                                </h5>
                                </a>
                                    <h1 class="text-gray-700 font-semibold py-2">{{reply.body}}</h1></div>
                            </div>
                        </div>

                </div>
            </div>
        </div>

        <div v-if="submissionModalShowed === true">
            <modal @close="handleModelClose()">
                You are about to delete your tweet?
                <template slot="footer">
                    <div class="flex space-x-4 mx-4">
                        <button
                            @click="submitRemoveRequest()"
                            class="  focus:outline-none outline-none text-gray-600 border-2
                            border-gray-400 rounded-full py-2 px-4
                            text-lg hover:bg-gray-300 hover:text-gray-800
                              font-bold">
                            Sure, delete it
                        </button>
                        <button @click="handleModelClose()"
                                class="focus:outline-none outline-none
                                text-gray-600 btn-link text-lg
                                font-bold  hover:text-blue-600">
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
        name: 'tweet-with-replies',
        props: {
            tweetId: {}
        },
        data: () => ({
            submissionModalShowed: false,
            isEditing: false,
            tweetID: '',
            tweetBody: '',
            editModel: false,
            tweet: {},
            user: {},
             replies: {},
            tweetLikes: {}
        }),
        created() {
          this.getData();
        },
        methods: {
            getData() {
                axios.get(`${this.tweetId}`).then(
                    response => {
                        this.tweet = response.data.tweet,
                            this.user = response.data.user,
                        this.replies = response.data.replies.data
                    }
                ).catch(error => console.error(error))
            },
            like(tweetID) {
                this.$emit('like', tweetID)
            },
            dislike(tweetID) {
                this.$emit('dislike', tweetID)
            },
            handleModelClose() {
                enableBodyScroll(targetElement)
                this.submissionModalShowed = false
                this.editModel = false
            },
            handleTweetRemove(tweetID) {
                this.submissionModalShowed = true
                disableBodyScroll(targetElement)
                this.tweetID = tweetID
            },

            submitRemoveRequest() {
                this.submissionModalShowed = false
                this.editModel = false
                enableBodyScroll(targetElement)
                axios.delete(`/tweets/${this.tweetID}/delete`).then(() => {
                    window.location.replace("/tweets");
                }).catch(error => console.error(error));

            },

            submitUpdateRequest(tweetID) {
                this.isEditing = false
                axios.patch(`/tweets/${tweetID}/update`, {body: this.tweetBody}).then(()=>{
                    this.getData();
                }).catch(error =>console.error(error))
            },

            showEditingForm(tweetID,tweetBody) {
                this.tweetID = tweetID
                this.tweetBody = tweetBody
                this.isEditing = true
                this.editModel = false
            },

            deleteReplay(id) {
                axios.delete(`replies/${id}`).then(
                    ()=>this.getTweets()
                ).catch(error=>console.error());
            }

        }

    }
</script>
