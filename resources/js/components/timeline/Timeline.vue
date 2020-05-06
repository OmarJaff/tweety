<template>
    <div  class="border border-gray-300 rounded-lg">
        <div v-if="tweets.data" >
            <tweets @getTweets="getTweets()"
                    @like="like"
                    @dislike="dislike"
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
            user: {default: ()=>{}}
        },
         created() {
            this.getTweets()
         },
        computed: {

        },
         methods: {
            getTweets() {
                        if(this.user) {
                          return axios.get(`/profiles/${this.user.username}`).then((response) => {
                              this.tweets = response.data.tweets
                          }).catch(error=>console.log(error))
                        }
                  return   axios.get('/tweets').then((response) => {
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
                  axios.post(`/tweets/${tweetID}/like`).then(
                     () => {
                         this.getTweets()
                      }
                 ).catch(error=>console.log(error));
             },


         }
    }
</script>
