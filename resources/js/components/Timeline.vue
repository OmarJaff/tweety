<template>
    <div  class="border border-gray-300 rounded-lg">
        <div v-if="tweets.data" >
            <tweets @getTweets="getTweets()"
                    @like="like"
                    @dislike="dislike"
                    :currentUser="currentUser"
                    :tweets="tweets.data"

            ></tweets>
        </div>

        <p v-else class="p-4">No tweets yet!</p>

        <span>pagination scroll</span>
    </div>
</template>

<script>
    export default {
        name: 'timeline',

        data: () => ({
            tweets: {},
            liked: '',
            disliked: ''
        }),
        props: {
            currentUser: {required:true}
        },
         created() {
            this.getTweets()
         },
        computed: {

        },
         methods: {
            getTweets() {
                    axios.get('/tweets').then((response) => {
                       this.tweets = response.data.tweets;
                    }).catch(error=>console.log(error))
             },

             dislike(tweetID) {
                 axios.delete(`/tweets/${tweetID}/like`).then(
                     (response) => {
                         this.getTweets()
                      }
                 )
             },

             like(tweetID) {
                 const vm = this;
                 axios.post(`/tweets/${tweetID}/like`).then(
                     () => {
                         this.getTweets()
                      }
                 ).catch(error=>console.log(error));
             },


         }
    }
</script>
