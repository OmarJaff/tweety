<template>
    <div>
        <div v-for="(tweet,index) in tweets" :key="tweet.id" class="flex p-4 border border-gray-300 rounded-lg my-4 relative">
            <div class="mr-2  flex-shrink-0">
                <a :href="'/profiles/'+tweet.user.username">
                    <img :src="tweet.user.avatar"
                         alt=""
                         class="rounded-full mr-2 w-12 h-12"/>
                </a>
            </div>

            <div class="space-y-2">
                <a :href="'/profiles/'+tweet.user.username"><h5 class="font-bold ">
                    {{tweet.user.name}}
                </h5>
                </a>

                    <p class="text-lg ">{{tweet.body}}</p>


                <div v-if="userId === tweet.user_id" >
                    <edit-modal></edit-modal>
                </div>
                <div class="flex space-x-4">
                    <like-button :likesNumber="tweet.likesNum"
                                 @getTweets="getTweets()"
                                 :dislikesNumber="tweet.dislikes"
                                 @like="like"
                                 @dislike="dislike"
                                 :tweetID="tweet.id"
                                 :userLikes="tweet.likes"
                                 :userId="userId"
                    >
                    </like-button>

                    <replay></replay>
                </div>
             </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'tweets',
        props: {
            tweets: {type: Array, required: true},
            userId: {required: true},
         },

        methods: {

            getTweets() {
                this.$emit('getTweets')
            },
            like(tweetID) {
                this.$emit('like', tweetID)
            },
            dislike(tweetID) {
                this.$emit('dislike', tweetID)
            },
        }

    }
</script>
