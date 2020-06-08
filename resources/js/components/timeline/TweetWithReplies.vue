<template>
    <div>



        <div
             class="flex flex-col p-8 border border-gray-300 rounded-lg my-4 relative">

            <div class="border-2 p-4 rounded-lg w-full flex relative">
             <div class="mr-2  flex-shrink-0">

                <a :href="'/profiles/'+user.username">
                    <img :src="user.avatar"
                         alt=""
                         class="rounded-full mr-2 w-12 h-12"/>
                </a>
            </div>

            <div class="space-y-2 w-full ">

                    <a :href="'/profiles/'+user.username">
                    <h5 class="font-bold ">
                        {{user.name}}
                        <p class="text-xs text-gray-500">{{tweet.created_at | diffForHumans}}</p>

                    </h5>
                </a>
                    <p class="text-lg pb-4 text-xl">{{tweet.body}}</p>


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
                                class="rounded-full bg-blue-400 text-white px-3 py-1 font-bold text-sm focus:outline-none hover:bg-blue-600 ">
                                Update Tweet
                            </button>
                            <button @click="isEditing = false">Cancel</button>
                        </div>
                    </form>
                </div>


                <div v-if="currentUser === user.id">
                    <edit-modal
                        :tweetId="tweet.id"
                        :tweetBody="tweet.body"
                        @deleteTweet="handleTweetRemove"
                        @updateTweet="showEditingForm"
                    >
                    </edit-modal>
                </div>

                <div class="flex space-x-4">
                    <like-button :likesNumber="likes_count"
                                 @getTweets="getData()"
                                 :dislikesNumber="dislikes_count"
                                 @like="like"
                                 @dislike="dislike"
                                 :tweetID="tweet.id"
                                 :userLikes="userLikes"
                                 :userId="user.id"
                    >
                    </like-button>

                    <replay @replyAdded="getData()" :tweet="tweet.body"
                            :userName="user.username"
                            :repliesCount = "totalOfReplies"
                            :tweetID="tweet.id"></replay>

                </div>
                </div>
            </div>

            <div class="ml-6 p-4 border-2 border-gray-300 rounded-lg  space-y-2 my-4" v-for="(reply,index) in replies" :key="reply.id">
                <div class="flex flex-col w-full">
                    <div class="mr-2   flex space-x-1">
                        <a class="flex-shrink-0" :href="'/profiles/'+reply.user.username">
                            <img :src="reply.user.avatar"
                                 alt=""
                                 class="rounded-full mr-2 w-8 h-8"/>
                        </a>
                        <div class="flex-col"><a :href="'/profiles/'+reply.user.username"><h5 class="font-bold ">
                            {{reply.user.name}}
                            <p class="text-xs text-gray-500">{{reply.created_at | diffForHumans}}</p>
                        </h5>
                        </a>
                            <h1 class="text-gray-700 font-semibold py-2 sm:text-lg">{{reply.body}}</h1></div>
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
            tweetId: {},
            userLikes: {},
            currentUser: {}
        },
        filters: {
            diffForHumans: (date) => {
                if (!date) {
                    return null;
                }
                return dayjs(date).fromNow();
            }
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
            tweetLikes: {},
            totalOfReplies:{},
            likes_count: 0,
            dislikes_count: 0
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
                        this.replies = response.data.replies.data,
                            this.totalOfReplies = response.data.replyNumber,
                            this.likes_count = response.data.likes_count,
                            this.dislikes_count=response.data.dislikes_count
                    }
                ).catch(error => console.error(error))
            },
            like(tweetID) {
                axios.post(`/tweets/${tweetID}/like`).then(
                    () => {
                        this.getData()
                    }
                ).catch(error => console.log(error));
            },
            dislike(tweetID) {
                axios.delete(`/tweets/${tweetID}/like`).then(
                    (response) => {
                        this.getData()
                    }
                )
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
