<template>
    <div class="w-full">
        <textarea
        required
        name="body"
        id="body"
        cols="30"
        autofocus
        v-model="myTweet"
        maxlength="202"
        class="w-full py-4  focus:outline-none"
        placeholder="what's up?">
        </textarea>
        <span class="text-gray-600 w-full flex justify-end">{{charNum}}/202</span>

        <vue-countable :text="myTweet"   :elementId="'body'" @change="change">

        </vue-countable>
    </div>
</template>


<script>
    import  {mapMutations} from 'vuex';

    export default {
        name: 'textarea-tweet',
        data: ()=>({
            myTweet:"",
            myId:"body",
            charNum: 0,
        }),

        computed:mapMutations(['disabled']),
        methods: {
            change(event) {
            this.charNum = event.all;
                let bool = this.charNum > 0
            this.$store.commit('enableTweetButton', bool )
             }
        }
    }
</script>
