<template>
    <div>
        <div v-for="(tweet,index) in tweets" :key="tweet.id"
             class="flex p-4 border border-gray-300 rounded-lg my-4 relative">
            <div class="mr-2  flex-shrink-0">
                <a :href="'/profiles/'+tweet.user.username">
                    <img :src="tweet.user.avatar"
                         alt=""
                         class="rounded-full mr-2 w-12 h-12"/>
                </a>
            </div>

            <div class="space-y-2 w-full ">
                <a :href="'/profiles/'+tweet.user.username">
                    <h5 class="font-bold ">
                    {{tweet.user.name}}
                        <p class="text-xs text-gray-500">{{tweet.created_at | diffForHumans}}</p>
                </h5>
                </a>

                <p class="text-lg ">{{tweet.body}}</p>

                <div v-if="isEditing && tweet.id === tweetID"
                     class="absolute bg-white rounded-lg w-full inset-0 z-10">
                    <form @submit.prevent="submitUpdateRequest(tweet.id)">
                        <div class="mx-8 my-2">
                                <textarea name="body" v-autofocus  v-model="tweetBody"
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


                <div v-if="userId === tweet.user_id">
                    <edit-modal
                        :tweetId="tweet.id"
                        :tweetBody="tweet.body"
                        @deleteTweet="handleTweetRemove"
                        @updateTweet="showEditingForm"
                    >
                    </edit-modal>
                </div>

                <div class="flex space-x-4">
                    <like-button :likesNumber="tweet.likes_number_count"
                                 @getTweets="refresh()"
                                 :dislikesNumber="tweet.dislikes_count"
                                 @like="like"
                                 @dislike="dislike"
                                 :tweetID="tweet.id"
                                 :userLikes="tweet.likes"
                                 :userId="userId"
                    >
                    </like-button>

                    <replay @replyAdded="refresh()"
                            :tweet="tweet.body"
                            :userName="tweet.user.username"
                            :repliesCount = "tweet.replies_count"
                            :tweetID="tweet.id">
                    </replay>


                </div>
                <div v-if="Object.keys(tweet.replies).length !== 0" class="pt-4">
                    <a class="text-blue-500  font-medium pt-3" :href="'/tweets/'+tweet.id">view replies</a></div>
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
        name: 'tweets',
        props: {
            tweets: {required: true},
            userId: {required: true},
        },
        data: () => ({
            submissionModalShowed: false,
            isEditing: false,
            tweetID: '',
            editModel: false,
            tweetBody: '',
        }),
        filters: {
            diffForHumans: (date) => {
                if (!date) {
                    return null;
                }
                return dayjs(date).fromNow();
            }
        },
        methods: {

            refresh() {
                this.$emit('refresh')
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
                    this.refresh()
                }).catch(error => console.error(error));

            },
            infiniteHandler($state) {
                this.$emit('infiniteHandler', $state)
            },
            submitUpdateRequest(tweetID) {
                this.isEditing = false
              axios.patch(`/tweets/${tweetID}/update`, {body: this.tweetBody}).then(()=>{
                  this.refresh()
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
                    ()=>this.refresh()
                ).catch(error=>console.error());
            }
        }
    }
</script>
