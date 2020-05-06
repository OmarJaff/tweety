<template>
    <div>
        <div v-for="(tweet,index) in tweets" :key="tweet.id" class="flex p-4  border-b border-gray-300">
            <div class="mr-2  flex-shrink-0">
                <a :href="'/profiles/'+tweet.user.username">
                    <img :src="tweet.user.avatar"
                         alt=""
                         class="rounded-full mr-2 w-12 h-12" />
                </a>
            </div>

            <div class="space-y-2">
                <a :href="'/profiles/'+tweet.user.username"><h5 class="font-bold ">
                    {{tweet.user.name}}
                </h5>
                </a>
                <p class="text-sm ">{{tweet.body}}</p>

                <div class="flex space-x-3">

                    <like-buttons :likesNumber="tweet.likes"
                                  @getTweets="getTweets()"
                                  @like="like"
                                  :tweetID="tweet.id"
                     >

                    </like-buttons>

                    <dislike-buttons @getTweets="getTweets()" :dislikesNumber="tweet.dislikes" @dislike="dislike" :tweetID="tweet.id">

                    </dislike-buttons>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'tweets',
        props: {
            'tweets': {type: Array, required: true},
        },

        methods: {
            getTweets() {
                this.$emit('getTweets')
            },
            like(tweetID) {
                 this.$emit('like', tweetID)
            },
            dislike(tweetID) {
                this.$emit('dislike' , tweetID)
            },
        }

    }
</script>
